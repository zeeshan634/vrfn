<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 <?php echo date('Y'); ?> &copy; Admin panel
	</div> 
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>

<div class="modal fade in" id="basic" tabindex="-1" role="basic" aria-hidden="true" style="padding-right: 17px;">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Confirmation</h4>
    </div>
    <div class="modal-body" id="md_msg"> Are you sure you want to delete this Post. </div>
    <div class="modal-footer">
 
    </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?=base_url()?>assets/global/plugins/respond.min.js"></script>
<script src=<?=base_url()?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script type="text/javascript">
// notification //

function notifications(NotificationID){
    if(NotificationID=='') { return false;}
      $.ajax({
                
            type:"post",
            dataType:"json",
            url: '<?php echo base_url();?>admin/notifications/read_notification',
            data: {'NotificationID':NotificationID},
            success: function(data) {             
               if(data.code!=0){
               window.location="<?php echo base_url();?>"+data.link+"";
               }
            }
        });
}
   function allnotify(){
      $.ajax({                
            type:"post",
            dataType:"json",
            url: '<?php echo base_url();?>admin/notifications/top',          
            success: function(data) {                
               $("#notificationMenu").html(data.result);
               $("#not_cnt").html(data.total);
              
              }
            
        });
}


/* function get_all_sms(){
		
		var key = '3b0da870f61f362b451a68450bb4de01';
		var yql_url = 'https://query.yahooapis.com/v1/public/yql';
		var url = 'http://www.smspins.com/pins/apiv2/'+key+'/bulk_sms';
							   
			$.ajax({
		
				'url': yql_url,
				'data': {
					'q': 'SELECT * FROM json WHERE url="'+url+'"',
					'format': 'json',
					'jsonCompat': 'new',
				},
				'dataType': 'jsonp',
				'success': function(response) {
					
					var res = response.query.results.json.data;
					
					var recent_sms = [];
					for(var i=0; i<res.length; i++){
						//recent_sms[] = res[i].json;
						recent_sms.push(res[i].json);
						//alert(recent_sms[i][0]+": "+recent_sms[i][1]+"  "+recent_sms[i][2]);
						
					}
					
					$.post("<?php echo base_url(); ?>admin/member/get_all_sms/",{recent_sms:recent_sms, key: key},function(resp){
							
							if(resp > 0){
								alert(resp+" new sms inserted");
							}else{
								alert("No new sms");
							}							
															
					});
					
					//alert("Recently Recieve SMS against '3b0da870f61f362b451a68450bb4de01' :    "+recent_sms);
					//console.log(recent_sms);

				}
				
			});
								
} */


//allnotify();
//setInterval(function(){ allnotify() }, 5000);
</script>



<script src="<?=base_url()?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?=base_url()?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="<?=base_url()?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   Demo.init(); // init demo features
   
});
</script>

</body>
<!-- END BODY -->
</html>