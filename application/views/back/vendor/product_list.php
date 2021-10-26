<style type="text/css">
    .fixed-table-toolbar .bars, .fixed-table-toolbar .columns, .fixed-table-toolbar .search {
        position: relative;
        margin-right: 16px;
        margin-bottom: 10px;
        line-height: 34px;
    }
    .dataTables_filter{
        margin-top: 14px;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>


<div class="panel-body" id="demo_s">
   <table id="demo-table" class="table table-striped"  data-page-list="[10, 25, 50, 100, all]"  data-pagination="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" >

     <div class="change-status" style="float: left;margin-top: 13px;">
        <button class="btn btn-danger" onclick="changeStatus('delete')">Delete </button>
        <button class="btn btn-success"  onclick="changeStatus('publish')">Publish</button>
        <button class="btn btn-danger"  onclick="changeStatus('unpublish')">Unpublish</button>
    </div>
    <thead>
        <tr>
            <th><?php echo translate('select');?></th>
            <th><?php echo translate('Sr #');?></th>
            <th><?php echo translate('image');?></th>
            <th><?php echo translate('title');?></th>
            <th><?php echo translate('current_quantity');?></th>
            <th><?php echo translate('publish');?></th>
            <th class="text-center"><?php echo translate('options');?></th>
        </tr>
    </thead>  

    <tbody>
        <?php
        $i = 1;
        foreach($all_product as $row){
            ?>
            <tr>
                <td><input type="checkbox" class="customCheckBox"  name="productids[]" value="<?php echo $row['product_id']?>"></td>
                <td><?php echo $i++; ?></td>
                <?php  if($row['product_id']>1043){ ?>

                    <td><img class="img-sm" style="height:auto !important; border:1px solid #ddd;padding:2px; border-radius:2px !important;" src="<?php echo $this->crud_model->getImage('product_images','single',$row['product_id'],'image_name','product_id','product')?>"  /></td>

                <?php } else{
                   ?>
                   <td><img class="img-sm" style="height:auto !important; border:1px solid #ddd;padding:2px; border-radius:2px !important;" src="<?php echo $this->crud_model->file_view('product',$row['product_id'],'','','thumb','src','multi','one')?>"  /></td>
                   <?php 
               }
               ?>
               <td><?php echo $row['title']; ?></td>
               <?php   
               if($row['current_stock'] > 0){

                ?>
                <td> <?php echo $row['current_stock'].$row['unit'].'(s)' ?></td>
                <?php  
            }else{
                ?>
                <td><span class="label label-danger"><?php echo translate('out_of_stock')?></span></td>
                <?php  
            }
            ?>

            <?php 

            if($row['status'] == 'ok'){?>
                <td ><input id="pub_<?php echo $row['product_id']?>" class="sw1" type="checkbox" data-id="<?php echo $row['product_id']?>" checked /></td>

            <?php  } else { ?>
                <td><input id="pub_<?php echo $row['product_id']?>" class="sw1" type="checkbox" data-id="<?php echo $row['product_id']?>" /></td>

                <?php 
            }
            ?>


            <td>
                <a class="btn btn-info btn-xs btn-labeled fa fa-location-arrow" data-toggle="tooltip" onclick="ajax_set_full('view','View Product','Successfully Viewed!','product_view',<?php echo $row['product_id']?>)" data-original-title="View" data-container="body">
                    <?php echo translate('view') ?> </a>
                    <a class="btn btn-purple btn-xs btn-labeled fa fa-tag" data-toggle="tooltip" onclick="ajax_modal('add_discount','View Discount','Viewing Discount!','add_discount',<?php echo $row['product_id']?>)" data-original-title="Edit" data-container="body">
                        <?php echo translate('discount') ?> </a>
                        <a class="btn btn-mint btn-xs btn-labeled fa fa-plus-square" data-toggle="tooltip" onclick="ajax_modal('add_stock','Add Product Quantity','Quantity Added!','stock_add',<?php echo $row['product_id']?>)" data-original-title="Edit" data-container="body">
                            <?php echo translate('stock') ?> </a> </a>

                            <a class="btn btn-dark btn-xs btn-labeled fa fa-minus-square" data-toggle="tooltip" onclick="ajax_modal('destroy_stock','Reduce Product Quantity','Quantity Reduced!','destroy_stock',<?php echo $row['product_id']?>)" data-original-title="Edit" data-container="body">
                                <?php echo translate('destroy') ?></a>

                                <a class="btn btn-success btn-xs btn-labeled fa fa-wrench" data-toggle="tooltip" onclick="ajax_set_full('edit','Edit Product','Successfully Edited!','product_edit',<?php echo $row['product_id']?>)" data-original-title="Edit" data-container="body">
                                    <?php echo translate('edit') ?> </a>

                                    <a onclick="delete_confirm(<?php echo $row['product_id']?>,'Really Want To Delete This?')" class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip" data-original-title="Delete" data-container="body">
                                        <?php echo translate('delete') ?> </a>

                                    </td>

                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>


 <div id='export-div' style="padding:40px;">
<table id="export-table" class="table" data-name='Products' data-orientation='l' data-width='1500' style="display:none;">
      <thead>
        <tr>
            <th><?php echo translate('Sr');?></th>
            <th><?php echo translate('title');?></th>
            <th><?php echo translate('current_quantity');?></th>
            <th><?php echo translate('publish');?></th>
        </tr>
    </thead> 
     
    <tbody>
        <?php
        $i = 1;
        foreach($all_product as $row){
            ?>
         <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td> <?php echo $row['current_stock'].$row['unit'].'(s)' ?></td>
            <?php 

            if($row['status'] == 'ok'){?>
                <td >Publish</td>

            <?php  } else { ?>
                <td>Unpublish</td>
                <?php 
            }
            ?>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

                <!-- <script type="text/javascript">
                    $(document).ready(function(){
                       $('#demo-table').DataTable( {
                        "lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]]
                    } );

                   });

               </script> -->

               <script type="text/javascript">
                function changeStatus(typeValue) {
                    console.log(typeValue);
                    var productIds = $('.customCheckBox:checked').map(function(){
                        return this.value;
                    }).get();
                    console.log(productIds);
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