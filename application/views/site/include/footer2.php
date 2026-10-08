<style>
  .above-footer{
    width: 100%;
    background: #E5E5E5;
    color:black;
    padding: 10px;
    border: none;
	box-shadow: 0px 2px 5px #888888 inset;
  }

   .col-lg-12{
	  max-height: 25px;
  }
  
  .footer-area {
	background-color: #0E1A2C;
	position: relative;
	bottom: 0;
	width: 100%;
  }

  .row1{
	line-height: 40px;  
	text-align: center;  
	min-height: 40px;  
  }


.list_foo {
    list-style: none;
    padding: 0;
    flex: 0 1 auto;
    margin: 0;
    width: auto !important;
}
.footer-area .list_foo {
    width: auto !important;
}
.list_foo li {
    display: inline-block;
}
.list_foo a {
    color: rgba(255,255,255,0.5);
    font-size: 12px;
    text-decoration: none;
    font-family: 'Inter', sans-serif;
    transition: color 0.15s;
    white-space: nowrap;
}
.list_foo a:hover {
    color: rgba(255,255,255,0.85);
}

/* Footer layout: one row on desktop (as before); wraps and centres on tablets and phones */
.az-foot { display:flex; align-items:center; justify-content:space-between; padding:24px 40px; flex-wrap:nowrap; gap:24px; max-width:100%; }
.az-foot-brand { font-family:'Outfit',sans-serif; font-size:18px; font-weight:600; color:#fff; text-decoration:none; }
.az-foot-links { display:flex; gap:14px; flex-wrap:nowrap; margin:0; flex:0 1 auto; min-width:0; }
.az-foot-copy { margin:0; color:rgba(255,255,255,0.3); font-size:12px; white-space:nowrap; }
@media (max-width: 991px) {
  .az-foot { flex-wrap:wrap; justify-content:center; text-align:center; padding:24px 20px; gap:16px 28px; }
  .az-foot-links { flex-wrap:wrap; justify-content:center; gap:8px 18px; }
}
@media (max-width: 575px) {
  .az-foot { flex-direction:column; gap:14px; }
  .az-foot-copy { white-space:normal; }
}
</style>
	<footer class="footer-area">
		<div class="az-foot">
			<a href="<?php echo base_url();?>" class="az-foot-brand">azera<span style="color:#FCA311;">X</span></a>

			<ul class="list list_foo az-foot-links">
				<li><a href="<?php echo base_url();?>about">About</a></li>
				<li><a href="<?php echo base_url();?>fee-charges">Fees & charges</a></li>
				<li><a href="<?php echo base_url();?>privacy">Terms of use</a></li>
				<li><a href="<?php echo base_url();?>privacy">Privacy</a></li>
				<li><a href="<?php echo base_url();?>contact-us">Contact</a></li>
			</ul>

			<p class="az-foot-copy">
				&copy; <?php echo date('Y'); ?> AzeraX. All rights reserved.
			</p>
		</div>
	</footer>



						<script src="<?php echo base_url();?>assets/site/js/az-theme.js?v=<?php echo @filemtime(FCPATH.'assets/site/js/az-theme.js') ?: 1; ?>"></script>

<script>
function myFunction() {
  alert("comming Soon");
}
</script>

	   </body>
	</html>