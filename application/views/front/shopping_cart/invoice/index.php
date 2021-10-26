<section class="page-section invoice">
    <div class="container">
    	<?php
     $sale_details = $this->db->get_where('sale',array('sale_id'=>$sale_id))->result_array();
     foreach($sale_details as $row){
      ?>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="invoice_body">
                <div class="invoice-title">
                    <div class="invoice_logo hidden-xs">
                       <?php
                       $home_top_logo = $this->db->get_where('ui_settings',array('type' => 'home_top_logo'))->row()->value;
                       ?>
                       <img src="<?php echo base_url(); ?>uploads/logo_image/logo_<?php echo $home_top_logo; ?>.png" alt="SuperShop" style="max-width: 350px; max-height: 80px;"/>
                   </div>
                   <div class="invoice_info">
                    <?php if($invoice == "guest") {?>
                        <p><b><?php echo translate('guest_id'); ?> # :</b><?php echo $row['guest_id']; ?></p>
                    <?php }?>
                    <p><b><?php echo translate('invoice'); ?> # :</b><?php echo $row['sale_code']; ?></p>
                </div>
            </div>
            <hr>
            <div class="row">

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <address>
                        <strong>
                            <h4>
                                <?php echo translate('Client_Information'); ?> :
                            </h4>
                        </strong>
                        <?php
                        $info = json_decode($row['shipping_address'],true);
                        ?>
                        <p>
                            <b><?php echo translate('first_name'); ?> :</b>
                            <?php echo $info['firstname']; ?>
                        </p>
                        <p>
                            <b><?php echo translate('last_name'); ?> :</b>
                            <?php echo $info['lastname']; ?>
                        </p>
                        <p>
                            <b><?php echo translate('Phone'); ?> :</b>

                            <?php// echo $info['address1']; ?> 
                            <?php //echo $info['address2']; ?> 
                            <?php //echo translate('zip');?>  <?php// echo $info['zip']; ?> 
                            <?php //echo translate('phone');?>  <?php echo $info['phone']; ?> 
                            <?php //echo translate('e-mail');?>  <a href=""><?php// echo $info['email']; ?></a>
                        </p>
                    </address>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6 hidden-xs text-right">
                    <address>
                        <strong>
                            <h4>
                                <?php echo translate('Order_Detail'); ?> 
                            </h4>
                        </strong>
                        <p>
                            <b><?php echo translate('Order_No'); ?> :</b>
                            <?php echo $row['sale_code']; ?>
                        </p>
                        <p>
                            <b><?php echo translate('Order_Date'); ?> :</b>
                            <?php echo date('d M, Y',$row['sale_datetime'] );?>
                        </p>
                        <p>
                            <b><?php echo translate('Payment_method'); ?> :</b>

                            <?php  echo'C.O.D';
                            ?>
                                </p>
                    </address>
                </div>
            </div>
            <div class="row">
                
                       <!--  <div class="col-md-6 col-sm-6 col-xs-6  text-right">
                            <address>
                                <strong>
                                    <table class="table">
                                        <?php
                                        $vendors = $this->crud_model->vendors_in_sale($row['sale_id']);
                                        foreach ($vendors as $ven) {?>

                                            <tr>
                                                <td><b><?php echo translate('Name');?></b></td>
                                                <td> <?php echo $this->crud_model->get_type_name_by_id('vendor', $ven, 'display_name'); ?> </td>
                                            </tr>
                                            <tr>
                                                <td><b><?php echo translate('Contact_');?></b></td>
                                                <td><?php echo $this->crud_model->get_type_name_by_id('vendor', $ven, 'phone'); ?></td>
                                            </tr>
                                            <?php
                                        }?>

                                    </table>
                                </strong>
                            </address>
                        </div> -->
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong><?php echo translate('payment_invoice');?></strong></h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <td><strong><?php echo translate('no');?></strong></td>
                                            <td class="text-center"><strong><?php echo translate('item');?></strong></td>
                                             <td class="text-center"><strong><?php echo translate('size');?></strong></td>
                                            <td class="text-center"><strong><?php echo translate('shop name');?></strong></td>
                                            <td class="text-center"><strong><?php echo translate('shop phone number');?></strong></td>
                                            <td class="text-right"><strong><?php echo translate('quantity');?></strong></td>
                                            <td class="text-right"><strong><?php echo translate('unit_cost');?></strong></td>
                                            <td class="text-right"><strong><?php echo translate('total');?></strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $product_details = json_decode($row['product_details'], true);
                                        $i =0;
                                        $total = 0;
                                        foreach ($product_details as $row1) {
                                            $product= $this->db->get_where('product', array('product_id' => $row1['id']))->row();
                                            $added_by=json_decode($product->added_by);
                                            $vender= $this->db->get_where('vendor', array('vendor_id' => $added_by->id))->row();
                                            $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td class="text-center"><?php echo $row1['name']; ?></td>
                                                <td class="text-center"><?php echo $row1['size']; ?></td>
                                                <td class="text-center"><?php echo $vender->company; ?></td>
                                                <td class="text-center"><?php echo $vender->phone; ?></td>

                                               
                                          <td class="text-right"><?php echo $row1['qty']; ?></td>
                                          <td class="text-right">
                                            <?php echo currency($row1['price']); ?>
                                        </td>
                                        <td class="text-right">
                                            <?php echo currency($row1['subtotal']); 
                                            $total += $row1['subtotal']; 
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr>
                                   <td class="thick-line"></td>
                                   <td class="thick-line"></td>
                                   <td class="thick-line"></td>
                                   <td class="thick-line"></td>
                                   <td class="thick-line text-right">
                                       <strong>
                                          <?php echo translate('sub_total_amount');?> :
                                      </strong>
                                  </td>
                                  <td class="thick-line text-right">
                                   <?php echo currency($total);?>
                               </td>
                           </tr>
                           <tr>
                               <td class="no-line"></td>
                               <td class="no-line"></td>
                               <td class="no-line"></td>
                               <td class="no-line"></td>
                               <td class="no-line text-right">
                                   <strong>
                                      <?php echo translate('tax');?> :
                                  </strong>
                              </td>
                              <td class="no-line text-right">
                               <?php echo currency($row['vat']);?>
                           </td>
                       </tr>
                       <tr>
                           <td class="no-line"></td>
                           <td class="no-line"></td>
                           <td class="no-line"></td>
                           <td class="no-line"></td>
                           <td class="no-line text-right">
                               <strong>
                                  <?php echo translate('shipping');?> :
                              </strong>
                          </td>
                          <td class="no-line text-right">
                           <?php echo currency($row['shipping']);?>
                       </td>
                   </tr>
                   <tr>
                       <td class="no-line"></td>
                       <td class="no-line"></td>
                       <td class="no-line"></td>
                       <td class="no-line"></td>
                       <td class="no-line text-right">
                           <strong>
                              <?php echo translate('grand_total');?> :
                          </strong>
                      </td>
                      <td class="no-line text-right">
                       <?php echo currency($row['grand_total']);?>
                   </td>
               </tr>
           </tbody>
       </table>
   </div>
</div>
</div>
</div>
</div>
<div class="col-md-10 col-md-offset-1 btn_print hidden-xs" style="margin-top:10px;">
   <span class="btn btn-info pull-right" onClick="print_invoice()">
       <?php echo translate('print'); ?>
   </span>
   <?php if($invoice != "guest") {?>
    <a class="btn btn-danger pull-right" href="<?=base_url()?>home/profile/part/order_history" style="margin-right: 5px;"><?php echo translate('back_to_profile'); ?></a>
<?php }?>
</div>
</div>
<?php
}
?>
</div>
</section>
<script>
    function print_invoice(){
       window.print();
   }
</script>
<style type="text/css">    
    @media print {
        .top-bar{
            display: none !important;
        }
        header{
            display: none !important;
        }
        footer{
            display: none !important;
        }
        .to-top{
            display: none !important;
        }
        .btn_print{
            display: none !important;
        }
        .invoice{
            padding: 0px;
        }
        .table{
            margin:0px;
        }
        address{
            margin-bottom: 0px;
            border:1px solid #fff !important;
        }
    }
</style>

