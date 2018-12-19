<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$user		= 'root';
		$password	= '';
		$db			= 'test';
		$host 		= 'localhost';

		$dsn = 'mysql:host='.$host.';dbname='.$db;
		$pdo = new PDO ($dsn, $user, $password);

		// $query = $pdo->query('SELECT * FROM `user`');
		// while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
		// 	echo '<h1>' . $row['customer_name'].'</h1>
		// 		<p><b>Phone: ' . $row['phone_number'] . 
		// 		'<br><b>Email: ' . $row['email_adress']. 
		// 		'<br><b>Comments: ' . $row['comments'] . '</p><br>';

		// $query = $pdo->query('SELECT * FROM `user` ');
		$query = $pdo->query('SELECT * FROM `user` ORDER BY `customer_name` LIMIT 3');
		while ($row = $query->fetch(PDO::FETCH_OBJ)) {
			echo '<h1>' . $row-> customer_name .'</h1>
				<p><b>Phone: ' . $row-> phone_number . 
				'<br><b>Email: ' . $row-> email_adress . 
				'<br><b>Comments: ' . $row-> comments . '</p><br>';
		}

	?>
</body>
</html>