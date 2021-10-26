

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.2/jspdf.plugin.autotable.js"></script>


<div class="panel-body" id="demo_s">

    <table id="demo-table" class="table table-striped"  data-page-list="[10, 25, 50, 100, all]"  data-pagination="true" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="false" >

        <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success alert-dismissible show" role="alert" style="margin-top: 34px;">
            <?php echo $this->session->flashdata('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

   <!-- <div class="change-status" style="float: left;margin-top: 13px;">
    <button class="btn btn-danger" onclick="changeStatus('delete')">Delete </button>
    <button class="btn btn-success"  onclick="changeStatus('publish')">Publish</button>
    <button class="btn btn-danger"  onclick="changeStatus('unpublish')">Unpublish</button>
</div> -->

<thead>
    <tr>
        <th><?php echo translate('Sr #');?></th>
        <th><?php echo translate('vender_name');?></th>
        <th><?php echo translate('vender_phone');?></th>
        <th><?php echo translate('transfer_amount');?></th>
        <th><?php echo translate('package');?></th>
        <th><?php echo translate('paltform');?></th>
        <th><?php echo translate('Screen Shot');?></th>
        <th><?php echo translate('Date Time');?></th>
    </tr>
</thead>  

<tbody>
    <?php
    $i = 1;
    foreach($data as $row){
        $date_time = date('m/d/Y Y h:i:s A',strtotime('+0 hours', $row['created_at']));
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['vender_name']; ?></td>
            <td><?php echo $row['vender_phone']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['package']; ?></td>
            <td><?php echo $row['paltform']; ?></td>
            <td><img class="img-sm" style="height:auto !important; border:1px solid #ddd;padding:2px; border-radius:2px !important;" src="<?php echo $this->crud_model->file_view('paid_service',$row['id'],'100','100','no','src','','','.jpg')?>"  /></td>
            <td><?php echo date( "d-m-Y h:i A", strtotime($row['created_at'])); ?></td>

            
        <?php } ?>


    </tr>
</tbody>
</table>
</div>

