
<div id="content-container"> 
    <div id="page-title">
        <h1 class="page-header text-overflow"><?php echo translate('manage_site');?></h1>
    </div>
    <div class="tab-base">
        <div class="panel">
            <div class="tab-base tab-stacked-left">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#demo-stk-lft-tab-2"><?php echo translate('vendor_images');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-4"><?php echo translate('social_media');?></a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#demo-stk-lft-tab-5"><?php echo translate('SEO');?></a>
                    </li>
                </ul>

                <div class="tab-content bg_grey">
                    <span id="genset"></span>
                    <div id="demo-stk-lft-tab-2" class="tab-pane fade active in">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo translate('select_images');?></h3>
                                </div>
                                <?php
                                echo form_open(base_url() . 'vendor/vendor_images/', array(
                                    'class' => 'form-horizontal',
                                    'method' => 'post',
                                    'id' => '',
                                    'enctype' => 'multipart/form-data'
                                ));
                                ?>
                                <?php
                                $this->db->where('vendor_id',$this->session->userdata('vendor_id'));
                                $query=$this->db->get('vendor');
                                $result=$query->result();
                                
                                ?>
                                <input type="hidden" name="preLogo" id="preLogo"
                                value="<?php echo $result[0]->logo ?>">

                                <input type="hidden" name="preBanner" id="preBanner"
                                value="<?php echo $result[0]->banner ?>">
                                <div class="form-group margin-top-10">
                                    <label class="col-sm-3 control-label margin-top-10" for="demo-hor-inputemail"><h5><?php echo translate('logo');?></h5> <br><i>(<?php echo translate('suggested_width');?>:<?php echo translate('height');?> - 300px:300px*)</i></label>
                                    <div class="col-sm-9">
                                        <div class="col-sm-2">
                                            <?php if(!empty($result[0]->logo)) {?>
                                           
                                                <img class="img-responsive img-md img-border" src="<?php echo base_url(); ?>uploads/vendor_logo_image/<?php echo $result[0]->logo ?>" id="blah" style="width:auto !important;" >
                                            <?php }else{ ?>
                                                <img class="img-responsive img-md img-border" src="<?php echo base_url(); ?>uploads/vendor_logo_image/default.jpg" id="blah" style="width:auto !important;" >
                                            <?php }?>
                                        </div>
                                        <div class="col-sm-2">
                                            <span class="pull-left btn btn-default btn-file" style="margin-top: -3px;">
                                                <?php echo translate('select_logo');?>
                                                <input type="file" name="logo" class="form-control" accept="image/*"  id="imgInp">
                                            </span>
                                            <span onclick="deleteLogo()" class="pull-left btn btn-default btn-file margin-top-10">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </span>
                                        </div>


                                        <div class="col-sm-5"></div>
                                    </div>
                                </div><hr>
                                <div class="form-group margin-top-10">
                                    <label class="col-sm-3 control-label margin-top-10" for="demo-hor-inputemail">
                                        <h5><?php echo translate('cover_photo'); ?></h5> 
                                        <br>
                                        <i>(<?php echo translate('suggested_width');?>:<?php echo translate('height');?> - 1140px:320px*)</i>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="col-sm-12">
                                           <?php if(!empty($result[0]->banner)) {?>
                                            <img class="img-responsive img-lg img-border" src="<?php echo base_url(); ?>uploads/vendor_banner_image/<?php echo $result[0]->banner ?>" id="blahn" style="width:auto !important; height:320px;">
                                        <?php }else{ ?>
                                           <img class="img-responsive img-lg img-border" src="<?php echo base_url(); ?>uploads/vendor_banner_image/default.jpg" id="blahn" style="width:auto !important; height:320px;">
                                       <?php }?>
                                   </div>
                                   <div class="col-sm-2">
                                    <span class="pull-left btn btn-default btn-file margin-top-10">
                                        <?php echo translate('select_photo');?>
                                        <input type="file" name="banner" class="form-control" accept="image/*"  id="imgInpn">
                                    </span>
                                </div>
                                <div class="col-sm-3">
                                    <span onclick="deleteBanner()" class="pull-left btn btn-default btn-file margin-top-10">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="col-sm-5"></div>
                            </div>
                        </div>
                        <br />
                        <div class="panel-footer text-right">
                            <span class="btn btn-success btn-labeled fa fa-check submitter enterer"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                                <?php echo translate('save');?>
                            </span>
                        </div>
                    </form> 
                </div>              
            </div>
        </div>

        <!--UPLOAD : SOCIAL LINKS---------->
        <div id="demo-stk-lft-tab-4" class="tab-pane fade <?php if($tab_name=="social_links") {?>active in<?php } ?>">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo translate('social_links');?></h3>
                </div>
                <?php
                echo form_open(base_url() . 'vendor/social_links/set/', array(
                    'class' => 'form-horizontal',
                    'method' => 'post',
                    'id' => '',
                    'enctype' => 'multipart/form-data'
                ));
                ?>
                <div class="panel-body">
                    <!--FACEBOOK---------->
                    <div class="form-group mar-btm">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <div class="input-group mar-btm">
                                <span class="input-group-addon fb_font">
                                    <i class="fa fa-facebook-square fa-lg"></i>
                                </span>
                                <input type="text" name="facebook" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'facebook'); ?>" id="demo-hor-inputemail" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!--G+---------->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" ></label>
                        <div class="col-sm-6">
                            <div class="input-group mar-btm">
                                <span class="input-group-addon g_font">
                                    <i class="fa fa-google-plus-square fa-lg"></i>
                                </span>
                                <input type="text" name="google-plus" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'google_plus'); ?>" id="demo-hor-inputemail" class="form-control">
                            </div>

                        </div>
                    </div>
                    <!--TWITTER---------->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" ></label>
                        <div class="col-sm-6">
                            <div class="input-group mar-btm">
                                <span class="input-group-addon tw_font">
                                    <i class="fa fa-twitter-square fa-lg"></i>
                                </span>
                                <input type="text" name="twitter" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'twitter'); ?>" id="demo-hor-inputemail" class="form-control">
                            </div>

                        </div>
                    </div>
                    <!--PINTEREST---------->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" ></label>
                        <div class="col-sm-6">
                            <div class="input-group mar-btm">
                                <span class="input-group-addon pin_font">
                                    <i class="fa fa-pinterest fa-lg"></i>
                                </span>
                                <input type="text" name="pinterest" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'pinterest'); ?>" id="demo-hor-inputemail" class="form-control">
                            </div>

                        </div>
                    </div>
                    <!--SKYPE---------->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" ></label>
                        <div class="col-sm-6">
                            <div class="input-group mar-btm">
                                <span class="input-group-addon skype_font">
                                    <i class="fa fa-skype fa-lg"></i>
                                </span>
                                <input type="text" name="skype" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'skype'); ?>" id="demo-hor-inputemail" class="form-control">
                            </div>

                        </div>
                    </div>
                    <!--YOUTUBE---------->
                    <div class="form-group">
                        <label class="col-sm-3 control-label" ></label>
                        <div class="col-sm-6">
                            <div class="input-group mar-btm">
                                <span class="input-group-addon youtube_font">
                                    <i class="fa fa-youtube fa-lg"></i>
                                </span>
                                <input type="text" name="youtube" value="<?php echo $this->crud_model->get_type_name_by_id('vendor',$this->session->userdata('vendor_id'),'youtube'); ?>" id="demo-hor-inputemail" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <!--SAVE---------->
                <div class="panel-footer text-right">
                    <span class="btn btn-success btn-labeled fa fa-check submitter enterer"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                        <?php echo translate('save');?>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <!-- START : MANAGE SEO------>
    <div id="demo-stk-lft-tab-5" class="tab-pane fade">
       <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading margin-bottom-20">
                <h3 class="panel-title">
                    <?php echo translate('manage_search_engine_optimization');?>
                </h3>
            </div>
            <?php 
            $description =  $this->db->get_where('vendor',array('vendor_id' => $this->session->userdata('vendor_id')))->row()->description;
            $keywords =  $this->db->get_where('vendor',array('vendor_id' => $this->session->userdata('vendor_id')))->row()->keywords;
            $seo_title =  $this->db->get_where('vendor',array('vendor_id' => $this->session->userdata('vendor_id')))->row()->seo_title;
            $seo_description =  $this->db->get_where('vendor',array('vendor_id' => $this->session->userdata('vendor_id')))->row()->seo_description;
            ?>
            <?php
            echo form_open(base_url() . 'vendor/seo_settings/set', array(
                'class' => 'form-horizontal',
                'method' => 'post',
                'id' => '',
                'enctype' => 'multipart/form-data'
            ));
            ?>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="demo-hor-inputemail">
                    <?php echo translate('keywords'); ?>
                </label>
                <div class="col-sm-8">
                    <div class="col-sm-">
                        <input type="text"  data-role="tagsinput" name="keywords" value="<?php echo $keywords; ?>" class="form-control" >
                    </div>
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-10"><small>*<?php echo translate('Write an seo friendly title within 60 characters')?></small></div>
                <label class="col-sm-2 control-label" for="">
                    <?php echo translate('Seo Friendly Title');?>
                </label>
                <div class="col-sm-8">
                    <input type="text" name="seo_title" value="<?php echo $seo_title; ?>"
                    placeholder="<?php echo translate('Ex. Nike - Just do it')?>"
                    class="form-control required">
                </div>
                <div class="col-sm-2"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-2"></div>
                <div class="col-sm-10"><small>*<?php echo translate('Write an seo friendly description within 160 characters')?></small></div>
                <label class="col-sm-2 control-label" for="">
                    <?php echo translate('Seo Friendly Description');?>
                </label>
                <div class="col-sm-8">
                    <textarea name="seo_description"
                    placeholder="<?php echo translate('Ex. Find best athletic shoes in North America and Europe')?>"
                    class="form-control required" rows='4' ><?php echo $seo_description; ?></textarea>
                </div>
                <div class="col-sm-2"></div>
            </div>

            <div class="panel-footer text-right">
                <span class="btn btn-success btn-labeled fa fa-check submitter enterer"  data-ing='<?php echo translate('saving'); ?>' data-msg='<?php echo translate('settings_updated!'); ?>'>
                    <?php echo translate('save');?></span>
                </div>
            </form>               
        </div>
    </div> 
</div>
</div>
</div>
</div>
</div>
</div>
<div style="display:none;" id="site"></div>
<!-- for logo settings -->
<script>
    function deleteLogo() {
      img_url = "<?php echo base_url(); ?>uploads/vendor_logo_image/default.jpg";
      console.log(img_url);
      document.getElementById("blah").src = img_url;
      $(('#preLogo')).val('');
      $(('input[name=logo]')).val('');
      
      
  }
  function deleteBanner() {
      img_url = "<?php echo base_url(); ?>uploads/vendor_banner_image/default.jpg";
      document.getElementById("blahn").src = img_url;
      $(('#preBanner')).val('');
      $(('input[name=banner]')).val('');
      
      
  }
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wrap').hide('fast');
            $('#blah').attr('src', e.target.result);
            $('#wrap').show('fast');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});

function readURLn(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blahn').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInpn").change(function(){
    readURLn(this);
});


var base_url = '<?php echo base_url(); ?>'
var user_type = 'vendor';
var module = 'site_settings';
var list_cont_func = 'show_all';

$(document).ready(function() {
  $("form").submit(function(e){
     return false;
 });

});


</script>
<script src="<?php echo base_url(); ?>template/back/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js">
</script>
