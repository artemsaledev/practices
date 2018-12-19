<?php
header('Content-type: text/plain; charset=utf-8');

	if ($_POST['customer_name'] && $_POST['phone_number'] && $_POST['email_address'] != "") {
		$customer_name	= $_POST['customer_name'] . "\n";
		$phone_number	= $_POST['phone_number'] . "\n";
		$email_address  = $_POST['email_adress'] . "\n";
		$comments		= $_POST['comments'] . "\n";
		$file = fopen('./txt/crm.txt', 'a');
		fwrite($file, $customer_name);
		fwrite($file, $email_address);
		fwrite($file, $phone_number);
		fwrite($file, $comments);
		fclose($file);
	}
	header('Location: ./');
	exit();
?>
<!-- $phone_number	, $email_address, $comments -->
<!-- ,'phone_number','email_address', 'comments' -->