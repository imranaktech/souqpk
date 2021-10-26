
 <script>


//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(showPosition);
//   } else { 
//     x.innerHTML = "Geolocation is not supported by this browser.";
//   }


// function showPosition(position) {
//   // x.innerHTML = "Latitude: " + position.coords.latitude + 
//   // "<br>Longitude: " + position.coords.longitude;
//   var LAT =  position.coords.latitude;
//   var LNG =  position.coords.longitude;
//   var x="";
//   var KEY = "AIzaSyCCRBkZF7_fyFPoXwQVjjtpc6f29OymUto";
//   var locAPI=  `https://maps.googleapis.com/maps/api/geocode/json?latlng=${LAT},${LNG}&key=${KEY}`;
//       fetch(locAPI)
//         .then(response => response.json())
//         .then(data => {
//           console.log(data);
//           var parts = data .results[0].address_components;
//           parts.forEach(part => {
//             if (part.types.includes("locality")) {
//               x = part.long_name;
//               document.getElementById(x).selected = "true";
   
//             }
//           });
//         })
//         .catch(err => console.warn(err.message));


    
// }
// </script>
<!-- Header top bar -->
<div class="top-bar">
    <div class="container" style="padding: 2px;height: 40px;">
        <div class="top-bar-left">
            <ul class="list-inline">
                <li class="dropdown flags">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                            if($set_lang = $this->session->userdata('language')){} else {
                                $set_lang = $this->db->get_where('general_settings',array('type'=>'language'))->row()->value;
                            }
                            $lid = $this->db->get_where('language_list',array('db_field'=>$set_lang))->row()->language_list_id;
                            $lnm = $this->db->get_where('language_list',array('db_field'=>$set_lang))->row()->name;
                        ?>
                        <!--                        <img src="--><?php //echo $this->crud_model->file_view('language_list',$lid,'','','no','src','','','.jpg') ?><!--" width="20px;" alt=""/>-->
                        <img src="<?php echo base_url(); ?>uploads/others/language.png" width="20px;" alt=""/>
                        <!--                        <span class="fa fa-globe"></span>-->
                        <span class="hidden-xs"><?php echo strtoupper(substr($lnm,0,2)); ?></span><i class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="dropdown-menu">
                            <?php
                                $langs = $this->db->get_where('language_list',array('status'=>'ok'))->result_array();
                                foreach ($langs as $row)
                                {
                            ?>
                                <li <?php if($set_lang == $row['db_field']){ ?>class="active"<?php } ?> >
                                    <a class="set_langs" data-href="<?php echo base_url(); ?>home/set_language/<?php echo $row['db_field']; ?>">
<!--                                        <img src="--><?php //echo $this->crud_model->file_view('language_list',$row['language_list_id'],'','','no','src','','','.jpg') ?><!--" width="20px;" alt=""/>-->
                                        <?php echo $row['name']; ?>
                                        <?php if($set_lang == $row['db_field']){ ?>
                                            <i class="fa fa-check"></i>
                                        <?php } ?>
                                    </a>
                                </li>
                            <?php
                                }
                            ?>
                    </ul>
                </li>
                <li class="dropdown flags" style="z-index: 1001;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                            if($currency_id = $this->session->userdata('currency')){} else {
                                $currency_id = $this->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
                            }
                            $symbol = $this->db->get_where('currency_settings',array('currency_settings_id'=>$currency_id))->row()->symbol;
                            $c_name = $this->db->get_where('currency_settings',array('currency_settings_id'=>$currency_id))->row()->name;
                        ?>
                        <span class="hidden-xs"><?php echo $c_name; ?></span> (<?php echo $symbol; ?>)
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <?php
                            $currencies = $this->db->get_where('currency_settings',array('status'=>'ok'))->result_array();
                            foreach ($currencies as $row)
                            {
                        ?>
                            <li <?php if($currency_id == $row['currency_settings_id']){ ?>class="active"<?php } ?> >
                                <a class="set_langs" data-href="<?php echo base_url(); ?>home/set_currency/<?php echo $row['currency_settings_id']; ?>">
                                    <?php echo $row['name']; ?> (<?php echo $row['symbol']; ?>)
                                    <?php if($currency_id == $row['currency_settings_id']){ ?>
                                        <i class="fa fa-check"></i>
                                    <?php } ?>
                                </a>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>
                <?php if($this->crud_model->get_type_name_by_id('general_settings','83','value') == 'ok'){ ?>
                    <li class="" style="z-index: 1001;" i>
                        <a href="<?=base_url()?>home/premium_package" class="" >
                            <i class="fa fa-gift"></i> <?php echo translate('premium_packages');?>
                        </a>
                    </li>
                <?php } ?>
                <?php if(demo()) { ?>
                    <li class="dropdown flags" style="z-index: 1001;">
                        <i class="text-danger blink_me fa fa-exclamation-triangle" style="font-size: 16px"></i>
                        For demo purpose many operations including deletion,emailing,file uploading are <strong>DISABLED</strong>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="top-bar-right" >
            ----- ----- -----
        </div>
    </div>
</div>
<!-- /Header top bar -->
<!-- After search bar -->
<div class="top-bar" style="display: none;">
    <div class="container">
        <div class="top-bar-left">
            <ul class="list-inline">
                <li class="dropdown flags">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        if($set_lang = $this->session->userdata('language')){} else {
                            $set_lang = $this->db->get_where('general_settings',array('type'=>'language'))->row()->value;
                        }
                        $lid = $this->db->get_where('language_list',array('db_field'=>$set_lang))->row()->language_list_id;
                        $lnm = $this->db->get_where('language_list',array('db_field'=>$set_lang))->row()->name;
                        ?>
                        <img src="<?php echo $this->crud_model->file_view('language_list',$lid,'','','no','src','','','.jpg') ?>" width="20px;" alt=""/> <span class="hidden-xs"><?php echo $lnm; ?></span><i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="dropdown-menu">
                        <?php
                        $langs = $this->db->get_where('language_list',array('status'=>'ok'))->result_array();
                        foreach ($langs as $row)
                        {
                            ?>
                            <li <?php if($set_lang == $row['db_field']){ ?>class="active"<?php } ?> >
                                <a class="set_langs" data-href="<?php echo base_url(); ?>home/set_language/<?php echo $row['db_field']; ?>">
                                    <img src="<?php echo $this->crud_model->file_view('language_list',$row['language_list_id'],'','','no','src','','','.jpg') ?>" width="20px;" alt=""/>
                                    <?php echo $row['name']; ?>
                                    <?php if($set_lang == $row['db_field']){ ?>
                                        <i class="fa fa-check"></i>
                                    <?php } ?>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="dropdown flags" style="z-index: 1001;">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        if($currency_id = $this->session->userdata('currency')){} else {
                            $currency_id = $this->db->get_where('business_settings', array('type' => 'currency'))->row()->value;
                        }
                        $symbol = $this->db->get_where('currency_settings',array('currency_settings_id'=>$currency_id))->row()->symbol;
                        $c_name = $this->db->get_where('currency_settings',array('currency_settings_id'=>$currency_id))->row()->name;
                        ?>
                        <span class="hidden-xs"><?php echo $c_name; ?></span> (<?php echo $symbol; ?>)
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul role="menu" class="dropdown-menu">
                        <?php
                        $currencies = $this->db->get_where('currency_settings',array('status'=>'ok'))->result_array();
                        foreach ($currencies as $row)
                        {
                            ?>
                            <li <?php if($currency_id == $row['currency_settings_id']){ ?>class="active"<?php } ?> >
                                <a class="set_langs" data-href="<?php echo base_url(); ?>home/set_currency/<?php echo $row['currency_settings_id']; ?>">
                                    <?php echo $row['name']; ?> (<?php echo $row['symbol']; ?>)
                                    <?php if($currency_id == $row['currency_settings_id']){ ?>
                                        <i class="fa fa-check"></i>
                                    <?php } ?>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <?php if($this->crud_model->get_type_name_by_id('general_settings','83','value') == 'ok'){ ?>
                    <li class="dropdown flags" style="z-index: 1001;">
                        <a href="<?=base_url()?>home/premium_package" class="" >
                            <i class="fa fa-gift"></i> <?php echo translate('premium_packages');?>
                        </a>
                    </li>
                <?php } ?>
                <?php if(demo()) { ?>
                    <li class="dropdown flags" style="z-index: 1001;">
                        <i class="text-danger blink_me fa fa-exclamation-triangle" style="font-size: 16px"></i>
                        For demo purpose many operations including deletion,emailing,file uploading are <strong>DISABLED</strong>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="top-bar-right">
            ----- ----- -----
        </div>
    </div>
</div>
<!-- After search bar -->


<!-- HEADER -->
<header class="header header-logo-left" style="position: sticky;top: 0;width: 100%;z-index: 999;">
    <div class="header-wrapper">
        <div class="container">
            <div class="flex-row">
                <div class="flex-col-6 flex-col-lg-auto" style="padding-right: 20px; padding-left: 0px;">
                    <!-- Logo -->
                    <div class="logo">
                        <?php
                            $home_top_logo = $this->db->get_where('ui_settings',array('type' => 'home_top_logo'))->row()->value;
                        ?>
                        <a href="<?php echo base_url();?>">
                <picture>
                    <source media="(max-width: 768px)" srcset="<?php echo base_url(); ?>uploads/logo_image/logo_<?php echo $home_top_logo; ?>.png" alt="SuperShop">
                    <source media="(max-width 600px)" srcset="<?php echo base_url(); ?>uploads/logo_image/logo_<?php echo $home_top_logo; ?>.png" alt="SuperShop">
                    <img src="<?php echo base_url(); ?>uploads/logo_image/logo_<?php echo $home_top_logo; ?>.png" alt="SuperShop"/>
                    
                </picture>
                            
                        </a>
                    </div>
                    <!-- /Logo -->
                </div>
                <div class="flex-col flex-order-last flex-order-lg-0" >
                    <!-- Header search -->
                    <div class="header-search mt-4 mt-lg-0 px-xl-5">                            
                        <?php
                            echo form_open(base_url() . 'home/text_search/', array(
                                'method' => 'post',
                                'accept-charset' => "UTF-8"
                            ));
                        ?>
                                
                                   <div class="searc_text_div" >
                                    <input class="form-control" type="text" name="query"  accept-charset="utf-8" placeholder="<?php echo translate('what_are_you_looking_for');?>?"/>
                                </div>
                                <div class="header_responsive_div" >
                                    <div class="multi-button">
                                        <a>
                                       <div class="header_category_div" >
                                    <select
                                        class="selectpicker" data-live-search="true" name="category"
                                        data-toggle="tooltip" title="<?php echo translate('select');?>" >
                                        <option value="0"><?php echo translate('all_categories');?></option>
                                        <?php 
                                            $categories = $this->db->get('category')->result_array();
                                            foreach ($categories as $row1) {
                                                if($this->crud_model->if_publishable_category($row1['category_id'])){
                                        ?>
                                        <option value="<?php echo $row1['category_id']; ?>"><?php echo translate($row1['category_name']); ?></option>
                                        <?php 
                                                }
                                            }
                                        ?>
                                    </select>
                                </div></a>
                                <a>
                                <div class="header_c_product_div" >
                                
                                    <?php
                                        if ($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok') {
                                    ?>
                                    <select
                                        class="selectpicker" data-live-search="false" name="type" onchange="header_search_set(this.value);"
                                        data-toggle="tooltip" title="<?php echo translate('select');?>" >
                                        <option value="product"><?php echo translate('product');?></option>
                                        <option value="vendor"><?php echo translate('vendor');?></option>
                                    </select>
                                    <?php
                                    }
                                ?>
                                </div></a>
                                <a>
                                
                                <div class="header_search_cit_div" >
                                    <select id="id01" class="selectpicker " data-live-search="true" name="city" onchange=""
                                        data-toggle="tooltip" title="<?php echo translate('select');?>" >
                                        <option  value="1" selected>Choose City</option>

                                        <?php
                                        $cities = $this->db->get_where("ws_city",array("country_code"=>"PK"))->result_array();
                                        // foreach ($cities as $city) {
                                        //     if($city["city_name"] == $vat){
                                        //     echo '<option value="'.$city["id"].'">'.$city["city_name"].'</option>';}
                                            
                                        // }
                                        foreach ($cities as $cityes) {
                                            if($city["city_name"] != "Karachi"){
                                            echo '<option id="'.$cityes["city_name"].'" value="'.$cityes["id"].'">'.$cityes["city_name"].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>  
                                    </div></a>
                                </div>
                                    <p id='mySelect' ></p>
                                    <div class="header_search_product_div" >
                                
                                <button class="shrc_btn" ><i class="fa fa-search" ></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /Header search farooq -->
                </div>
                <div class="flex-col-6 flex-col-lg-auto text-right" style="width:310px;">
                    <!-- Header shopping cart -->
                    <div class="header-cart">
                        <div class="cart-wrapper">
                            <div class="compare" style="width: 60px;float: left;">
                            <a href="<?php echo base_url(); ?>home/compare" class="btn btn-theme-transparent" id="compare_tooltip" data-toggle="tooltip" data-original-title="<?php echo $this->crud_model->compared_num(); ?>" data-placement="right" >
                                <i class="fa fa-bar-chart"></i>
                                <span class="hidden-md hidden-sm hidden-xs"><?php echo translate(''); ?></span><br>
                                <span id="compare_num">
                                    <?php echo $this->crud_model->compared_num(); ?>
                                </span>
                            </a>
                                <strong><span class="hidden-md hidden-sm hidden-xs" ><?php echo translate('Compare'); ?></span></strong>
                            </div>
                            <div class="wishlist" style="width: 70px;float: left;">
                            <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-heart">
                                <i class="fa fa-heart-o"></i>
                                <span class="hidden-xs"> <br>
                                    <span class="heart_num"></span>
                                    <?php echo translate(''); ?>
                                </span>
                            </a>
                                <strong><span class="hidden-md hidden-sm hidden-xs" ><?php echo translate('Wishlist'); ?></span></strong>
                            </div>
                            <div class="cart" style="width: 70px;float: left;">
                            <a href="#" class="btn btn-theme-transparent cart_toggle" onclick="go_to_checkout(this)" onmouseover="show_cart(this)" data-toggle="modal" data-target="#popup-cart">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="hidden-xs"> 
                                    <span class="cart_num"></span>
                                    <?php echo translate(''); ?>
                                <i class="fa fa-angle-down" style="position: absolute;bottom: 0;top: -23px;display:none;right: 53px;align-items: center;"></i>
                                    </span>
                            </a>
                                <strong><span class="hidden-md hidden-sm hidden-xs" ><?php echo translate('Cart'); ?> &nbsp;</span></strong>
                            </div>
<!--                            <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-user">-->
<!--                                <i class="fa fa-user-o"></i>-->
<!--                                <span class="hidden-xs">-->
<!--                                    <span class="user_num"></span>-->
<!--                                    --><?php //echo translate(''); ?>
<!---->
<!--                                </span>-->
<!--                            </a>-->
                            <!-- Mobile menu toggle button -->
                            <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars" style="margin-left: -8px;
    margin-top: -37px;"></i></a>
                            <!-- /Mobile menu toggle button -->
                        </div>
                    </div>
                    <!-- Header shopping cart -->
                </div>
            </div>
        </div>
    </div>

    <!-- Main Menu -->
    <div class="navigation-wrapper" >
        <div class="container" id="containers">
            <!-- Navigation -->
            <?php
                $others_list=$this->uri->segment(3);
            ?>
            <nav class="navigation closed clearfix">
                <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                <ul class="nav sf-menu" >
                    <?php if($this->db->get_where('ui_settings',array('type'=>'header_homepage_status'))->row()->value == 'yes'){?>
                    <li <?php if($asset_page=='home'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home">
                            <?php echo translate('homepage');?>
                        </a>
                    </li>
                    <?php }?>
                    <?php /*if($this->db->get_where('ui_settings',array('type'=>'header_all_categories_status'))->row()->value == 'yes'){?>
                    <li class="hidden-sm hidden-xs <?php if($asset_page=='all_category'){ echo 'active'; } ?>">
                        <a href="<?php echo base_url(); ?>home/all_category">
                            <?php echo translate('all_categories');?>
                        </a>
                        <ul>*/?>

                        <li class="hidden-lg hidden-md <?php if($asset_page=='all_category'){ echo 'active'; } ?>">
                        <a href="#">
                            <?php echo translate('all_categories');?>
                        </a>
                        <ul>
                            <?php
                                $all_category = $this->db->get('category')->result_array();
                                foreach($all_category as $row)
                                {
                                    if($this->crud_model->if_publishable_category($row['category_id'])){
                                    
                            ?>
                            <li>
                                <?php $sub_categories = $this->db->get('sub_category')->result_array();
                                foreach($sub_category as $row1){
                                    if($row1['category']==$row['category_id']  ){
                                
                                ?>
                                <a href="<?php echo base_url(); ?>home/category/<?php echo $row['category_id']; ?>" >
                                    <?php echo translate($row1['category_name']); ?>
                                </a>
                                <?php }}?>
                            </li>
                            <?php
                                    }
                                }
                            ?>
                        </ul>
                    </li>
                    <li class="hidden-lg hidden-md <?php if($asset_page=='all_category'){ echo 'active'; } ?>">
                        <a href="<?php echo base_url(); ?>home/all_category">
                            <?php echo translate('all_sub_categories');?>
                        </a>
                    </li>

                    
                                <?php
                                $all_category = $this->db->order_by("category_name", "asc")->get('category')->result_array();
                                foreach($all_category as $row)
                                {
                                    if($this->crud_model->if_publishable_category($row['category_id'])){
                                        if($row['category_name']!='gadgets'){
                                        ?>
                                        <li id="li1">
                                            <a href="javascript:;" style=" font-size: 12px;font-weight: bold;">

                                                <?php echo translate($row['category_name']);?>
                                            </a> 
                                            <ul>
                                                <li>
                                                    <?php 
                                                    $condition = array('category_id' => $row['category_name']);
                                                    $sub_categories = $this->db->get('sub_category')
                                                    ->result_array();                        
                                                    foreach($sub_categories as $row1){
                                                        if($row1['category']==$row['category_id']){
                                                            ?>
                                                            <a href="<?php echo base_url(); ?>home/category/<?php echo $row['category_id']; ?>/<?php echo $row1['sub_category_id'];?>" >
                                                                <?php echo translate($row1['sub_category_name']); ?>

                                                                (<?php echo $this->crud_model->is_publishable_count('sub_category',$row1['sub_category_id']); ?>)
                                                            </a>
                                                        <?php }}
                                                        ?>
                                                    </li>
                                                </ul>
                                            </li>
                                            <?php
                                        }
                                        }
                                    }
                                    ?>
                           
                           
                           
                    
                    <?php if($this->db->get_where('ui_settings',array('type'=>'header_featured_products_status'))->row()->value == 'yes'){?>
                    <!--<li class="<?php if($others_list=='featured'){ echo 'active'; } ?>">-->
                    <!--    <a href="<?php echo base_url(); ?>home/featured" style=" font-size: 12px;font-weight: bold;">-->
                    <!--        <?php echo translate('featured_products');?>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <?php } if($this->db->get_where('ui_settings',array('type'=>'header_todays_deal_status'))->row()->value == 'yes'){?>
                    <!--<li class="<?php if($others_list=='todays_deal'){ echo 'active'; } ?>">-->
                    <!--    <a href="<?php echo base_url(); ?>home/todays_deal" style=" font-size: 12px;font-weight: bold;">-->
                    <!--        <?php echo translate('today\'s_deal');?>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <?php }?>
                    <?php if($this->crud_model->get_type_name_by_id('general_settings','82','value') == 'ok'){
                            if($this->db->get_where('ui_settings',array('type'=>'header_bundled_product_status'))->row()->value == 'yes'){ ?>
                    <li <?php if($page_name=='bundled_product'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/bundled_product">
                            <?php echo translate('bundled_product');?>
                        </a>
                    </li>
                     <?php } }?>
                    <?php if(0){
                            if(1){ ?>
                    <li <?php if($page_name=='customer_product_bulk_upload'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/customer_product_bulk_upload">
                            <?php echo translate('Bulk upload');?>
                        </a>
                    </li>
                    <?php }} if($this->crud_model->get_type_name_by_id('general_settings','83','value') == 'ok'){
                                if($this->db->get_where('ui_settings',array('type'=>'header_classifieds_status'))->row()->value == 'yes'){?>
                    <li <?php if($page_name=='customer_products'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/customer_products">
                            <?php echo translate('classifieds');?>
                        </a>
                    </li>
                    <?php }} if ($this->crud_model->get_type_name_by_id('general_settings','58','value') !== 'ok') {
                                if($this->db->get_where('ui_settings',array('type'=>'header_latest_products_status'))->row()->value == 'yes'){
                    ?>
                    <li class="<?php if($others_list=='latest'){ echo 'active'; } ?>">
                        <a href="<?php echo base_url(); ?>home/others_product/latest">
                            <?php echo translate('latest_products');?>
                        </a>
                    </li>
                    <?php
                        }}
                    ?>
                    <?php
                        if ($this->crud_model->get_type_name_by_id('general_settings','68','value') == 'ok') {
                            if($this->db->get_where('ui_settings',array('type'=>'header_all_brands_status'))->row()->value == 'yes') {
                    ?>
                    <li <?php if($asset_page=='all_brands'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/all_brands">
                            <?php echo translate('all_brands');?>
                        </a>
                    </li>
                    <?php
                        }
                    }
                    ?>
                    <?php
                        if ($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok') {
                            if ($this->crud_model->get_type_name_by_id('general_settings','81','value') == 'ok'){
                                if($this->db->get_where('ui_settings',array('type'=>'header_all_vendors_status'))->row()->value == 'yes') {
                    ?>
                    <li <?php if($asset_page=='all_vendor'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/all_vendor/">
                            <?php echo translate('all_vendors');?>
                        </a>
                    </li>
                    <?php
                                }
                            } 
                        }
                    ?>
                    <?php if($this->db->get_where('ui_settings',array('type'=>'header_blogs_status'))->row()->value == 'yes') {?>
                    <li class="hidden-sm hidden-xs <?php if($asset_page=='blog'){ echo 'active'; } ?>">
                        <a href="<?php echo base_url(); ?>home/blog">
                            <?php echo translate('blogs');?>
                        </a>
                        <ul>
                            <?php
                                $blogs=$this->db->get('blog_category')->result_array();
                                foreach($blogs as $row){
                            ?>
                            <li>
                                <a href="<?php echo base_url(); ?>home/blog/<?php echo $row['blog_category_id']; ?>">
                                    <?php echo $row['name']; ?>
                                </a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </li>
                    <?php }?>
                   
                    <?php
                        if ($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok' && $this->crud_model->get_type_name_by_id('general_settings','81','value') == 'ok') {
                            if($this->db->get_where('ui_settings',array('type'=>'header_store_locator_status'))->row()->value == 'yes') {
                    ?>
                    <li <?php if($asset_page=='store_locator'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/store_locator">
                            <?php echo translate('store_locator');?>
                        </a>
                    </li>
                    <?php
                            }
                        }
                    ?>
                    <?php if($this->db->get_where('ui_settings',array('type'=>'header_contact_status'))->row()->value == 'yes') {?>
                    <li <?php if($asset_page=='contact'){ ?>class="active"<?php } ?>>
                        <a href="<?php echo base_url(); ?>home/contact">
                            <?php echo translate('contact');?>
                        </a>
                    </li>
                    <?php } if($this->db->get_where('ui_settings',array('type'=>'header_more_status'))->row()->value == 'yes') {?>
                    <li>
                        <a href="#">
                            <?php echo translate('more');?>
                        </a>
                        <ul>
                            <?php
                                if ($this->crud_model->get_type_name_by_id('general_settings','58','value') == 'ok') {
                            ?>
                            <li class="<?php if($others_list=='latest'){ echo 'active'; } ?>">
                                <a href="<?php echo base_url(); ?>home/others_product/latest">
                                    <?php echo translate('latest_products');?>
                                </a>
                            </li>
                            <?php
                                }
                            ?>
                            <?php
                            $this->db->where('status','ok');
                            $all_page = $this->db->get('page')->result_array();
                            foreach($all_page as $row2){
                            ?>
                            <li>
                                <a href="<?php echo base_url(); ?>home/page/<?php echo $row2['parmalink']; ?>">
                                    <?php echo $row2['page_name']; ?>
                                </a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <?php }?>
                </ul>
            </nav>
            <!-- /Navigation -->
        </div>
    </div>
    <!-- End Main Menu -->

</header>
<!-- /HEADER -->
<!-- /HEADER -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.set_langs').on('click',function(){
            var lang_url = $(this).data('href');                                    
            $.ajax({url: lang_url, success: function(result){
                location.reload();
            }});
        });
        $('.top-bar-right').load('<?php echo base_url(); ?>home/top_bar_right');
    });
</script>
<script>
  var list, i, switching, b, shouldSwitch;
  list = document.getElementById("id01");
  switching = true;
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // start by saying: no switching is done:
    switching = false;
    b = list.getElementsByTagName("option")
    // Loop through all list-items:
    for (i = 0; i < (b.length - 1); i++) {
      // start by saying there should be no switching:
      shouldSwitch = false;
      /* check if the next item should
      switch place with the current item: */
      if (b[i].innerHTML.toLowerCase() > b[i + 1].innerHTML.toLowerCase()) {
        /* if next item is alphabetically
        lower than current item, mark as a switch
        and break the loop: */
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark the switch as done: */
      b[i].parentNode.insertBefore(b[i + 1], b[i]);
      switching = true;
    }
  }

</script>
<?php
if ($this->crud_model->get_type_name_by_id('general_settings','58','value') !== 'ok') {
?>
<style>
.header.header-logo-left .header-search .header-search-select .dropdown-toggle {
    right: 40px !important;
}
</style>
<?php
}
?>
<script>
    function show_cart(obj) {
        $("#popup-cart").addClass('in');
        $("#popup-cart").css("display", "block");
    }
    function hide_cart(obj) {
        $("#popup-cart").removeClass('in');
        $("#popup-cart").css("display", "none");
    }
    $(document).on("click","body", function () {
        var item = $(this).attr('id'); // or var clickedBtnID = this.id
        if(item!="popup-cart")
        {
            hide_cart(this);
        }
    });
    function go_to_checkout(obj) {
        hide_cart(this);
        window.location="http://souqpk.com/home/cart_checkout";
    }
</script>
<style>
    #popup-cart{
        margin-top: 8% !important;
    }
    #popup-cart .modal-dialog{
        margin-top: -7px !important;
        z-index: 9999999;
    }
    #containers {
        width: 100%;
}

#li1,#li2,#li3,#li4,#li5,#li6,#li7,#li8,#li9,#li10 {
    line-height: 1;
}

.searc_text_div{ width: 30%;}
.header_responsive_div{
    width: 72%; 
    top: -60px;
    left: 195px;
  position: relative;
  height: 45px;}
  .header_c_product_div,.header_category_div,.header_search_cit_div{
  position: absolute;
  top: 1px;
  right: 0;
  height: 40px;
  border: 1px solid #c5c5c5;}
  .header_search_product_div{
  position: absolute;
  top: 1px;
  right: 0;
  height: 40px;}
  
  .header_c_product_div{
  margin-right: 38%;
  width: 26%;}
.header_category_div{
  margin-right: 64%;
  width: 38%;}
.header_search_cit_div{
  margin-right: 10%;
  width: 28%;}
.header_search_product_div{
  margin-right: 0%;
  width: 10%;}

@media(max-width: 768px) {  
.searc_text_div{ width: 90%;}
/*.header_category_div:hover {*/
/*  font-size: 15%;}*/
.header_responsive_div{
    left: 0px;
    width: 100%; top: -0px;
  position: relative;
  height: 50px;}
  .header_c_product_div,.header_category_div,.header_search_cit_div{
  position: absolute;
  top: 1px;
  right: 0px;
  height: 45px;
  border: 1px solid #c5c5c5;}
  
  .header_c_product_div{
  margin-right: 1%;
  width: 100%;}
.header_category_div{
  margin-right: 1%;
  width: 100%;}
.header_search_cit_div{
  /*margin-right: 0%;*/
  width: 100%;}
.header_search_product_div{
  top: -42px;
  margin-right: 0%;
  }
    :root {
  /*--border-size: 0.125rem;*/
  --duration: 250ms;
  --ease: cubic-bezier(0.215, 0.61, 0.355, 1);
  /*--font-family: monospace;*/
  /*--color-primary: white;*/
  /*--color-secondary: black;*/
  /*--color-tertiary: dodgerblue;*/
  /*--shadow: rgba(0, 0, 0, 0.1);*/
  --space: 1rem;
}



.multi-button {
  display: flex;
  width: 100%;
  /*box-shadow: var(--shadow) 4px 4px;*/
}

.multi-button a {
  flex-grow: 1;
  cursor: pointer;
  position: relative;
  padding:
    calc(var(--space) / 1.125)
    var(--space)
    var(--space);
  /*border: var(--border-size) solid black;*/
  /*color: var(--color-secondary);*/
  /*background-color: var(--color-primary);*/
  /*font-size: 1.5rem;*/
  /*font-family: var(--font-family);*/
  /*text-transform: lowercase;*/
  /*text-shadow: var(--shadow) 2px 2px;*/
  transition: flex-grow var(--duration) var(--ease);
}

.multi-button a + a {
  border-left: var(--border-size) solid black;
  margin-left: calc(var(--border-size) * -1);
}

.multi-button a:hover,
.multi-button a:focus {
  flex-grow: 4;
  /*color: white;*/
  outline: none;
  /*text-shadow: none;*/
  /*background-color: var(--color-secondary);*/
}

.multi-button a:focus {
  outline: var(--border-size) dashed var(--color-primary);
  outline-offset: calc(var(--border-size) * -3);
}

.multi-button:hover a:focus:not(:hover) {
  flex-grow: 1;
  /*color: var(--color-secondary);*/
  /*background-color: var(--color-primary);*/
  /*outline-color: var(--color-tertiary);*/
}

.multi-button a:active {
  transform: translateY(var(--border-size));
}
/*.header_category_div:hover ,.header_search_cit_div:hover,.header_c_product_div:hover {*/
/* width: 50%;*/
/*}*/
/*.header_category_div:hover{*/
/* margin-right: 50%;}*/
}

@media(max-width 600px){
      
.searc_text_div{ width: 90%;}
/*.header_category_div:hover {*/
/*  font-size: 15%;}*/
.header_responsive_div{
    left: 0px;
    width: 100%; top: -0px;
  position: relative;
  height: 50px;}
  .header_c_product_div,.header_category_div,.header_search_cit_div{
  position: absolute;
  top: 1px;
  right: 0;
  height: 45px;
  border: 1px solid #c5c5c5;}
  
  .header_c_product_div{
  margin-right: 1%;
  width: 100%;}
.header_category_div{
  margin-right: 1%;
  width: 100%;}
.header_search_cit_div{
  /*margin-right: 0%;*/
  width: 100%;}
.header_search_product_div{
  top: -42px;
  margin-right: 0%;
  }
  :root {
  /*--border-size: 0.125rem;*/
  --duration: 250ms;
  --ease: cubic-bezier(0.215, 0.61, 0.355, 1);
  /*--font-family: monospace;*/
  /*--color-primary: white;*/
  /*--color-secondary: black;*/
  /*--color-tertiary: dodgerblue;*/
  /*--shadow: rgba(0, 0, 0, 0.1);*/
  --space: 1rem;
}



.multi-button {
  display: flex;
  width: 100%;
  /*box-shadow: var(--shadow) 4px 4px;*/
}

.multi-button a {
  /*flex-grow: 1;*/
  cursor: pointer;
  position: relative;
  padding:
    calc(var(--space) / 1.125)
    var(--space)
    var(--space);
  /*border: var(--border-size) solid black;*/
  /*color: var(--color-secondary);*/
  /*background-color: var(--color-primary);*/
  /*font-size: 1.5rem;*/
  /*font-family: var(--font-family);*/
  /*text-transform: lowercase;*/
  /*text-shadow: var(--shadow) 2px 2px;*/
  transition: flex-grow var(--duration) var(--ease);
}

.multi-button a + a {
  border-left: var(--border-size) solid black;
  margin-left: calc(var(--border-size) * -1);
}

.multi-button a:hover,
.multi-button a:focus {
  flex-grow: 5;
  /*color: white;*/
  outline: none;
  /*text-shadow: none;*/
  /*background-color: var(--color-secondary);*/
}

.multi-button a:focus {
  outline: var(--border-size) dashed var(--color-primary);
  outline-offset: calc(var(--border-size) * -3);
}

.multi-button:hover a:focus:not(:hover) {
  flex-grow: 1;
  /*color: var(--color-secondary);*/
  /*background-color: var(--color-primary);*/
  outline-color: var(--color-tertiary);
}

.multi-button a:active {
  transform: translateY(var(--border-size));
}
/*.header_category_div:hover ,.header_search_cit_div:hover,.header_c_product_div:hover {*/
/* width: 50%;*/
/*}*/
/*.header_category_div:hover{*/
/* margin-right: 50%;}*/
}
/*far*/
</style>