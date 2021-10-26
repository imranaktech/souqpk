<style type="text/css">
 #add_more{
    display: none;
}
input[type=radio], input[type=checkbox]{
    margin: 0 !important;
    margin-top: 0 !important;
}
.custom-flex{display: flex; align-items: center;}
.custom-flex span{
    padding-left: 5px;
}
</style>
<div class="row">
    <div class="col-md-12">
      <?php
      echo form_open(base_url() . 'vendor/product/do_add/', array(
        'class' => 'form-horizontal',
        'method' => 'post',
        'id' => 'product_add',
        'enctype' => 'multipart/form-data'
    ));
    ?>
    <!--Panel heading-->
    <div class="panel-heading">
        <div class="panel-control" style="float: left;">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#product_details"><?php echo translate('product_details'); ?></a>
                </li>
                <li>
                    <a data-toggle="tab" href="#business_details"><?php echo translate('business_details'); ?></a>
                </li>
                <li>
                    <a data-toggle="tab" href="#customer_choice_options"><?php echo translate('customer_choice_options'); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="tab-base">
            <!--Tabs Content-->                    
            <div class="tab-content">
             <div id="product_details" class="tab-pane fade active in">

                <div class="form-group btm_border">
                    <h4 class="text-thin text-center"><?php echo translate('product_details'); ?></h4>                            
                </div>

                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-1"><?php echo translate('product_title');?></label>
                    <input type="hidden" name="Images" value="" id="Images">
                    <div class="col-sm-6">
                        <input type="text" name="title" id="demo-hor-1" placeholder="<?php echo translate('product_title');?>" class="form-control required" maxlength="32">
                    </div>
                </div>

                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-2"><?php echo translate('category');?></label>
                    <div class="col-sm-6">
                        <?php echo $this->crud_model->select_html('category','category','category_name','add','demo-chosen-select required','','digital',NULL,'get_cat'); ?>
                    </div>
                </div>

                <div class="form-group btm_border" id="sub" style="display:none;">
                    <label class="col-sm-4 control-label" for="demo-hor-3"><?php echo translate('sub-category');?></label>
                    <div class="col-sm-6" id="sub_cat">
                    </div>
                </div>


                <div class="form-group btm_border" style="display:none">
                    <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('Today-Deal');?></label>
                    <div class="col-sm-6">
                        <select class="form-control" name="today_deal">
                            <option value="no">no</option>
                            <option value="ok">ok</option>
                        </select>
                    </div>
                </div>  


                <div class="form-group btm_border" style="display:none">
                    <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('Featured');?></label>
                    <div class="col-sm-6">
                        <select class="form-control" name="featured">
                            <option value="no">no</option>
                            <option value="ok">ok</option>
                        </select>
                    </div>
                </div> 


                <div class="form-group btm_border" id="brn" style="display:none;">
                    <label class="col-sm-4 control-label" for="demo-hor-4"><?php echo translate('brand');?></label>
                    <div class="col-sm-6" id="brand">
                    </div>
                </div>

                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('unit');?></label>
                    <div class="col-sm-6">
                        <input type="text" name="unit" id="demo-hor-5" placeholder="<?php echo translate('unit_(e.g._kg,_pc_etc.)'); ?>" class="form-control unit required">
                    </div>
                </div>  


                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('current_stock');?></label>
                    <div class="col-sm-6">
                        <input type="number" name="current_stock" id="demo-hor-5" placeholder="<?php echo translate('current_stock'); ?>" class="form-control unit required">
                    </div>
                </div>

                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-11"><?php echo translate('tags');?></label>
                    <div class="col-sm-6">
                        <input type="text" name="tag" data-role="tagsinput" placeholder="<?php echo translate('tags');?>" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-2 custom-flex">
                        <input type="checkbox" name="enableSize" id="enableSize" value="1"> <span>Enable Size</span>
                    </div>
                </div>
                
                <div class="form-group" id="enableSizes">
                    <label class="col-sm-4"></label>
                    <div class="col-sm-1 custom-flex">
                        <input type="checkbox" name="sizes[]" value="Small"> <span>S</span>
                        
                    </div>

                    <div class="col-sm-1 custom-flex">
                        <input type="checkbox" name="sizes[]" value="Medium"> <span>M</span>
                    </div>

                    <div class="col-sm-1 custom-flex">
                        <input type="checkbox" name="sizes[]" value="Large"> <span>L</span>
                    </div>

                    <div class="col-sm-1 custom-flex">
                        <input type="checkbox" name="sizes[]" value="Xl"> <span>XL</span>
                    </div>

                    <div class="col-sm-1 custom-flex">
                        <input type="checkbox" name="sizes[]" value="XXL"> <span>XXL</span>
                    </div>
                </div>

                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label"  for="demo-hor-12"><?php echo translate('images');?></label>
                    <div class="col-sm-6">
                        <div id="choose_file">
                            <label for="demo-hor-12" class="pull-left btn btn-default btn-file"><?php echo translate('choose_file');?></label>
                            <input type="file" multiple name="images[]"  id="demo-hor-12" class="form-control  fileclass" accept="image/png, image/bmp, image/jpeg" style="display:none;">
                        </div>

                        <div id="add_more">
                            <label for="demo-hor-12" class="pull-left btn btn-default btn-file"><i class="fa fa-plus"></i></label>
                            <input type="file" multiple name="images[]"  id="demo-hor-12" class="form-control  fileclass" accept="image/png, image/bmp, image/jpeg" style="visibility:hidden;" >
                        </div>
                        
                    <span id="fileError" style="color: red;display: none;">Minimum 3 and maximun 6 images are required</span>
                        <span id="previewImg" ></span>
                    </div>
                </div>

                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-13"><?php echo translate('description'); ?></label>
                    <div class="col-sm-6">
                        <textarea rows="9"  class="summernotes" data-height="200" data-name="description"></textarea>
                    </div>
                </div>

                <div class="form-group btm_border">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8"><small>*<?php echo translate('Write an seo friendly title within 60 characters')?></small></div>
                    <label class="col-sm-4 control-label" for="">
                        <?php echo translate('Seo Friendly Title');?>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" name="seo_title"
                        placeholder="<?php echo translate('Ex. Yamaha RT - Model 2020')?>"
                        class="form-control required">
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="form-group btm_border">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-8"><small>*<?php echo translate('Write an seo friendly description within 160 characters')?></small></div>
                    <label class="col-sm-4 control-label" for="">
                        <?php echo translate('Seo Friendly Description');?>
                    </label>
                    <div class="col-sm-6">
                        <textarea name="seo_description"
                        placeholder="<?php echo translate('Ex. New Yamaha Sports bike in 2020 from Japan')?>"
                        class="form-control required" rows='4' ></textarea>
                    </div>
                    <div class="col-sm-2"></div>
                </div>

                <div id="more_additional_fields"></div>
                <div class="form-group btm_border">
                    <label class="col-sm-4 control-label" for="demo-hor-inputpass"></label>
                    <div class="col-sm-6">
                        <h4 class="pull-left">
                            <i><?php echo translate('if_you_need_more_field_for_your_product_,_please_click_here_for_more...');?></i>
                        </h4>
                        <div id="more_btn" class="btn btn-mint btn-labeled fa fa-plus pull-right">
                            <?php echo translate('add_more_fields');?></div>
                        </div>
                    </div>


                </div>
                <div id="business_details" class="tab-pane fade">
                    <div class="form-group btm_border">
                        <h4 class="text-thin text-center"><?php echo translate('business_details'); ?></h4>                            
                    </div>
                    <div class="form-group btm_border">
                        <label class="col-sm-4 control-label" for="demo-hor-6"><?php echo translate('sale_price');?></label>
                        <div class="col-sm-4">
                            <input type="number" name="sale_price" id="demo-hor-6" min='0' step='.01' placeholder="<?php echo translate('sale_price');?>" class="form-control required">
                        </div>
                        <span class="btn"><?php echo currency('','def'); ?> / </span>
                        <span class="btn unit_set"></span>
                    </div>

                    <div class="form-group btm_border">
                        <label class="col-sm-4 control-label" for="demo-hor-7"><?php echo translate('purchase_price');?></label>
                        <div class="col-sm-4">
                            <input type="number" name="purchase_price" id="demo-hor-7" min='0' step='.01' placeholder="<?php echo translate('purchase_price');?>" class="form-control required">
                        </div>
                        <span class="btn"><?php echo currency('','def'); ?> / </span>
                        <span class="btn unit_set"></span>
                    </div>

                    <div class="form-group btm_border">
                        <label class="col-sm-4 control-label" for="demo-hor-8"><?php echo translate('shipping_cost');?></label>
                        <div class="col-sm-4">
                            <input type="number" name="shipping_cost" id="demo-hor-8" min='0' step='.01' placeholder="<?php echo translate('shipping_cost');?>" class="form-control">
                        </div>
                        <span class="btn"><?php echo currency('','def'); ?> / </span>
                        <span class="btn unit_set"></span>
                    </div>

                    <div class="form-group btm_border">
                        <label class="col-sm-4 control-label" for="demo-hor-9"><?php echo translate('product_tax');?></label>
                        <div class="col-sm-4">
                            <input type="number" name="tax" id="demo-hor-9" min='0' step='.01' placeholder="<?php echo translate('product_tax');?>" class="form-control">
                        </div>
                        <div class="col-sm-1">
                            <select class="demo-chosen-select" name="tax_type">
                                <option value="percent">%</option>
                                <option value="amount"><?php echo currency('','def'); ?></option>
                            </select>
                        </div>
                        <span class="btn unit_set"></span>
                    </div>

                    <div class="form-group btm_border">
                        <label class="col-sm-4 control-label" for="demo-hor-10"><?php echo translate('product_discount');?></label>
                        <div class="col-sm-4">
                            <input type="number" name="discount" id="demo-hor-10" min='0' step='.01' placeholder="<?php echo translate('product_discount');?>" class="form-control">
                        </div>
                        <div class="col-sm-1">
                            <select class="demo-chosen-select" name="discount_type">
                                <option value="percent">%</option>
                                <option value="amount"><?php echo currency('','def'); ?></option>
                            </select>
                        </div>
                        <span class="btn unit_set"></span>
                    </div>
                </div>
                <div id="customer_choice_options" class="tab-pane fade">
                    <div class="form-group btm_border">
                        <h4 class="text-thin text-center"><?php echo translate('customer_choice_options'); ?></h4>                            
                    </div>
                    <div class="form-group btm_border">
                        <label class="col-sm-4 control-label" for="demo-hor-14"><?php echo translate('color'); ?></label>
                        <div class="col-sm-4"  id="more_colors">
                          <div class="col-md-12" style="margin-bottom:8px;">
                              <div class="col-md-10">
                                  <div class="input-group demo2">
                                   <input type="text" value="#ccc" name="color[]" class="form-control" />
                                   <span class="input-group-addon"><i></i></span>
                               </div>
                           </div>
                           <span class="col-md-2">
                              <span class="remove_it_v rmc btn btn-danger btn-icon icon-lg fa fa-trash" ></span>
                          </span>
                      </div>
                  </div>
                  <div class="col-sm-2">
                    <div id="more_color_btn" class="btn btn-primary btn-labeled fa fa-plus">
                        <?php echo translate('add_more_colors');?>
                    </div>
                </div>
            </div>

            <div id="more_additional_options"></div>
            <div class="form-group btm_border">
                <label class="col-sm-4 control-label" for="demo-hor-inputpass"></label>
                <div class="col-sm-6">
                    <h4 class="pull-left">
                        <i><?php echo translate('if_you_need_more_choice_options_for_customers_of_this_product_,please_click_here.');?></i>
                    </h4>
                    <div id="more_option_btn" class="btn btn-mint btn-labeled fa fa-plus pull-right">
                        <?php echo translate('add_customer_input_options');?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span id="next" class="btn btn-purple btn-labeled fa fa-hand-o-right pull-right" onclick="next_tab()"><?php echo translate('next'); ?></span>
    <span class="btn btn-purple btn-labeled fa fa-hand-o-left pull-right" onclick="previous_tab()"><?php echo translate('previous'); ?></span>

</div>

<div class="panel-footer">
    <div class="row">
     <div class="col-md-11">
        <span class="btn btn-purple btn-labeled fa fa-refresh pro_list_btn pull-right" 
        onclick="ajax_set_full('add','<?php echo translate('add_product'); ?>','<?php echo translate('successfully_added!'); ?>','product_add',''); "><?php echo translate('reset');?>
    </span>
</div>

<div class="col-md-1">
    <span id="upload"  class="btn btn-success btn-md btn-labeled fa fa-upload pull-right enterer" onclick="form_submit('product_add','<?php echo translate('product_has_been_uploaded!'); ?>');proceed('to_add');" ><?php echo translate('upload');?></span>
</div>

</div>
</div>

</form>
</div>
</div>

<script src="<?php $this->benchmark->mark_time(); echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


<script type="text/javascript">
    function appendImages(imagesArray) {
        $("#previewImg").empty();
        for (var i = 0; i < imagesArray.length; ++i) {
            img_url = base_url+"/uploads/product_image/" + imagesArray[i];
            $("#previewImg").append('<div class="delete-div-wrap"><span class="close">&times;</span><div><img class="img-responsive" width="100" src="'+img_url+'" data-id="'+imagesArray[i]+'" data-id="'+imagesArray[i]+'" alt="User_Image" ></div></div>');

        }
    

        if(imagesArray.length<3 || imagesArray.length>6){
            $("#fileError").css("display",'block');
            $('#upload').css('pointer-events','none');
            $('#next').css('pointer-events','none');
            $('.fileclass').removeClass('required');
        }else{
            $("#fileError").css("display",'none');
            $('#upload').css('pointer-events','auto');
            $('#next').css('pointer-events','auto');
        }

        if(imagesArray.length!==0){
            $("#choose_file").css("display",'none');
            $("#add_more").css("display",'block');
        }else{
            $("#choose_file").css("display",'block');
            $("#add_more").css("display",'none');

        }
    }

    function remove_array_element(array, imageName)
    {
       var index = array.indexOf(imageName);
       if (index > -1) {
        array.splice(index, 1);
    }
    return array;
}
</script>
<script type="text/javascript">

    var images_names = [];

    $('#demo-hor-12').change(function () {

     if ($('#demo-hor-12').val() != '') {
        upload(this);
    }

});

    $(document).on("click",".delete-div-wrap .close",function() {
     var pid = $(this).closest('.delete-div-wrap').find('img').data('id'); 
     var here = $(this); 
     msg = 'Really want to delete this Image?'; 
     bootbox.confirm(msg, function(result) {
        if (result) { 
         $.ajax({ 
            url: base_url+''+user_type+'/'+module+'/dlt_img/'+pid, 
            cache: false, 
            success: function(data) { 
                remove_array_element(images_names, pid);
                $.activeitNoty({ 
                    type: 'success', 
                    icon : 'fa fa-check', 
                    message : 'Deleted Successfully', 
                    container : 'floating', 
                    timer : 3000 
                }); 
                here.closest('.delete-div-wrap').remove(); 
                appendImages(images_names);
                $('#Images').val(JSON.stringify(images_names));
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
 });
    function upload(img) {

        let TotalImages = $('#demo-hor-12')[0].files.length;
        var length =images_names.length+TotalImages;
        let image_upload = new FormData();

        let images = $('#demo-hor-12')[0];
        for (let i = 0; i < TotalImages; i++) {

           if(images.files[i].size > 2000000) {
               alert('Please upload file less than 2MB.');
               $("#demo-hor-12").val('');
               return false;
           }else{
               image_upload.append('images[]', images.files[i]);

           }
       }
        swal({
            title: "Processing...",
            text: "Please wait while your request is being processed",
            showCancelButton: false,
            showConfirmButton: false,
            allowOutsideClick: false,
            closeOnClickOutside: false,
            allowEscapeKey: false

        })
       image_upload.append('TotalImages', TotalImages);
      $.ajax({
          url: base_url+''+user_type+'/addProductImages/',
          data: image_upload,
          type: 'POST',
          dataType: 'json',
          contentType: false,
          processData: false,
          success: function (data) {
            data.files.map((x) => {
              images_names.push(x);
          });
            appendImages(images_names);
            swal.close();
            $('#Images').val(JSON.stringify(images_names));
        // $('#demo-hor-12').val('');

    }
});
  }
</script>

<input type="hidden" id="option_count" value="-1">

<script>




    function removeImage(id){
    }

    function other_forms(){}

    function set_summer(){
        $('.summernotes').each(function() {
            var now = $(this);
            var h = now.data('height');
            var n = now.data('name');
            if(now.closest('div').find('.val').length == 0){
             now.closest('div').append('<input type="hidden" class="val" name="'+n+'">');
         }
         now.summernote({
            toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['view', ['codeview', 'help']],
            ],
            height: h,
            onChange: function() {
                now.closest('div').find('.val').val(now.code());
            }
        });
         now.closest('div').find('.val').val(now.code());
     });
    }

    function option_count(type){
        var count = $('#option_count').val();
        if(type == 'add'){
            count++;
        }
        if(type == 'reduce'){
            count--;
        }
        $('#option_count').val(count);
    }

    function set_select(){
        $('.demo-chosen-select').chosen();
        $('.demo-cs-multiselect').chosen({width:'100%'});
    }

    $(document).ready(function() {
        set_select();
        set_summer();
        createColorpickers();
    });

    function other(){
        set_select();
        $('#sub').show('slow');
    }
    function get_cat(id,now){
        $('#sub').hide('slow');
        ajax_load(base_url+'vendor/product/sub_by_cat/'+id,'sub_cat','other');
    }
    function get_brnd(id){
        $('#brn').hide('slow');
        ajax_load(base_url+'vendor/product/brand_by_sub/'+id,'brand','other');
        $('#brn').show('slow');
    }
    function get_sub_res(id){}

    $(".unit").on('keyup',function(){
        $(".unit_set").html($(".unit").val());
    });

    function createColorpickers() {

      $('.demo2').colorpicker({
       format: 'rgba'
   });

  }

  $("#more_btn").click(function(){
    $("#more_additional_fields").append(''
        +'<div class="form-group">'
        +'    <div class="col-sm-4">'
        +'        <input type="text" name="ad_field_names[]" class="form-control required"  placeholder="<?php echo translate('field_name'); ?>">'
        +'    </div>'
        +'    <div class="col-sm-5">'
        +'        <textarea rows="9"  class="summernotes" data-height="100" data-name="ad_field_values[]"></textarea>'
        +'    </div>'
        +'    <div class="col-sm-2">'
        +'        <span class="remove_it_v rms btn btn-danger btn-icon btn-circle icon-lg fa fa-times" onclick="delete_row(this)"></span>'
        +'    </div>'
        +'</div>'
        );
    set_summer();
});

  function next_tab(){
    $('.nav-tabs li.active').next().find('a').click();                    
}
function previous_tab(){
    $('.nav-tabs li.active').prev().find('a').click();                     
}

$("#more_option_btn").click(function(){
    option_count('add');
    var co = $('#option_count').val();
    $("#more_additional_options").append(''
        +'<div class="form-group" data-no="'+co+'">'
        +'    <div class="col-sm-4">'
        +'        <input type="text" name="op_title[]" class="form-control required"  placeholder="<?php echo translate('customer_input_title'); ?>">'
        +'    </div>'
        +'    <div class="col-sm-5">'
        +'        <select class="demo-chosen-select op_type required" name="op_type[]" >'
        +'            <option value="">(none)</option>'
        +'            <option value="text">Text Input</option>'
        +'            <option value="single_select">Dropdown Single Select</option>'
        +'            <option value="radio">Radio</option>'
        +'        </select>'
        +'        <div class="col-sm-12 options">'
        +'          <input type="hidden" name="op_set'+co+'[]" value="none" >'
        +'        </div>'
        +'    </div>'
        +'    <input type="hidden" name="op_no[]" value="'+co+'" >'
        +'    <div class="col-sm-2">'
        +'        <span class="remove_it_o rmo btn btn-danger btn-icon btn-circle icon-lg fa fa-times" onclick="delete_row(this)"></span>'
        +'    </div>'
        +'</div>'
        );
    set_select();
});

$("#more_additional_options").on('change','.op_type',function(){
    var co = $(this).closest('.form-group').data('no');
    if($(this).val() !== 'text' && $(this).val() !== ''){
        $(this).closest('div').find(".options").html(''
            +'    <div class="col-sm-12">'
            +'        <div class="col-sm-12 options margin-bottom-10"></div><br>'
            +'        <div class="btn btn-mint btn-labeled fa fa-plus pull-right add_op">'
            +'        <?php echo translate('add_options_for_choice');?></div>'
            +'    </div>'
            );
    } else if ($(this).val() == 'text' || $(this).val() == ''){
        $(this).closest('div').find(".options").html(''
            +'    <input type="hidden" name="op_set'+co+'[]" value="none" >'
            );
    }
});

$("#more_additional_options").on('click','.add_op',function(){
    var co = $(this).closest('.form-group').data('no');
    $(this).closest('.col-sm-12').find(".options").append(''
        +'    <div>'
        +'        <div class="col-sm-10">'
        +'          <input type="text" name="op_set'+co+'[]" class="form-control required"  placeholder="<?php echo translate('option_name'); ?>">'
        +'        </div>'
        +'        <div class="col-sm-2">'
        +'          <span class="remove_it_n rmon btn btn-danger btn-icon btn-circle icon-sm fa fa-times" onclick="delete_row(this)"></span>'
        +'        </div>'
        +'    </div>'
        );
});

$('body').on('click', '.rmo', function(){
    $(this).parent().parent().remove();
});

$('body').on('click', '.rmon', function(){
    var co = $(this).closest('.form-group').data('no');
    $(this).parent().parent().remove();
    if($(this).parent().parent().parent().html() == ''){
        $(this).parent().parent().parent().html(''
            +'   <input type="hidden" name="op_set'+co+'[]" value="none" >'
            );
    }
});

$('body').on('click', '.rms', function(){
    $(this).parent().parent().remove();
});

$("#more_color_btn").click(function(){
    $("#more_colors").append(''
        +'      <div class="col-md-12" style="margin-bottom:8px;">'
        +'          <div class="col-md-10">'
        +'              <div class="input-group demo2">'
        +'		     	   <input type="text" value="#ccc" name="color[]" class="form-control" />'
        +'		     	   <span class="input-group-addon"><i></i></span>'
        +'		        </div>'
        +'          </div>'
        +'          <span class="col-md-2">'
        +'              <span class="remove_it_v rmc btn btn-danger btn-icon icon-lg fa fa-trash" ></span>'
        +'          </span>'
        +'      </div>'
        );
    createColorpickers();
});		           

$('body').on('click', '.rmc', function(){
    $(this).parent().parent().remove();
});


$(document).ready(function() {
  $("form").submit(function(e){
   console.log('Imran');
   event.preventDefault();
});
});
</script>

<style>
	.btm_border{
		border-bottom: 1px solid #ebebeb;
		padding-bottom: 15px;	
	}
</style>
<script>
    $('#enableSizes').css('display','none');
    $( "#enableSize" ).click(function() {
        if(this.checked){
            $('#enableSizes').css('display','block')
        }
        if(!this.checked){
            $('#enableSizes').css('display','none')
        }
    });
</script>

<!--Bootstrap Tags Input [ OPTIONAL ]-->

