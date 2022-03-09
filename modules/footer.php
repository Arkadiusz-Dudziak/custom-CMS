<?php
	require_once("./db-config.php");
	
	$query = "SELECT phone, mail, address FROM contact_info WHERE id=1";
	$result = $conn->query($query);
	
	$phone = "";
	$mail = "";
	
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		  $phone = $row["phone"];
		  $mail = $row["mail"];
		  $address = $row['address'];
	  }
	}
?>

<footer class="page-footer footer" style="background-color: <?php echo $colors['footerBgColor']?>; color: <?php echo $colors['footerColor'];?>">
	<div class="contact-info">
		<div>
			<img src="./images/phone.png" alt="phone"/><?php echo $phone;?>
		</div>
		<div>
			<img src="./images/mail.png" alt="mail"/><?php echo $mail;?>
		</div>
		<div>
			<img src="./images/place.png" alt="place"/><?php echo $address;?>
		</div>
	</div>
	<div>
		&copy; Arkadiusz Dudziak
	</div>
</footer>
