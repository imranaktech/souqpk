<?php if($type=='ticket'){
	
 ?>
<strong>Name: </strong> <p><?php echo $user->surname ?></p>
<strong>Email: </strong> <p><?php echo $user->email ?></p>
<strong>Phone: </strong> <p><?php echo $user->phone ?></p>
<strong>Has generated On: </strong> <p><?php echo date('d-m-Y h:i a', strtotime('+5 hours', time())) ?></p>
<strong>Message: </strong> <p><?php echo $message ?></p>
<?php } ?>

<?php if($type=='contact'){
	
 ?>
<strong>Name: </strong> <p><?php echo $name ?></p>
<strong>Email: </strong> <p><?php echo $email ?></p>
<strong>Message: </strong> <p><?php echo $message ?></p>
<?php } ?>

<?php if($type=='payment_proof'){
  $date_time = date('m/d/Y Y h:i:s A',strtotime('+0 hours', $row['created_at']));
	
 ?>
 <p><span style="font-weight: bold;"><?php echo $vender_name ?></span> has submitted payment proof against <span style="font-weight: bold;" ><?php echo $package ?></span style="font-weight: bold;"> on <?php echo date('d-m-Y h:i a', strtotime('+5 hours', time())) ?></p>
<?php } ?>


