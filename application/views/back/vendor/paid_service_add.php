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
	.alert-success {
    background-color: #02C05F;
    border-color: transparent;
    color: #fff;
    font-weight: 300;
    width: 50%;
    margin: 50px 200px 20px auto;
    z-index: 999999999;
}
</style>
<div class="row">

	<div class="col-md-12">
		<?php
		echo form_open(base_url() . 'vendor/paid_services/do_add/', array(
			'class' => 'form-horizontal',
			'method' => 'post',
			'id' => 'paid_service_add',
			'enctype' => 'multipart/form-data'
		));
		?>
		<?php $venderInfo=$this->db->get_where('vendor', array('vendor_id' => $this->session->userdata('vendor_id')))->row();
		?>
		<!--Panel heading-->

		<div class="panel-body">

			<div class="tab-base">
				<!--Tabs Content-->
				<div class="tab-content">
					<?php if ($this->session->flashdata('success')) { ?>
						<div class="alert alert-success alert-dismissible show" role="alert" style="margin-top: 34px;">
							<?php echo $this->session->flashdata('success') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php } ?>
					<div id="product_details" class="tab-pane fade active in">

						<div class="form-group btm_border"><br>
							<h4 class="text-thin text-center"><?php echo translate('create_paid_service'); ?></h4>
						</div>

						<p class="text-center" id="error_message"  style="color: red"></p>
						<input type="hidden" name="price" value="100" id="price">

						<div class="form-group btm_border">
							<label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('vender_name');?></label>
							<div class="col-sm-6">
								<input type="text" name="vender_name" id="demo-hor-5" placeholder="Vender Name" class="form-control" value="<?php echo $venderInfo->name?>" readonly>
							</div>
						</div>  

						<div class="form-group btm_border">
							<label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('vender_phone');?></label>
							<div class="col-sm-6">
								<input type="text" name="vender_phone" id="demo-hor-5" placeholder="Vender Name" class="form-control" value="<?php echo $venderInfo->phone?>" readonly>
							</div>
						</div> 
						<div class="form-group">
							<label class="col-sm-4"></label>

							<div class="col-sm-2 custom-flex">
								<input onclick="getRadioValue('100')" checked="" type="radio" name="package" id="package" value="1"> <span>Silver (100)</span>
							</div>

							<div class="col-sm-2 custom-flex">
								<input onclick="getRadioValue('120')"  type="radio" name="package" id="package" value="2"> <span>Gold (120)</span>
							</div>

							<div class="col-sm-2 custom-flex">
								<input onclick="getRadioValue('150')"  type="radio" name="package" id="package" value="3"> <span>Platinum (150) </span>
							</div><br>
							
						</div>

						<div class="form-group btm_border" >
							<label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('Platform');?></label>
							<div class="col-sm-6">
								<select class="form-control"  id="platform" name="paltform"
								onchange="paltForm()">
								<option value="" selected="" disabled>Select Value</option>
								<option value="EasyPaisa">EasyPaisa</option>
								<option value="Jazzcash">JazzCash</option>
								<option value="Bank">Bank</option>
							</select>
						</div>
					</div>

					<div class="form-group  message" style="display: none;">
						<label class="col-sm-4 control-label" for="demo-hor-5"></label>
						<div class="col-sm-6">
							<div id="Message" class="form-control" style="height: 57px;">
								Total amount <span id="appendPrice"></span> transfer to this account  <span id="number">
								</span> and take screen shot and upload</div>
							</div>
						</div>

						<div class="form-group btm_border">
							<label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('other_number');?></label>
							<div class="col-sm-6">

								<input maxlength="13" type="text" name="other_number" id="demo-hor-5" placeholder="Other Number" pattern="\d{13}" title="Please enter exactly 10 digits" class="form-control" value="">
							</div>
						</div> 

						<div class="form-group btm_border">
							<label class="col-sm-4 control-label" for="demo-hor-5"><?php echo translate('comments');?></label>
							<div class="col-sm-6">
								<textarea maxlength="100" required="" id="comment" class="form-control"></textarea>
							</div>
						</div> 


						<div class="form-group btm_border">
							<label class="col-sm-4 control-label"  for="image"><?php echo translate('images');?></label>
							<div class="col-sm-6">
								<div id="choose_file">
									<label for="image" class="pull-left btn btn-default btn-file"><?php echo translate('choose_file');?></label>
									<input type="file"  name="img"  id="image" class="form-control  fileclass" accept="image/png, image/bmp, image/jpeg" required="" style="display:none;">
								</div>
							</div>
						</div>
						<div class="form-group btm_border">
							<label class="col-sm-4 control-label" ></label>
							<div class="col-sm-6">
								<div id="choose_file">
									<img style="display: none;width: 120px;border-radius: 15px;" id="blah" src="#" alt="your image" />
								</div>
							</div>
						</div>
						<div class="form-group btm_border">
							<label class="col-sm-4 control-label" ></label>
							<div class="col-sm-6">
								<div   class="g-recaptcha" 
								data-sitekey="6Ld71swZAAAAAAqnpL2OlGOGMqkFn9WRAdxMuigt
								" 
								>
							</div>
						</div>
					</div>

					<div class="form-group btm_border">

						<div class="form-group btm_border">
							<label class="col-sm-4 control-label" ></label>
							<div class="col-sm-6">
								<div id="choose_file">
									<span onclick="validaType()" class="btn btn-default">Submit</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script type="text/javascript">

	function getRadioValue(value) {
		console.log(value);
		$('#appendPrice').text(value);
		$('#price').val(value);
	}

	function validaType(){

		var platform = document.getElementById("platform").value;
		var comment = document.getElementById("comment").value;
		var image = document.getElementById("image").value;
		if(platform===''){
			alert('Platform is required');
			return false;
		}

		if(comment===''){
			alert('Comment is required');
			return false;
		}
		if(image===''){
			alert('Image is required');
			return false;
		}
		// var response = grecaptcha.getResponse();
		// if(response.length == 0) 
		// { 
	 //    alert("Please verify you are human"); 
	 //    return false;
  //      }

  $("#paid_service_add").submit();

}
image.onchange = evt => {
	$('#blah').css('display','block');
	const [file] = image.files
	if(file.size>=1048576){
		alert('File Size is Very Large');
		$('#blah').css('display','none');
		return false;

	}
	if (file) {
		blah.src = URL.createObjectURL(file)
	}
}
	// function readURL(input) {
	// 	$('#blah').css('display','block');
	// 	if (input.files && input.files[0]) {
	// 		var reader = new FileReader();
	// 		reader.onload = function(e) {
	// 			$('#blah').css('backgroundImage', "url('"+e.target.result+"')");
	// 			$('#blah').css('backgroundSize', "cover");
	// 		}
	// 		reader.readAsDataURL(input.files[0]);
	// 		abnv('savepic');
	// 		change_state('saving');
	// 	}
	// }
	// $("#image").change(function() {
	// 	readURL(this);
	// });
</script>
<script type="text/javascript">
	function paltForm() {
		$('#appendPrice').text($('#price').val())
		$('.message').css('display','block')
		var value=$('#platform').val();
		if(value==='EasyPaisa'){
			$('#number').text('0345000000')
		}
		if(value==='Jazzcash'){
			$('#number').text('0300000000')
		}
		if(value==='Bank'){
			$('#number').text('023432423423423')
		}
	}
</script>
<!--Bootstrap Tags Input [ OPTIONAL ]-->
