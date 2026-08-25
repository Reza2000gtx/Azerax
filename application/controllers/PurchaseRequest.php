<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseRequest extends CI_Controller {

    // Price to unlock all quotes on a request (placeholder - real payment not wired up yet)
    const UNLOCK_PRICE = 1;

    public function __construct() {
        parent::__construct();
    }

    // route: request-to-buy/(:any) -> product id in segment 2
    public function new_request() {
        $product_id = $this->uri->segment(2);

        if (!$this->session->userdata('user_id')) {
            redirect('login');
            return;
        }
        if (!$this->session->userdata('email_verified')) {
            redirect(base_url());
            return;
        }

        $product_detail = $this->common_model->GetSingleData('product', array('id' => $product_id));
        if (!$product_detail) {
            show_404();
            return;
        }

        // A request is tied to the device (device_id), not this one vendor's
        // specific listing - other vendors may still actively offer the same
        // device even if this particular listing has expired. Only block
        // when NO vendor currently offers it at all.
        $active_offer = $this->common_model->GetSingleData('product', array('device_id' => $product_detail['device_id'], 'status' => 1));
        if (!$active_offer) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">This device is not currently available from any vendor.</div>');
            redirect('details/'.$product_id);
            return;
        }

        $data['product_detail'] = $product_detail;
        $this->load->view('site/request-to-buy', $data);
    }

    // POST PurchaseRequest/submit
    public function submit() {
        if (!$this->session->userdata('user_id') || !$this->session->userdata('email_verified')) {
            redirect('login');
            return;
        }

        $insert['buyer_id']     = $this->session->userdata('user_id');
        $insert['product_id']  = $this->input->post('product_id');
        $insert['device_id']   = $this->input->post('device_id');
        $insert['device_model']= htmlentities($this->input->post('device_model'), ENT_QUOTES);
        $insert['device_brand']= htmlentities($this->input->post('device_brand'), ENT_QUOTES);
        $insert['quantity']    = $this->input->post('quantity') ?: 1;
        $insert['timeline']    = htmlentities($this->input->post('timeline'), ENT_QUOTES);
        $insert['description'] = htmlentities($this->input->post('description'), ENT_QUOTES);
        $insert['status']      = 'open';
        $insert['created_at']  = date('Y-m-d H:i:s');
        $insert['expires_at']  = date('Y-m-d H:i:s', strtotime('+30 days'));

        $run = $this->common_model->InsertData('purchase_requests', $insert);

        if ($run) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Your purchase request has been submitted. Vendors offering this device will respond with quotes.</div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Something went wrong. Please try again.</div>');
        }

        redirect('my-purchase-requests');
    }

    // route: my-purchase-requests
    public function my_requests() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
            return;
        }

        $buyer_id = $this->session->userdata('user_id');
        $requests = $this->common_model->GetAllData('purchase_requests', array('buyer_id' => $buyer_id), 'created_at', 'desc');

        foreach ($requests as &$req) {
            $req['quotes'] = $this->common_model->GetAllData('purchase_request_quotes', array('request_id' => $req['id']), 'created_at', 'asc');
            foreach ($req['quotes'] as &$quote) {
                $vendor = $this->common_model->GetSingleData('users', array('user_id' => $quote['vendor_id']));
                $quote['vendor_name'] = $vendor ? ($vendor['company'] ?: $vendor['fname']) : 'Vendor';
                $quote['vendor_contact_name'] = $vendor ? $vendor['fname'] : '';
                $quote['vendor_email'] = $vendor ? $vendor['email'] : '';
            }
        }

        $data['requests'] = $requests;
        $data['unlock_price'] = self::UNLOCK_PRICE;
        $this->load->view('site/my-purchase-requests', $data);
    }

    // route: accept-quote/(:any) -> quote id in segment 2
    public function accept_quote() {
        $quote_id = $this->uri->segment(2);

        if (!$this->session->userdata('user_id')) {
            redirect('login');
            return;
        }

        $quote = $this->common_model->GetSingleData('purchase_request_quotes', array('id' => $quote_id));
        if (!$quote) { show_404(); return; }

        $request = $this->common_model->GetSingleData('purchase_requests', array('id' => $quote['request_id']));
        if (!$request || $request['buyer_id'] != $this->session->userdata('user_id')) {
            show_404();
            return;
        }

        $this->common_model->UpdateData('purchase_request_quotes', array('id' => $quote_id), array('status' => 'accepted'));
        $this->common_model->UpdateData('purchase_requests', array('id' => $request['id']), array('status' => 'closed'));

        redirect('my-purchase-requests');
    }

    // route: cancel-purchase-request/(:any) -> request id in segment 2
    public function cancel_request() {
        $request_id = $this->uri->segment(2);
        $MIN_AGE_SECONDS = 3600; // 1 hour - minimum time before a request can be cancelled

        if (!$this->session->userdata('user_id')) {
            redirect('login');
            return;
        }

        $request = $this->common_model->GetSingleData('purchase_requests', array('id' => $request_id));
        if (!$request || $request['buyer_id'] != $this->session->userdata('user_id')) {
            show_404();
            return;
        }

        $age = time() - strtotime($request['created_at']);
        if ($age < $MIN_AGE_SECONDS) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">You can cancel a request 1 hour after submitting it.</div>');
            redirect('my-purchase-requests');
            return;
        }

        $this->common_model->UpdateData('purchase_requests', array('id' => $request_id), array('status' => 'cancelled'));
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Request cancelled.</div>');
        redirect('my-purchase-requests');
    }

    // route: delete-purchase-request/(:any) -> request id in segment 2
    public function delete_request() {
        $request_id = $this->uri->segment(2);

        if (!$this->session->userdata('user_id')) {
            redirect('login');
            return;
        }

        $request = $this->common_model->GetSingleData('purchase_requests', array('id' => $request_id));
        if (!$request || $request['buyer_id'] != $this->session->userdata('user_id')) {
            show_404();
            return;
        }
        if ($request['status'] != 'cancelled') {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Only cancelled requests can be deleted.</div>');
            redirect('my-purchase-requests');
            return;
        }

        $this->common_model->DeleteData('purchase_request_quotes', array('request_id' => $request_id));
        $this->common_model->DeleteData('purchase_requests', array('id' => $request_id));

        $this->session->set_flashdata('msg', '<div class="alert alert-success">Request deleted.</div>');
        redirect('my-purchase-requests');
    }

    // route: reopen-purchase-request/(:any) -> request id in segment 2
    public function reopen_request() {
        $request_id = $this->uri->segment(2);

        if (!$this->session->userdata('user_id')) {
            redirect('login');
            return;
        }

        $request = $this->common_model->GetSingleData('purchase_requests', array('id' => $request_id));
        if (!$request || $request['buyer_id'] != $this->session->userdata('user_id')) {
            show_404();
            return;
        }
        if ($request['status'] != 'cancelled') {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Only cancelled requests can be reopened.</div>');
            redirect('my-purchase-requests');
            return;
        }

        // clear stale quotes from before cancellation - reopened request starts fresh
        $this->common_model->DeleteData('purchase_request_quotes', array('request_id' => $request_id));

        $this->common_model->UpdateData('purchase_requests', array('id' => $request_id), array(
            'status'     => 'open',
            'created_at' => date('Y-m-d H:i:s'),
            'expires_at' => date('Y-m-d H:i:s', strtotime('+30 days')),
        ));

        $this->session->set_flashdata('msg', '<div class="alert alert-success">Request reopened.</div>');
        redirect('my-purchase-requests');
    }

    // route: unlock-purchase-request/(:any) -> request id in segment 2
    // placeholder: flags request as unlocked so buyer sees all quotes.
    // TODO: wire up real payment before this goes live - currently free.
    public function unlock_request() {
        $request_id = $this->uri->segment(2);

        if (!$this->session->userdata('user_id')) {
            redirect('login');
            return;
        }

        $request = $this->common_model->GetSingleData('purchase_requests', array('id' => $request_id));
        if (!$request || $request['buyer_id'] != $this->session->userdata('user_id')) {
            show_404();
            return;
        }

        $this->common_model->UpdateData('purchase_requests', array('id' => $request_id), array('unlocked' => 1));

        $this->session->set_flashdata('msg', '<div class="alert alert-success">All quotes unlocked for this request.</div>');
        redirect('my-purchase-requests');
    }

    // route: vendor-requests
    public function vendor_requests() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
            return;
        }
        $vendor_id = $this->session->userdata('user_id');
        $user = $this->common_model->GetSingleData('users', array('user_id' => $vendor_id));
        if (!$user || $user['user_type'] != 1) {
            redirect(base_url());
            return;
        }

        // device_ids this vendor has listed
        $vendor_products = $this->common_model->GetAllData('product', array('user_id' => $vendor_id));
        $device_ids = array();
        foreach ($vendor_products as $p) {
            if (!empty($p['device_id'])) {
                $device_ids[] = $p['device_id'];
            }
        }
        $device_ids = array_unique($device_ids);

        $requests = array();
        if (!empty($device_ids)) {
            $this->db->where_in('device_id', $device_ids);
            $this->db->where('status', 'open');
            $requests = $this->db->order_by('created_at', 'desc')->get('purchase_requests')->result_array();

            foreach ($requests as &$req) {
                $req['my_quote'] = $this->common_model->GetSingleData('purchase_request_quotes', array('request_id' => $req['id'], 'vendor_id' => $vendor_id));
            }
        }

        $data['requests'] = $requests;
        $this->load->view('site/vendor-requests', $data);
    }

    // POST PurchaseRequest/submit_quote
    public function submit_quote() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
            return;
        }
        $vendor_id = $this->session->userdata('user_id');

        $insert['request_id'] = $this->input->post('request_id');
        $insert['vendor_id']  = $vendor_id;
        $insert['lead_time']  = htmlentities($this->input->post('lead_time'), ENT_QUOTES);
        $insert['notes']      = htmlentities($this->input->post('notes'), ENT_QUOTES);
        $insert['status']     = 'pending';
        $insert['created_at'] = date('Y-m-d H:i:s');

        $this->common_model->InsertData('purchase_request_quotes', $insert);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">Your response has been submitted.</div>');
        redirect('vendor-requests');
    }
}
