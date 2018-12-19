<?php

// УСЛОЖНЯЕМ ПРИМЕР И СОЗДАЁМ ФУНКЦИЮ, ВЫПОЛНЯЮЩУЮ ЗАДАЧУ, ЗАПИСЫВАЕМ ВЕТВЛЕНИЯ ПРИ ПОМОЩИ SWITCH
	function showTimeBackground() {
		//$h_count = (int)strftime('%H');
		$h_count = date('H');
		//$h_count = rand(1,12);
		//$h_count = 19;
	// Создаем массив, для расширения возможных свойств-значений будущего метода, например наличия BadMorning, как вариант c другими параметрами времени
		$timeDay = [
			"good_Night" 	=> "Night",
			"good_Morning" 	=> "Morning",
			"good_Day" 		=> "Day",
			"good_Evening" 	=> "Evening",
		];

	//Создаем цикл foreach, перебирающий ключи нашего массива, с брекпоинтами,возвращаемыми конструкцией switch
		// логическое И позволяет оперировать диапазоном необходимого времени в промежутке 6-12

			foreach ($timeDay as $key) {
					switch ($h_count) {
						case $h_count >= 0 && $h_count <= 6:
						return $key = 'Night';
						break;
							case $h_count >= 7 && $h_count < 13:
							return $key = 'Morning';
							break;
								case $h_count >= 13 && $h_count <= 17:
								return $key = 'Day';
								break;
									case $h_count >= 17 && $h_count < 21:
									return $key = 'Evening';
									break;
						default:
								return $key = 'Night';
								break;
					} //switch
			return $key;
		} //each
		return;
	} // end showTimeBackground
