<?php 
class CroneJob extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->library('email');

	}
	


	function venderDetail($venderId)
	{

		$venderDetail= $this->db->get_where('vendor', array('vendor_id' => $venderId))->row();
		return $venderDetail;

	}

	function venderProductDetailOrder($saleId,$venderData)
	{

		$page_data= $this->db->get_where('sale', array('sale_id' => $saleId))->result_array();

		$mailData = [];
		$productsId=array();
		$productArray=[];
		foreach ($page_data as $value) {

			$deliveryStatus=$value['payment_status'];
			$productDetails=json_decode($value['product_details']);

			foreach ($productDetails as  $value) {
				$productData= $this->db->get_where('product', array('product_id' => $value->id))->row();
				$vederInfo=json_decode($productData->added_by);
				$mailData[] = ['prodcut_id' => $value->id,'vendor_id'=>$vederInfo->id];
			}


		}

		foreach ($mailData as  $value) {
			if($value['vendor_id']==$venderData->vendor_id){
				array_push($productsId,$value['prodcut_id']);
			}

		}


		foreach ($productsId as  $value) {

			foreach ($productDetails as  $product) {
				if($product->id==$value){
					array_push($productArray,$product);
				}

			}

		}

		$new['data']=$productArray;
		$new['sale_id']=$saleId;
		$new['venderName']=$venderData->name;

		return $new;


	}



	public function sendEmail(){
	    $saleData= $this->db->get('sale')->result_array();
// 		$saleData= $this->get_where('files', array('sale_code=' => 200219138))->result_array();
		
		foreach ($saleData as  $value) {

			$orderStatues=json_decode($value['order_status']);
			
			
			$delivery_status=json_decode($value['delivery_status']);
			
			foreach ($orderStatues as  $orderStatu) {
				if(isset($orderStatu->reminder))
				{
				   
				$reminderDate = date("Y-m-d h", strtotime($orderStatu->reminder));
				
	
				
				if($orderStatu->status=='pending' || $orderStatu->status=='Pending'){
					$today = date('Y-m-d h', strtotime('+5 hours', time()));
					
						
					
					if($today==$reminderDate){

						$venderData=$this->venderDetail($orderStatu->vendor);

						$emailData=$this->venderProductDetailOrder($value['sale_id'],$venderData);

						$venderView  = $this->load->view('emailtemplates/reminder_email', $emailData,True);


						$subject='Reminder';
						$from_name  = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
						$protocol   = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
						if($protocol == 'smtp'){
							$from   = $this->db->get_where('general_settings',array('type' => 'smtp_user'))->row()->value;
						}
						else if($protocol == 'mail'){
							$from   = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
						}
						$this->email_model->do_email($from, $from_name, $venderData->email, $subject, $venderView);
					}
				}

			}
		}
		
		foreach ($delivery_status as  $delivery_statu) {
		    
		   
				if(isset($delivery_statu->reminder_data))
				{
				    
				    $reminderDate = date("Y-m-d h", strtotime($delivery_statu->reminder_data));
					
					if($delivery_statu->status=='shipped' || $delivery_statu->status=='Shipped'){
						$today = date('Y-m-d H', strtotime('+5 hours', time()));
						
						if($today==$reminderDate){
						   
							$venderData=$this->venderDetail($delivery_statu->vendor);
                        
							$emailData=$this->venderProductDetailOrder($value['sale_id'],$venderData);
							
							$venderView  = $this->load->view('emailtemplates/delivery_reminder', $emailData,True);


							$subject='Reminder';
							$from_name  = $this->db->get_where('general_settings', array('type' => 'system_name'))->row()->value;
							$protocol   = $this->db->get_where('general_settings', array('type' => 'mail_status'))->row()->value;
							if($protocol == 'smtp'){
								$from   = $this->db->get_where('general_settings',array('type' => 'smtp_user'))->row()->value;
							}
							else if($protocol == 'mail'){
								$from   = $this->db->get_where('general_settings', array('type' => 'system_email'))->row()->value;
							}
							$this->email_model->do_email($from, $from_name, $venderData->email, $subject, $venderView);
						}
					}

				}
			}

		}


	}

	
}

?>