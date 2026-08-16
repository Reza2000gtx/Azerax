<!--<footer class="main-footer">
</footer>  -->
</div>


<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>

<script type="text/javascript">
// Auto-attach the CSRF token to every AJAX POST request, since none of the
// admin panel's AJAX calls were built with it in mind. Handles FormData,
// plain objects, and query-string data - whichever a given call happens to use.
(function(){
    var CSRF_TOKEN_NAME = '<?php echo $this->security->get_csrf_token_name(); ?>';
    function getCsrfCookieValue(){
        // CI stores the token's current value in a cookie named per
        // csrf_cookie_name in config.php.
        var cookieName = '<?php echo $this->config->item("csrf_cookie_name"); ?>=';
        var parts = document.cookie.split(';');
        for(var i = 0; i < parts.length; i++){
            var c = parts[i].trim();
            if(c.indexOf(cookieName) === 0){
                return decodeURIComponent(c.substring(cookieName.length));
            }
        }
        return '';
    }
    $.ajaxPrefilter(function(options, originalOptions, jqXHR){
        if(!options.type || options.type.toUpperCase() !== 'POST') return;
        var token = getCsrfCookieValue();
        if(!token) return;
        if(options.data instanceof FormData){
            options.data.append(CSRF_TOKEN_NAME, token);
        } else if(typeof options.data === 'string' || options.data === undefined || options.data === null){
            options.data = (options.data ? options.data + '&' : '') + CSRF_TOKEN_NAME + '=' + encodeURIComponent(token);
        } else if(typeof options.data === 'object'){
            options.data[CSRF_TOKEN_NAME] = token;
        }
    });
})();
</script>

<script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- <script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->

<!-- <script src="<?php echo base_url(); ?>assets/admin/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->


<script src="<?php echo base_url(); ?>assets/admin/dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/custom/custom.js"></script>

<!-- <script src="<?php echo base_url(); ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>



<script>
  $(function () {
    $('.DataTable').DataTable();
  })
</script>

<script src="https://cdn.ckeditor.com/4.25.2-lts/standard/ckeditor.js"></script>  
<script type="text/javascript">
            $(function() {
               CKEDITOR.replace('ckeditor');
            });
        </script>

</body>
</html>