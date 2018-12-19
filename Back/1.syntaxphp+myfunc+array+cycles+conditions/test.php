<?php
	include ("./func/time-date/countTime.php"); // тренировка по функциям
	include ("./func/time-date/echoTimeimg.php"); // тут допвариант задания на исключения вместо эхи - изображение 	

	//ЗАДАНИЕ 1 - 3 из практики

	$name = "Artem";
	$age = 25;
	echo "Меня зовут: $name" . '<br>';
	echo "Мне $age" . '<br>';
	unset($age);
	$your_age = rand(18, 35);
	echo "А вам возможно $your_age" . '<br>';

	//ЗАДАЧА 1

	//МИНИМАЛИСТИЧНЫЕ ВАРИАНТЫ РЕШЕНИЯ ПРИ ПОМОЩИ МАТЕМАТИКИ И ПРИВЕДЕНИЯ ТИПОВ ДАННЫХ 
	
	//(логика добавляется, для полного учета всех вариантов 1) и 2) тренировки, а также для исключения проблем с назначением в html и DOM, при помощи присваивания строкового значения доп.переменной, вместо цифр, чтобы не возникло случайного инкрементирования или неправильного возврата значения точного имени файла)
	
	//$h = date('H'); //комментируем, реальное время будем использовать в буд.функции showTimeBackground
	$img = 0;
	$h = 7; // допустим 24 часовой формат дня, где полночь может быть и 00, и 24
	// Разные варианты
	//  $images = floor($h / 6); //function ceil, int также годится, но требует логического доведения при равенстве '4' или доп.файла
	// $images = ($h / 6) % 4;
	 $images = ($h / 6) - (($h % 6) / 6); // самое извращенное решение
	 echo " <br> Результат вычисления фазы дня математическим способом <br>";
	 var_dump($images);

		if($images == 0) {
			$img = 'Night';
		}// Night
			elseif($images == 1) {
				$img = 'Morning';
			}// Morning
				elseif($images == 2) {
					$img = 'Day';
				}// Day
					elseif($images == 3 || $images == 4 ) {
						$img = 'Evening';
					}// Evening $images == 4 - расширяем для правильной работы ceil
		else {
		echo "Определитесь с часовым поясом";
		} // при попадании неизвестного или null
	echo "<br> - Получаемый час суток для блока картинок <br>";
	var_dump($h);
	echo "<br> - Фаза дня из 4х, <br> где: 0..6 - ночь, 6..12 - утро, 12..18 - день,  18..23 - вечер, после проверки условием <br>";
	var_dump($images);
	echo "<br> - Получаемый час в виде картинки <br>";
	var_dump($img);
	

	// РЕШЕНИЕ ТОЛЬКО ЛОГИЧЕСКИМИ ИСКЛЮЧЕНИЯМИ
	// отсекаем значения в диапазон 0 - 23, при помощи сравнения и elseif

	// $hour = date('H');
	$hour = 16; // пример значения Day
	if ($hour <= 5) {  
		$background_day = 'Night';
		$welcome = "Доброй ночи";
		} // morning
		elseif ($hour <= 11) {
		$background_day = 'Morning ';
		$welcome = "Доброе утро ";
		} // day
			elseif ($hour <= 17) {
			$background_day = 'Day';
			$welcome = "Добрый день ";
			} // evening
	else {
	$background_day = 'Evening';
	$welcome = "Добрый вечер";
	} 
	print("<br> Результат приветсвия, вычисленный логическим способом,  при значении дня: $background_day <br>".$welcome);
	// Результат, при $hour=16 => Day, записываем в блок с классом testLogicDay

////////////////	ЗАДАЧА 2
	$LuckyNumber = range(1, 100); // создаем диапазон при помощи функции
	shuffle($LuckyNumber); // перемешаем для любопытства
	 echo "<br><select>"; 
	foreach ($LuckyNumber as $number => $value) {    
	    	if ($value % 2 == 0) {
	        $Even = [$value];
	        echo "<option> $value </option>";
	        }//if
	}
	echo "</select> Чётные числа массива";
	echo "<br><select>"; 
	foreach ($LuckyNumber as $number => $value) {    
	    	if ($value % 2 != 0) {
	        $Odd = [$value];
	        echo "<option> $value </option>";
	        }//if
	}
	 echo "</select> Нечётные числа массива";
	
	echo "<br><select>";
	echo sort ($LuckyNumber , SORT_NUMERIC);
	$count = 0; 
	foreach ($LuckyNumber as $number => $value) {    
	        echo "<option> $value </option>";
	       $count++; 
	}
	echo "<br><select> массив до 100, содержит в себе $count элементов"; 

	// echo sizeof($LuckyNumber);//??? :-)
	// $c = 0;
	// for ($i = 0; $i <= count($LuckyNumber)-1; $i++) {
	// $c = count($LuckyNumber)-1;
	// }
	// echo "<br> $c";

	
/////////////////   ЗАДАЧА 3
	$i = 200; //инициализируем переменную, которая будет служить начальным условием цикла
	echo "<br><select>"; // открываем контейнер html, в который счетчик будет складывать свои значения на каждый шаг цикла 
	do {
		echo "<option value=\"$i\">$i</option>"; //пока i не приблизится к 0, формируем опции селекта
		$i--; // декрементируем, т.е i=i-1, => 199,198 .., создаём условие выхода
	} while ($i >= 0);
	echo "</select>  Вывод чисел от 1 до 200"; // закрываем тег

////////////ЗАДАЧА 4

	//Если у нас есть первые 1,4,7 и конечный член прогрессии 112
	//зная шаг 3 и номер члена,при этом, получим все необходимые условия для решения
	$first = 1; // первый сосед
	$two = 4; // второй сосед
	$init = 1; // инициализатор подсчёта количества всех участников оргии
	$last = 112; // последний на этой вечеринке
	$step = $two - $first; //шаг прогрессии
	$countP = (($last - $init)/$step) + $init; // сумма элементов числового ряд прогрессии, додумался случайно на пару с товарищем, после попыток вывести несуществующие array_key, копиями форыча внутри цикла, через функции
	$sum = 0; //??? неизвестная нам сумма
		echo "<br> Задание на прогрессию <br>";
		echo "<br> Количество цифр в ряду $countP <br>";
		
		while ($init < $last) {
			if ($init == 58) {echo "<br>";} // для переноса строки
			$init += $step; //считаем 1го за 3х
			echo  " $init + "; 
			$res = [$init]; // создадим массив, просчитав весь ряд
			}
			// foreach ($res as $k => $value) {
			//  	echo "  $value + ";
			// посмотрим на всех участников процесса  

	for ($i = 0; $i < $countP; $i++) {  
		$sum   += $first;
		$first += $step;
	}
	echo "<br> $sum - Сумма членов прогрессии 1+4+7+10+...+112";

	//Другие варианты решения из инета в 1у формулу 
	// sum = n*(2*a+(n-1)*d)/2; 
	//где Sn = n * (a1 + an) / 2;
	//Sn = n * (2*a1 + (n-1)*d) / 2 = n*a1 + n*(n-1)*d/2

////////////ЗАДАЧА 5
$cols=7;
$rows=9;
$tr=1;

echo "<table border='1'>" ;

while($tr<=$rows){
  echo "<tr>" ; 
  $td=7;
  while ($td<=$cols){
    echo "<td>$tr</td>";
    echo "<td>*</td>";
    echo "<td>7</td>";
    echo "<td>=</td>";
    echo "<td>".$tr*$td."</td>";
    $td++; 
  }
  echo "</tr>";
  $tr++;
}
echo "</table>" ; 
////////////ЗАДАЧА 6

$array = [
	"One_key" 		=> 32.2,
	"Two_key" 		=> "232rfdsvf",
	"Three_key" 	=> "  ",
	"Four_key" 		=> "strAAAA",
	"Five_key" 		=> 322,
	"Six_key" 		=> +1,
	"Seven_key" 	=> "strdgeg",
	"Eight_key" 	=> 133333333333,
	"Nine_key" 		=> -322,
	"Ten_key" 		=> "strdreg"
];
echo "<pre>Было <br>";
foreach ($array as $key => $value) {
	echo "<br>$key";
	 // var_dump($value);
	if (is_double($value) || is_integer($value)) {
		$value = "тут было число N=$value (где n - наше число)";
	}
	elseif (is_string($value)) {
		$x = strlen($value);
		$value = "“Здесь была строка из $x символов”";
	}
	echo "<br>::::::::: $value <br>";
}
echo "</pre>";





?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Php trainee Artem</title>
	<style>
		body {
			background: brown;
			font-size: 14px;
			font-weight: bold; 
			text-transform: uppercase;
			color: black;
		}
		body span {
			padding: 80px 10px;
		}
		.Block_LogicTest {
			background: url(img/<?php  
					print $background_day; ?>.jpg);
			background-size: cover;
			top: 20px;
		}
		.Block_image img {
			    top: 150px;
			    right: 80px;
			    z-index: 2;
		}
		.Block_LogicTest, .test_ImageMathCount {
			width: 300px;
			height: 300px;
			float: right;
			position: absolute; 
			right: 40px;
		}
		.Now { 
			background: url(img/<?php 
 					echo showTimeBackground(); ?>.jpg);
			background-size: cover;
			top: 50%;
			right: 160px;
			z-index: 3;
		}
		.Now span {
			position: relative;
		    top: 305px;
		    left: 15px;
		    color: white;
		    font-size: 18px;
		}
	</style>
</head>
<body>
	<h1> Функция вычисления времени дня</h1>
	<span> Ваш сеанс начался в <?php echo  endingsCount_Time() . ".  "; ?>Благодарю за проверку домашнего задания!</span>
	<div class="Block_image">
		<img src="img/<?php echo "$img.jpg"; ?>" class="test_ImageMathCount" alt="imagesMorning">
	</div>
	<div class="Block_LogicTest"></div>
	<div class="Block_LogicTest Now">
		<span> вывод приветствия в IMG</span>
	</div>
	

</body>
</html>
