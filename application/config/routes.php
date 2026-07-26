<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['contact-us'] = 'Home/contact_us';
$route['contact-us-action'] = 'Home/contact_us_action';
$route['about-us-action'] = 'Home/about_us_action';
$route['privacy'] = 'Home/privacy_policy';
$route['terms-condition'] = 'Home/terms_condition';
$route['fee-charges'] = 'Home/fee_charges';
$route['sitemap'] = 'Home/sitemap';
$route['how_its_work'] = 'Home/how_its_work';
$route['support'] = 'Home/support';


//Admin
$route['Admin/contact-us'] = 'Admin/Home/contact_us';
$route['Admin/ticket'] = 'Admin/Home/ticket';

$route['Admin/productlist'] = 'Admin/Product';
$route['Admin/add-product'] = 'Admin/Product/add_product';
$route['Admin/edit-product/(:any)'] = 'Admin/Product/edit_product';
$route['Admin/delete-product/(:any)'] = 'Admin/Product/delete_product';
$route['Admin/detail-product/(:any)'] = 'Admin/Product/detail_product';
$route['Admin/manufacturerlist'] = 'Admin/Manufacturer';
$route['Admin/brandlist/(:any)'] = 'Admin/Manufacturer/brandlist';
$route['Admin/about'] = 'Admin/contentManagement/aboutUs';
$route['Admin/services'] = 'Admin/ServiceManagement';

$route['Admin/reviewlist'] = 'Admin/Review';


$route['Admin/addanotherinput'] = 'Admin/Product/addanotherinput';
$route['Admin/addanotheroutput'] = 'Admin/Product/addanotheroutput';
$route['Admin/addanotherprocess'] = 'Admin/Product/addanotherprocess';
$route['Admin/pending_productlist'] = 'Admin/Product/pending_product';
$route['Admin/expire_productlist'] = 'Admin/Product/expire_product';
$route['Admin/edit_expiry_date/(:any)'] = 'Admin/Product/edit_expiry_date';


//site url
//$route['search-listing'] = 'Product/index';
$route['details/(:any)'] = 'Product/product_detail';
$route['add-product'] = 'Product/add_product';
$route['my-product-listing'] = 'Product/my_product_listing';
$route['my-fav-listing'] = 'Product/my_fav_listing';

$route['edit-my-product/(:any)'] = 'Product/edit_my_product';
$route['cancel-my-product/(:any)'] = 'Product/cancel_my_product';
$route['delete-product/(:any)'] = 'Product/deleteproduct';

$route['addanotherinput'] = 'Product/addanotherinput';
$route['addanotheroutput'] = 'Product/addanotheroutput';
$route['addanotherprocess'] = 'Product/addanotherprocess';

$route['search-listing'] = 'Product/devicefilter';
$route['get-cat-b'] = 'Product/get_cat_b';
$route['get-cat-c'] = 'Product/get_cat_c';
$route['search-listing/(:any)'] = 'Product/devicefilter';

$route['get_month_expiry'] = 'Product/get_month_expiry';
$route['get_week_expiry'] = 'Product/get_week_expiry';
$route['get_day_expiry'] = 'Product/get_day_expiry';

$route['expired_product'] = 'Product/expired_product';


//basic signup page
$route['signup'] = 'Signup/index';

$route['signup-action'] = 'Signup/signup_action';
$route['verify-email/(:any)'] = 'Signup/verify_email/$1';



//login
$route['login'] = 'Login/index';
$route['do-login'] = 'Login/do_login';


$route['logout'] = 'Login/logout';


$route['profile'] = 'Signup/profile';
$route['edit-profile-action'] = 'Signup/edit_profile_action';
$route['edit-image-profile-action'] = 'Signup/edit_image_profile_action';
$route['success'] = 'Signup/success';

$route['change-password'] = 'Signup/change_password';
$route['change-password-action'] = 'Signup/change_password_action';

$route['transaction'] = 'Signup/transaction_list';

$route['ticket'] = 'Signup/ticket';
$route['ticket-action'] = 'Signup/ticket_action';
$route['chat-box'] = 'Signup/chat_box';
$route['reply-action'] = 'Signup/reply_action';



//forgot
$route['forgot-password'] = 'Login/forgot_password';
$route['send-password-mail'] = 'Login/send_password_on_mail';
$route['reset-password/(:any)'] = 'Login/reset_password';
$route['reset-password-action'] = 'Login/reset_password_action';



//pages
$route['about'] = 'Home/about';
$route['services'] = 'Home/services';
$route['contactUs'] = 'Home/contactUs';
$route['legal'] = 'Home/legal';
$route['support'] = 'Home/support';


//plan route
$route['plans'] = 'Plans/index';


//logout

//common routes

$route['getStates'] = 'Home/get_states';
$route['getCities'] = 'Home/get_cities';


//footer content in site
$route['help-support'] = 'Home/help_support';
$route['careers'] = 'Home/careers';
$route['privacy-policy'] = 'Home/privacy_policy';
$route['how-it-work'] = 'Home/how_it_work';


$route['fav-device-remove/(:any)'] = 'Product/remove_from_fav_device';
$route['fav-device/(:any)'] = 'Product/fav_device';


// Admin Route
$route['Admin/login'] = 'Admin/Login';
$route['Admin/home'] = 'Admin/Home';
$route['Admin/profile'] = 'Admin/Profile';
$route['Admin/plans'] = 'Admin/Plans';
$route['Admin/categorylist'] = 'Admin/Category';
$route['Admin/single-view/(:any)'] = 'Admin/Users/singleview';
$route['Admin/edit-plan/(:any)'] = 'Admin/Plans/edit_plan';
$route['edit-plan-action'] = 'Admin/Plans/edit_plan_action';


//category list
$route['Admin/listcat'] = 'Admin/Category';
$route['Admin/listsubcat'] = 'Admin/Subcategory';
$route['Admin/listsubsubcat'] = 'Admin/SubSubcategory';

$route['Admin/adminlist'] = 'Admin/Home/admin_list';
$route['Admin/userlist'] = 'Admin/Users';
$route['Admin/ipolist'] = 'Admin/Users/ipolist';
$route['Admin/add-input'] = 'Admin/Users/addinput';
$route['Admin/add-output'] = 'Admin/Users/addoutput';
$route['Admin/add-process'] = 'Admin/Users/addprocess';
$route['Admin/edit-input'] = 'Admin/Users/editinput';
$route['Admin/edit-output'] = 'Admin/Users/editoutput';
$route['Admin/edit-process'] = 'Admin/Users/editprocess';
$route['Admin/add-user'] = 'Admin/Users/adduser';
$route['Admin/edit-user'] = 'Admin/Users/edituser';
$route['Admin/user-profile/(:any)'] = 'Admin/Users/viewuser';

$route['Admin/studentlist'] = 'Admin/Users/studentlist';

$route['Admin/sessionlist'] = 'Admin/Users/sessionlist';
$route['Admin/live_sessions_details/(:any)'] = 'Admin/Users/single_live_session_details';

$route['Admin/recorded_session_list'] = 'Admin/Users/recorded_session_list';
$route['Admin/recorded_sessions_details/(:any)'] = 'Admin/Users/single_recorded_session_details';


$route['Admin/user/listing/(:any)'] = 'Admin/post';

$route['Admin/planlist'] = 'Admin/Plans';
$route['Admin/user/send_sms'] = 'Admin/Users/send_sms';
$route['Admin/user/send_sms_all'] = 'Admin/Users/send_sms_all';


$route['Admin/listbrand'] = 'Admin/Brand';
$route['Admin/posts'] = 'Admin/post';
$route['Admin/posts/activate/(:any)'] = 'Admin/post/activate';
$route['Admin/posts/activate/(:any)/(:any)'] = 'Admin/post/activate';

$route['Admin/posts/de-activate/(:any)'] = 'Admin/post/de_activate';
$route['Admin/posts/de-activate/(:any)/(:any)'] = 'Admin/post/de_activate';
$route['Admin/update_post_package'] = 'Admin/post/update_post_package';

$route['Admin/posts/delete/(:any)'] = 'Admin/post/delete';

$route['Admin/posts/delete/(:any)/(:any)'] = 'Admin/post/delete';

$route['Admin/about_us'] = 'Admin/Footer_content';
$route['Admin/terms-condition'] = 'Admin/Footer_content/terms_condition';
$route['Admin/how_it_works'] = 'Admin/Footer_content/how_it_works';
$route['Admin/privacy-policy'] = 'Admin/Footer_content/privacy_policy';
$route['Admin/support'] = 'Admin/Footer_content/support';
$route['Admin/contact_us'] = 'Admin/Footer_content/contact_us';
$route['Admin/careers'] = 'Admin/Footer_content/careers';
$route['Admin/subscribe_us'] = 'Admin/Footer_content/subscribe_us';
$route['Admin/social-media'] = 'Admin/Footer_content/social_media';
$route['Admin/footer-text'] = 'Admin/Footer_content/footer_text';


$route['Admin/add_advertisement'] = 'Admin/Home/add_advertisement';
$route['Admin/update_advertisement'] = 'Admin/Home/update_advertisement';
$route['Admin/activate_advertisement/(:any)'] = 'Admin/Home/activate_ads';
$route['Admin/deactivate_advertisement/(:any)'] = 'Admin/Home/deactivate_ads';
$route['Admin/update_position'] = 'Admin/Home/update_position';
$route['Admin/Getsubcat'] = 'Admin/Home/Getsubcat';
$route['Admin/Getsubcatedit'] = 'Admin/Home/Getsubcatedit';

$route['Admin/delete_advertisement/(:any)'] = 'Admin/Home/delete_advertisement';
$route['Admin/payment-option'] = 'Admin/Home/payment_option';
$route['Admin/update_payment_option'] = 'Admin/Home/update_payment_option';
$route['Admin/settings'] = 'Admin/Home/settings';
$route['Admin/mail_settings'] = 'Admin/Home/mail_setting';

$route['Admin/update_settings_option'] = 'Admin/Home/update_settings_option';
$route['Admin/update_mail_settings_option'] = 'Admin/Home/update_mail_settings_option';
$route['Admin/default_messages'] = 'Admin/Home/default_messages';
$route['Admin/update_default_message'] = 'Admin/Home/update_default_message';

$route['Admin/notifications/(:any)'] = 'Admin/Home/notifications';
$route['Admin/admin_list'] = 'Admin/Home/admin_list';
$route['Admin/create'] = 'Admin/Home/admin_create';
$route['Admin/delete/(:any)'] = 'Admin/Home/admin_delete';
$route['Admin/update'] = 'Admin/Home/admin_update';
$route['Admin/permission_update'] = 'Admin/Home/permission_update';
$route['Admin/alert_emails'] = 'Admin/Home/alert_emails';
$route['Admin/add_alert_emails'] = 'Admin/Home/add_alert_emails';

$route['Admin/orders'] = 'Admin/Home/orders';
$route['Admin/advertisement'] = 'Admin/Home/advertisement';

$route['Admin/alert_emails_delete/(:any)'] = 'Admin/Home/alert_emails_delete';
$route['Admin/setting'] = 'Admin/Home/settinglist';

$route['Admin/WithdrawalRequest'] = 'Admin/Users/WithdrawalRequest';
$route['Admin/requestchangestatus/(:any)/(:any)'] = 'Admin/Users/requestchangestatus';
$route['Admin/chat-box'] = 'Admin/Home/chat_box';
$route['Admin/reply-action'] = 'Admin/Home/reply_action';

$route['request-to-buy/(:any)'] = 'PurchaseRequest/new_request';
$route['my-purchase-requests'] = 'PurchaseRequest/my_requests';
$route['accept-quote/(:any)'] = 'PurchaseRequest/accept_quote';
$route['vendor-requests'] = 'PurchaseRequest/vendor_requests';
$route['cancel-purchase-request/(:any)'] = 'PurchaseRequest/cancel_request';
$route['delete-purchase-request/(:any)'] = 'PurchaseRequest/delete_request';
$route['reopen-purchase-request/(:any)'] = 'PurchaseRequest/reopen_request';
$route['unlock-purchase-request/(:any)'] = 'PurchaseRequest/unlock_request';