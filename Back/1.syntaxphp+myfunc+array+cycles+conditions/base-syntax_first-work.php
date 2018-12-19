<?php
print 'Hello world';
//comment test
# comment test2
/*
* comment test2
*/
# string
# int
# bool true/false
# float

$string = 'Tema';
$int = 25;
$bool = true;
$float = 92.5;
echo '<br>';
echo $float;

define('URL_SITE', 'http://google.com');
echo '<br>';
echo URL_SITE;

	$first = 'Text'; // Присваиваем $first значение 'Text' 
	$second = $first; // Присваиваем $second значение переменной $first 
	$first = 'New text'; // Изменяем значение $first на ' New text ' 

	echo "Переменная с именем first " . "равна $first <br>"; 
	// выводим значение $first 
	echo "Переменная с именем second " . "равна $second"; 
	// выводим значение $second 
	//////////////////////////Создание переменных и вывод
	 $name = "Игорь"; 
	 $age = "40"; 
	 echo "<br>Меня зовут: $name"; 
?>

<?php
	/////////////////////////создание массивов и вывод
	$value_car = [ 
		"Germany_car" => [
			"name"		=> "bmw",
			"model"		=> "X5",
			"speed"		=> 120,
			"doors"		=> 5,
			"year" 		=> "2006"
			],
		
		"Asia_car" 	 =>	[
			"name"		=> "toyota",
			"model"		=> "Carina",
			"speed"		=> 130,
			"doors"		=> 4,
			"year" 		=> "2007"
			],
		"Europe_car" => [
			"name"		=> "opel",
			"model"		=> "Corsa",
			"speed"		=> 140,
			"doors"		=> 5,
			"year" 		=> "2007"
			]
		];

	foreach ($value_car as $car) : 
			?>
		<h2>Info model car: <?php echo $car["name"]; ?></h2>
		<!-- ul>li*3>ol({car}) -->
		<span> Model: <?php echo $car["model"]; ?></span><br>
		<span> Speed: <?php echo $car["speed"]; ?></span><br>
		<span> Doors: <?php echo $car["doors"]; ?></span><br>
		<span> Year: <?php echo $car["year"]; ?></span>
	<?php endforeach;

	 $bmw = array("model" => "X5","speed" => 120,"doors" => 5,"year" => 2006);
	 $toyota = array("model" => "Carina","speed" => 130,"doors" => 4,"year" => 2007);
	 $opel = array("model" => "Corsa","speed" => 140,"doors" => 5,"year" => 2007);
	 echo "<br>";	
	 print_r($bmw); 
	 echo "<br>";
	 print_r($toyota);
	 echo "<br>";
	 print_r($opel);
	 echo "<br>";
?>
<?php
/////////////////////ВЕТВЛЕНИЯ, ИСКЛЮЧЕНИЯ, УСЛОВИЯ
	if($int > 40) {
	   echo '<br>';
	   echo 'You old mothefuckers';
	}else {
	   echo '<br>';
	   echo 'You yong bitch';
	}

	if($float > 100) {
	   echo '<br>';
	   echo 'You weight max';
	}elseif($float < 95) {
	   echo '<br>';
	   echo 'You weight normal';
	}

		$age = rand(1,99);
		if($age <= 17 || $age == 0) {
			echo "<br> Вам ещѐ рано работать <br>";
		}
			elseif($age <=59) {
				echo "<br> Вам ещѐ работать и работать <br>";
			}
				elseif($age <=99) {
					echo "<br> Вам пора на пенсию <br>";
				}
		else {
		echo "<br> Неизвестный возраст <br>";
		} 

	$day = rand(1,8);
	switch ($day) {
			case $day >= 1 && $day <= 5:
			echo "Это рабочий день";
			break;
				case $day == 6 || $day == 7:
				echo "Это выходной день";
				break;
					case $day !=($day >= 1 && $day <= 7) :
					echo "Неизвестный день";
					break;
						default:
								echo "Вы потерялись во времени";
								break;
					} //switch
 ?>


<?php
//////////////ЦИКЛЫ/////////////////////  
$i = 1; 
	echo "<br><select>";
	while ($i < 51) { 
		echo "<option value=\"$i\">$i</option>"; 
		$i++;
		if (i >= 50) { break; }
	}
	echo "</select><br>";
	
	$k = 2;
	echo "<br><select>";
	while ($k <= 50) { 
		echo "<option value=\"$k\">$k</option>";
		$k++; 
	}
	echo "</select><br>";
 
	echo "<br><select>";
	for ($n=3; $n<=50; $n++) 
	{
	echo "<option value=\"$n\">$n</option>";     
	}
	echo "</select><br>"; 

	for( $i=5; $i<10; $i++) {
	   if($i > 7) {
	       break;
	   }
	   echo '<br>';
	   echo $i;
	}

	$j=11;
	while($j>10) {
	   $j++;
	   echo '<pre>';
	 if($j>=21) break;
	   print_r($j);
	   echo '</pre>';
	}
	
	$names = ['Artem','Nikolay','Sergey'];
	foreach($names as $name) {
	   echo $name.'<br>';
	}
?>