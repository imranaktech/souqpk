
<!--=== Breadcrumbs ===-->
    <div style="padding:10px;background:rgba(212, 224, 212, 0.72)">
        <center>
            <h1 class="text-center; "><?php echo translate('invoice_paper');?></h1>
        </center><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <table width="100%" style="background:rgba(212, 224, 212, 0.17);">
    <?php


        $sale_details = $this->db->get_where('sale',array('sale_id'=>$sale_id))->result_array();
        $saleData=$sale_details[0];
           $vat= $saleData['vat'];
           $shipping=$saleData['shipping'];
    ?>
        <!--Invoice Header-->
        <tr>
            <td style="padding:10px;">
                <img src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="" width="60%">
            </td>
          
        </tr>
        <!--End Invoice Header-->

        <!--Invoice Detials-->
        <tr>
            <td style="padding:20px;">
                <div class="tag-box tag-box-v3">
                    <?php
                        $info = json_decode($saleData['shipping_address'],true);
                    ?>
                    <h2><?php echo translate('client_information:');?></h2>
                    <table>
                        <tr><td><strong><?php echo translate('first_name:');?></strong> <?php echo $info['firstname']; ?></td></tr>
                        <tr><td><strong><?php echo translate('last_name:');?></strong> <?php echo $info['lastname']; ?></td></tr>
                    </table>
                </div>        
            </td>
            <td>
                <div class="tag-box tag-box-v3">
                    <h2>Order Detail</h2>  
                    <table>
                    <tr><td><strong>Order NO</strong> : <?php echo $saleData['sale_code']; ?> </td></tr>       
                      
                        <tr><td><strong><?php echo translate('payment_method_:');?></strong> <?php echo ucfirst(str_replace('_', ' ', $info['payment_type'])); ?></td></tr> 
                        <tr><td><strong><?php echo translate('date');?></strong> : <?php echo date('d M, Y',$saleData['sale_datetime'] );?></td></tr> 
                    </table>
                </div>
            </td>
        </tr>
        <!--End Invoice Detials-->

        <!--Invoice Table-->
        <tr>
            <td style="padding:10px 5px 0px; background:#342f34; color:white; text-align:center;" colspan="2" >
                <h3><?php echo translate('payment_invoice');?></h3>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding:0px;">
            <table width="100%">
                <thead>
                    <tr>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)"><?php echo translate('no');?></th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)"><?php echo translate('item');?></th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)"><?php echo translate('size');?></th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)"><?php echo translate('quantity');?></th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)"><?php echo translate('unit_cost');?></th>
                        <th style="padding: 5px;background:rgba(128, 128, 128, 0.30)"><?php echo translate('total');?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $product_details = $data;
                        $i =0;
                        $total = 0;
                        $shiping = 0;
                        $tax = 0;
                        foreach ($product_details as $row1) {
                            $shiping +=$row1->shipping;
                            $tax +=$row1->tax;
                            $i++;
                    ?>
                        <tr>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo $i; ?></td>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo $row1->name; ?></td>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo $row1->size; ?></td>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo $row1->qty; ?></td>
                            <td style="padding: 5px;text-align:center;background:rgba(128, 128, 128, 0.18)"><?php echo currency($row1->price); ?></td>
                            <td style="padding: 5px;text-align:right;background:rgba(128, 128, 128, 0.18)"><?php echo currency($row1->subtotal); $total +=$row1->subtotal; ?></td>
                            
                           
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <td>
        </tr>
        <!--End Invoice Table-->

        <!--Invoice Footer-->
        <tr>
            <td width="50%" style="background:rgba(212, 224, 212, 0.72)">
                 <table>
                    <tr >
                        <td style="padding:10px 20px;"><h2>Billing And Shipping Detail</h2></td>
                    </tr>
                    <tr>
                        <td style="padding:3px 20px;">
                            <?php echo translate('Address Line 1');?> : <?php echo $info['address1']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:3px 20px;">
                            <?php echo translate('Address Line 2');?> : <?php echo $info['address2']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:3px 20px;">
                            <?php echo translate('zip');?> : <?php echo $info['zip']; ?> 
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:3px 20px;">
                            <?php echo translate('phone');?> : <?php echo $info['phone']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:3px 20px;">
                            <?php echo translate('e-mail');?> : <?php echo $info['email']; ?>
                        </td>    
                    </tr> 
                 </table> 
            </td>
            <td style="text-align:right;">
                 <table width="100%">
                    <tr>
                        <td style="text-align:right;padding:3px; width:80%; "><h3><?php echo translate('sub_total_amount');?> :</h3></td>
                        <td style="text-align:right;padding:3px"><h3><?php echo currency($total);?></h3></td>
                    </tr>
                    <tr>
                        <td style="text-align:right;padding:3px; width:80%;"><h3><?php echo translate('tax');?> :</h3></td>
                        <?php 
                         if($tax=='0'){
                             
                             $taxValue= currency($tax)." ".'0.00';
                            
                         }else{
                            
                             $taxValue= currency($tax);
                         }
                        ?>
                        <td style="text-align:right;padding:3px"><h3><?php echo $taxValue;?></h3></td>
                        
                    </tr>
                    <tr>
                        <td style="text-align:right;padding:3px; width:80%;"><h3><?php echo translate('shipping');?> :</h3></td>
                        <?php 
                         if($shiping=='0'){
                             
                             $shipingValue= currency($shiping)." ".'0.00';
                            
                         }else{
                            
                             $shipingValue= currency($shiping);
                         }
                        ?>
                        <td style="text-align:right;padding:3px"><h3><?php echo $shipingValue; ?></h3></td>
                    </tr>
                    <tr>
                        <td style="text-align:right;padding:3px; width:80%;"><h2><?php echo translate('grand_total');?> :</h2></td>
                        <td style="text-align:right;padding:3px"><h2>
                            <?php echo currency($total+$shiping+$tax);?></h2></td>
                    </tr>
                 </table>
               
            </td>
        </tr>
    <?php  ?>
    </table><!--/container-->     
    <!--=== End Content Part ===-->
   