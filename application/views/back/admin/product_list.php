<script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-table/extensions/export/bootstrap-table-export.js"></script>
<div class="panel-body" id="demo_s">
    <table id="demo-table" class="table table-striped"  data-page-list="[ 10 , 20 , 50 , 100,600]"   data-pagination="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" >
        <div class="change-status" style="float: left;margin-top: 13px;">
            <button class="btn btn-danger" onclick="changeStatus('delete')">Delete </button>
            <button class="btn btn-success"  onclick="changeStatus('publish')">Publish</button>
            <button class="btn btn-danger"  onclick="changeStatus('unpublish')">Unpublish</button>
        </div>
<thead>                <tr>
                    <th><?php echo translate('select');?></th>
                    <th><?php echo translate('S_No');?></th>
                    <th><?php echo translate('image');?></th>
                    <th><?php echo translate('title');?></th>
                    <th><?php echo translate('Shop_Name');?></th>
                    <th> <?php echo translate('current_quantity');?></th>
                    <th ><?php echo translate("publish");?></th>
                    <th ><?php echo translate("today's_deal");?></th>
                    <th ><?php echo translate('featured');?></th>
                    <th ><?php echo translate('options');?></th>
                </tr>
        </thead>
        <tbody> <?php
            $products   = $this->db->order_by('product_id', 'desc')->get('product')->result_array();

            foreach($products as $row){
                $i++;
        ?>                
        <tr>
            <td><input type="checkbox" class="customCheckBox"  name="productids[]" value="<?php echo $row['product_id']?>"></td>
              <td><?php echo $row['product_id'];?></td>
              <td><img class="img-sm" style="height:auto !important; border:1px solid #ddd;padding:2px; border-radius:2px !important;" src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','no','src','multi','one')?>"  /></td>
              <td><?php echo $row['title'];?></td>
              <td><?php echo  $this->crud_model->product_by($row['product_id']);?></td>
               <?php if($row['current_stock'] > 0){ 
                    ?>
                   <td><?php echo $row['current_stock'].$row['unit'].'(s)'; ?></td>               
               <?php } else { ?>
                    <td><span class="label label-danger"><?php echo translate('out_of_stock')?></span></td>
                <?php }
                if($row['status'] == 'ok'){?>
                    <td><input id="pub_<?php echo $row['product_id']?>" class="sw1" type="checkbox" data-id="<?php echo $row['product_id']?>" checked /></td>
              <?php  } else { ?>
                    <td><input id="pub_<?php echo $row['product_id']?>" class="sw1" type="checkbox" data-id="<?php echo $row['product_id']?>" /></td>
               <?php }
                if($row['deal'] == 'ok'){?>
                    <td><input id="deal_<?php echo $row['product_id']?>" class="sw3" type="checkbox" data-id="<?php echo $row['product_id']?>" checked /></td>
                <?php } else {?>
                    <td><input id="deal_<?php echo $row['product_id']?>" class="sw3" type="checkbox" data-id="<?php echo $row['product_id']?>" /></td>
                <?php }
                  if($row['featured'] == 'ok'){?>
                    <td><input id="fet_<?php echo $row['product_id']?>" class="sw2" type="checkbox" data-id="<?php echo $row['product_id']?>" checked /></td>
                <?php } else {?>
                    <td><input id="fet_<?php echo $row['product_id']?>" class="sw2" type="checkbox" data-id="<?php echo $row['product_id']?>" /></td>
                <?php }?>
                <td> <a class="btn btn-info btn-xs btn-labeled fa fa-location-arrow" data-toggle="tooltip" 
                                onclick="ajax_set_full('view','<?php echo translate('view_product'); ?>','<?php echo translate('successfully_viewed!'); ?>','product_view','<?php echo $row['product_id']; ?>')" data-original-title="View" data-container="body">
                                    <?php echo translate('view');?>
                            </a>
                            <a class="btn btn-purple btn-xs btn-labeled fa fa-tag" data-toggle="tooltip"
                                onclick="ajax_modal('add_discount','<?php echo translate('view_discount'); ?>','<?php echo translate('viewing_discount!'); ?>','add_discount','<?php echo $row['product_id']; ?>')" data-original-title="Edit" data-container="body">
                                    <?php echo translate('discount')?>
                            </a>
                            <a class="btn btn-mint btn-xs btn-labeled fa fa-plus-square" data-toggle="tooltip" 
                                onclick="ajax_modal('add_stock','<?php echo translate('add_product_quantity'); ?>','<?php echo translate('quantity_added!'); ?>','stock_add','<?php echo $row['product_id']; ?>')" data-original-title="Edit" data-container="body">
                                    <?php echo translate('stock');?>
                            </a>
                            <a class="btn btn-dark btn-xs btn-labeled fa fa-minus-square" data-toggle="tooltip" 
                                onclick="ajax_modal('destroy_stock','<?php echo translate('reduce_product_quantity'); ?>','<?php echo translate('quantity_reduced!'); ?>','destroy_stock','<?php echo $row['product_id']; ?>')" data-original-title="Edit" data-container="body">
                                    <?php echo translate('destroy')?>
                            </a>
                            
                            <a class="btn btn-success btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip" 
                                onclick="ajax_set_full('edit','<?php echo translate('edit_product'); ?>','<?php echo translate('successfully_edited!'); ?>','product_edit','<?php echo $row['product_id']; ?>')" data-original-title="Edit" data-container="body">
                                    <?php echo translate('edit');?>
                            </a>
                            
                            <a onclick="delete_confirm('<?php echo $row['product_id']; ?>','<?php echo translate('really_want_to_delete_this?');?>')" 
                                class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip" data-original-title="Delete" data-container="body">
                                    <?php echo translate('delete');?>
                            </a></td>
               
        </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>
    <div id="vendr"></div>
    <div id='export-div' style="padding:40px;">
		<h1 id ='export-title' style="display:none;"><?php echo translate('product'); ?></h1>
		<table id="export-table" class="table" data-name='product' data-orientation='p' data-width='1500' style="display:none;">
		    <colgroup>
         <col span="1" style="width: 5%;">
         <col span="1" style="width: 15%;">
         <col span="1" style="width: 15%;">
         <col span="1" style="width: 20%;">
         <col span="1" style="width: 15%;">
         <col span="1" style="width: 15%;">
         <col span="1" style="width: 15%;">
     </colgroup>
			
				<thead><tr>
                    <th><?php echo translate('S_No');?></th>
                    <th><?php echo translate('title');?></th>
                    <th><?php echo translate('Shop_Name');?></th>
                    <th> <?php echo translate('current_quantity');?></th>
                    <th ><?php echo translate("today's_deal");?></th>
                    <th ><?php echo translate('publish');?></th>
                    <th ><?php echo translate('featured');?></th>
                </tr>
				</thead>



				<tbody >
				<?php
					$i = 0;
					foreach($products as $row){
					    $i++;
				?>
				<tr>
					<td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['title'];?></td>
                    <td><?php echo  $this->crud_model->product_by($row['product_id']);?></td>
                    <?php if($row['current_stock'] > 0){ 
                    ?>
                   <td><?php echo $row['current_stock'].$row['unit'].'(s)'; ?></td>               
               <?php } else { ?>
                    <td><?php echo translate('out_of_stock')?></span></td>
                <?php }?>
                <?php if($row['status'] =='ok'){ ?>
                    <td><?php echo 'yes'; ?></td>
                    <?php } else{?>
                    <td><?php echo 'no'; ?></td>
                    <?php } if($row['deal']=='ok'){?>
                    <td><?php echo 'yes'; ?></td>
                    <?php } else { ?>
                    <td><?php echo 'no'; ?></td>
                    <?php } if($row['featured']=='ok'){ ?>
                    <td><?php echo 'yes'; ?></td>
                    <?php } else {?>
                    <td><?php echo 'no'; ?></td>
                    <?php } ?>
				</tr>
	            <?php
	            	} 
				?>
				</tbody>
		</table>
	</div>
           
<script type="text/javascript">
    function changeStatus(typeValue) {
        var productIds = $('.customCheckBox:checked').map(function(){
            return this.value;
        }).get();
        msg = 'Really want to '+typeValue+' this Record?'; 
        bootbox.confirm(msg, function(result) {
            if (result) { 
             $.ajax({                             
                url: base_url+''+user_type+'/'+module+'/change_status', 
                method: 'POST',
                data: {product_ids: productIds,typeValue:typeValue},
                dataType: 'json',
                success: function(data) { 
                    if(data.code==200){
                       $.activeitNoty({ 
                        type: 'success', 
                        icon : 'fa fa-check', 
                        message : data.msg, 
                        container : 'floating', 
                        timer : 3000 
                    }); 
                       location.reload();
                   }else{
                    $.activeitNoty({ 
                        type: 'danger', 
                        icon : 'fa fa-minus', 
                        message : 'Cancelled', 
                        container : 'floating', 
                        timer : 3000 
                    }); 
                }
            } 
        }); 
         }else{ 
            $.activeitNoty({ 
                type: 'danger', 
                icon : 'fa fa-minus', 
                message : 'Cancelled', 
                container : 'floating', 
                timer : 3000 
            }); 
        }; 
    }); 
    }
</script>
