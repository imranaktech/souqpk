<?php 

 function sendEmail($data){
  $ci =& get_instance();
    if($data['type']=='ticket'){
       $data['user']= $this->db->get_where('user', array('user_id' => $data['userId']))->row();
       $data['name']=$data['user']->surname;
   }


   $ci->load->library('email');
   $mesg = $ci->load->view('emailtemplates/contact',$data,TRUE);
   $config['protocol']    = 'smtp';
   $config['smtp_host']    = 'mail.souqpk.com';
   $config['smtp_port']    = '587';
   $config['smtp_timeout'] = '20';
   $config['smtp_user']    = 'no-reply@souqpk.com';
   $config['smtp_pass']    = '@W,VsFqz)9cs';
   $config['charset']    = 'iso-8859-1';
   $config['newline']    = "\r\n";
   $config['mailtype'] = 'html'; // or html

   $ci->email->initialize($config);

   $ci->email->from('info@souqpk.com', $data['name']);
   $ci->email->to($data['tomail']); 
   $ci->email->subject($data['subject']);
   $ci->email->message($mesg); 
     if ($ci->email->send()) {
    // echo 'Your Email has successfully been sent.';
} else {

    // echo show_error($ci->email->print_debugger());
}
   

}
 ?>