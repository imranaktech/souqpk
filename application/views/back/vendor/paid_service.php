<div id="content-container">
	<div id="page-title">
		<h1 class="page-header text-overflow"><?php echo translate('paid_service');?></h1>
	</div>
	<div class="tab-base">
		<div class="panel">
			<div class="panel-body">
				<div class="tab-content">
					<div class="col-md-12" style="border-bottom: 1px solid #ebebeb;padding:10px;">

						<button class="btn btn-primary btn-labeled fa fa-plus-circle add_pro_btn pull-right" 
                                onclick="ajax_set_full('add','<?php echo translate('add_paid_service'); ?>','<?php echo translate('successfully_added!'); ?>','paid_service_add',''); proceed('to_add');"><?php echo translate('create_paid_service');?>
                            </button>

						
					</div>
					<div class="tab-pane fade active in" id="list" 
                    	style="border:1px solid #ebebeb; 
                        	border-radius:4px;">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

	function proceed(type){
		if(type == 'to_list'){
			$(".pro_list_btn").show();
			$(".add_pro_btn").hide();
		} else if(type == 'to_add'){
			$(".add_pro_btn").show();
			$(".pro_list_btn").hide();
		}
	}
	var base_url = '<?php echo base_url(); ?>'
	var user_type = 'vendor';
	var module = 'paid_services';
	var list_cont_func = 'list';
	var dlt_cont_func = 'delete';
</script>

