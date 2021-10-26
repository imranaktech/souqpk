
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>
<div class="panel-body" id="demo_s">
    <table id="demo-table" class="table table-striped"  data-pagination="true" data-show-refresh="true"  data-show-toggle="true" data-show-columns="true" data-search="true" >

        <thead>
            <tr>
                <th style="width:4ex"><?php echo translate('ID');?></th>
                <th><?php echo translate('Order_No');?></th>
                <th><?php echo translate('buyer_Name');?></th>
                <th><?php echo translate('date');?></th>
                <th><?php echo translate('Product');?></th>
                <th><?php echo translate('Qty');?></th>
                <th><?php echo translate('Sale_Price');?></th>
                <th><?php echo translate('total');?></th>
                <th><?php echo translate('Order_Status');?></th>
                <th><?php echo translate('delivery_status');?></th>
                <th><?php echo translate('payment_status');?></th>
                <th class="text-right"><?php echo translate('options');?></th>
            </tr>
        </thead>        
        <tbody>
            <?php
            $i = 0;
            foreach($all_sales as $row){
                if($this->crud_model->is_sale_of_vendor($row['sale_id'],$this->session->userdata('vendor_id'))){
                    $i++;
                    $product_details = json_decode($row['product_details'], true);
                    ?>
                    <tr class="<?php if($row['viewed'] !== 'ok'){ echo 'pending'; } ?>" >
                        <td><?php echo $i; ?></td>
                        <td>#<?php echo $row['sale_code']; ?></td>
                        <td><?php echo $this->crud_model->get_type_name_by_id('user',$row['buyer'],'username'); ?></td>
                        <td><?php echo date('d-m-Y',$row['sale_datetime']); ?></td>
                        <td>
                            <?php
                            $ii=0;
                            foreach ($product_details as $row1) {
                                if($this->crud_model->is_added_by('product',$row1['id'],$this->session->userdata('vendor_id'))){
                                    $ii++;
                                    ?>
                                    <span><?php echo $row1['name']; ?><br></span>
                                    <?php
                                }
                            }?>
                        </td>
                        <td>
                            <?php
                            $ii=0;
                            foreach ($product_details as $row1) {
                                if($this->crud_model->is_added_by('product',$row1['id'],$this->session->userdata('vendor_id'))){
                                    $ii++;
                                    ?>
                                    <span><?php echo $row1['qty']; ?><br></span>
                                    <?php
                                }
                            }?>
                        </td>
                        <td>
                            <?php
                            $ii=0;
                            foreach ($product_details as $row1) {
                                if($this->crud_model->is_added_by('product',$row1['id'],$this->session->userdata('vendor_id'))){
                                    $ii++;
                                    ?>
                                    <span><?php echo $row1['price']; ?><br></span>
                                    <?php
                                }
                            }?>
                        </td>
                        <td class="pull-right"><?php echo currency('','def').$this->cart->format_number($this->crud_model->vendor_share_in_sale($row['sale_id'],$this->session->userdata('vendor_id'))['total']); ?></td>

                        <td><?php 
                        $payment_status = json_decode($row['order_status'],true); 
                        foreach ($payment_status as $dev) {if(isset($dev['vendor'])){
                            if($dev['vendor'] == $this->session->userdata('vendor_id')){
                                ?>
                                <?php 
                                $class="info";
                                if($dev['status'] == 'pending'){
                                    ?>
                                    <?php 
                                    $class="danger"; 
                                }

                                if($dev['status'] == 'Pending'){
                                    ?>
                                    <?php 
                                    $class="danger"; 
                                }

                                if($dev['status'] == 'delivered'){
                                    $class="success";
                                }

                                if($dev['status'] == 'Approved'){
                                    $class="success";
                                }

                                if($dev['status'] == 'approved'){
                                    $class="success";
                                }

                                if($dev['status'] == 'Cancelled'){
                                    $class="warning";
                                }

                                if($dev['status'] == 'cancelled'){
                                    $class="warning";
                                }

                                if($dev['status'] == 'shipped'){
                                    $class="warning";
                                }
                                ?>
                                <span class="label label-<?php echo $class ?>">
                                    <?php
                                    echo  $dev['status']; 
                                    ?>
                                </span>
                                <?php
                            }
                        }
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    $delivery_status = json_decode($row['delivery_status'],true); 
                    foreach ($delivery_status as $delivered) {
                        if(isset($delivered['vendor'])){
                            if($delivered['vendor'] == $this->session->userdata('vendor_id')){
                                ?>
                                <?php 
                                $class="info";
                                if($delivered['status'] == 'pending'){
                                    ?>
                                    <?php 
                                    $class="danger"; 
                                }
                                if($delivered['status'] == 'delivered'){
                                    $class="success";
                                }

                                if($delivered['status'] == 'shipped'){
                                    $class="warning";
                                }
                                if($delivered['status'] == 'Shipped'){
                                    $class="warning";
                                }
                                ?>
                                <span class="label label-<?php echo $class ?>">
                                    <?php
                                    echo $delivered['status'];
                                    ?>
                                </span>
                                <?php
                            }
                        }
                    }
                    ?>
                </td>
                <td><?php 
                $payment_status = json_decode($row['payment_status'],true); 
                foreach ($payment_status as $dev) {if(isset($dev['vendor'])){
                    if($dev['vendor'] == $this->session->userdata('vendor_id')){
                        ?>
                        <?php 
                        $class="info";
                        if($dev['status'] == 'Due' || $dev['status'] == 'due'){
                            ?>
                            <?php 
                            $class="danger"; 
                        }
                        if($dev['status'] == 'Paid' || $dev['status'] == 'paid'){
                            ?>
                            <?php 
                            $class="success"; 
                        }
                       
                        ?>
                        <span class="label label-<?php echo $class ?>">
                            <?php
                            echo  $dev['status']; 
                            ?>
                        </span>
                        <?php
                    }
                }
            }
            ?></td>
            <td class="text-right">

                <a class="btn btn-info btn-xs btn-labeled fa fa-file-text" data-toggle="tooltip" 
                onclick="ajax_set_full('view','<?php echo translate('title'); ?>','<?php echo translate('successfully_edited!'); ?>','sales_view','<?php echo $row['sale_id']; ?>')" 
                data-original-title="Edit" data-container="body"><?php echo translate('full_invoice'); ?>
            </a>

            <a class="btn btn-success btn-xs btn-labeled fa fa-usd" data-toggle="tooltip" 
            onclick="ajax_modal('delivery_payment_cod','<?php echo translate('Payment_status_COD'); ?>','<?php echo translate('successfully_edited!'); ?>','delivery_payment_cod','<?php echo $row['sale_id']; ?>')" 
            data-original-title="Edit" data-container="body">
            <?php echo translate('Payment_status'); ?>
        </a>

        <a class="btn btn-success btn-xs btn-labeled fa fa-usd" data-toggle="tooltip" 
        onclick="ajax_modal('order_status','<?php echo translate('order_status'); ?>','<?php echo translate('successfully_edited!'); ?>','order_payment_set','<?php echo $row['sale_id']; ?>')" 
        data-original-title="Edit" data-container="body">
        <?php echo translate('Order_status'); ?>
    </a>

    <a class="btn btn-success btn-xs btn-labeled fa fa-usd" data-toggle="tooltip" 
    onclick="ajax_modal('delivery_payment','<?php echo translate('delivery_payment'); ?>','<?php echo translate('successfully_edited!'); ?>','delivery_payment','<?php echo $row['sale_id']; ?>')" 
    data-original-title="Edit" data-container="body">
    <?php echo translate('delivery_status'); ?>
</a>

<a onclick="delete_confirm('<?php echo $row['sale_id']; ?>','<?php echo translate('really_want_to_delete_this?'); ?>')" 
    class="btn btn-danger btn-xs btn-labeled fa fa-trash" data-toggle="tooltip" 
    data-original-title="Delete" data-container="body"><?php echo translate('delete'); ?>
</a>
</td>
</tr>
<?php
}
}
?>
</tbody>
</table>
</div>  

<div id='export-div' style="padding:40px;">
    <h1 id ='export-title' style="display:none;"><?php echo translate('Sales'); ?></h1>
    <table id="export-table" class="table" data-name='sales' data-orientation='p' data-width='1500' style="display: none;"  >
        <colgroup>
         <col span="1" style="width: 4%;">
         <col span="1" style="width: 10%;">
         <col span="1" style="width: 12%;">
         <col span="1" style="width: 5%;">
         <col span="1" style="width: 8%;">
         <col span="1" style="width: 4%;">
         <col span="1" style="width: 7%;">
         <col span="1" style="width: 7%;">
         <col span="1" style="width: 13%;">
         <col span="1" style="width: 15%;">
         <col span="1" style="width: 15%;">
     </colgroup>
     <thead>
        <tr>
            <th><?php echo translate('Id');?></th>
            <th><?php echo translate('Order_No');?></th>
            <th><?php echo translate('Buyer_Name');?></th>
            <th><?php echo translate('date');?></th>
            <th><?php echo translate('Product');?></th>
            <th><?php echo translate('Qty');?></th>
            <th><?php echo translate('Price');?></th>
            <th><?php echo translate('Total');?></th>
            <th><?php echo translate('Order_Status');?></th>
            <th><?php echo translate('Delivery_Status');?></th>
            <th><?php echo translate('Payment_Status');?></th>
        </tr>
    </thead>

    <tbody >
        <?php
        $i = 0;
        foreach($all_sales as $row){
            if($this->crud_model->is_sale_of_vendor($row['sale_id'],$this->session->userdata('vendor_id'))){
                $i++;
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['sale_code']; ?></td>
                    <td><?php echo $this->crud_model->get_type_name_by_id('user',$row['buyer'],'username'); ?></td>
                    <td><?php echo date('d M,Y',$row['sale_datetime']); ?></td>
                    <td>
                        <?php
                        $ii=0;
                        foreach ($product_details as $row1) {
                            if($this->crud_model->is_added_by('product',$row1['id'],$this->session->userdata('vendor_id'))){
                                $ii++;
                                ?>
                                <?php echo $row1['name']; ?>
                                <?php
                            }
                        }?>
                    </td>
                    <td>
                        <?php
                        $ii=0;
                        foreach ($product_details as $row1) {
                            if($this->crud_model->is_added_by('product',$row1['id'],$this->session->userdata('vendor_id'))){
                                $ii++;
                                ?>
                                <?php echo $row1['qty']; ?>
                                <?php
                            }
                        }?>
                    </td>
                    <td>
                        <?php
                        $ii=0;
                        foreach ($product_details as $row1) {
                            if($this->crud_model->is_added_by('product',$row1['id'],$this->session->userdata('vendor_id'))){
                                $ii++;
                                ?>
                                <?php echo $row1['price']; ?>
                                <?php
                            }
                        }?>
                    </td>
                    <td><?php echo currency('','def').$this->cart->format_number($this->crud_model->vendor_share_in_sale($row['sale_id'],$this->session->userdata('vendor_id'))['total']); ?></td>

                    <td><?php 
                    $payment_status = json_decode($row['order_status'],true); 
                    foreach ($payment_status as $dev) {if(isset($dev['vendor'])){
                        if($dev['vendor'] == $this->session->userdata('vendor_id')){
                            ?>

                            <?php
                            echo  $dev['status']; 
                            ?>

                            <?php
                        }
                    }
                }
                ?>
            </td>    

            <td>
                <?php 
                $delivery_status = json_decode($row['delivery_status'],true); 
                foreach ($delivery_status as $delivered) {
                    if(isset($delivered['vendor'])){
                        if($delivered['vendor'] == $this->session->userdata('vendor_id')){
                            ?>

                            <?php
                            echo $delivered['status'];
                            ?>

                            <?php
                        }
                    }
                }
                ?>
            </td>     

            <td><?php 
            $payment_status = json_decode($row['payment_status'],true); 
            foreach ($payment_status as $dev) {if(isset($dev['vendor'])){
                if($dev['vendor'] == $this->session->userdata('vendor_id')){
                    ?>

                    <?php
                    echo  $dev['status']; 
                    ?>
                    <?php
                }
            }
        }
        ?></td>      
    </tr>
    <?php
}
}
?>
</tbody>
</table>
</div>

<style type="text/css">
    .pending{
        background: #D2F3FF  !important;
    }
    .pending:hover{
        background: #9BD8F7 !important;
    }
</style>



