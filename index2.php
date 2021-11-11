<?php
// задание №1
	$a = -2;
	$b = -5;
	if ($a >=0 && $b >= 0) {
		echo 'Разность чисел равна: '.($a - $b);
	} elseif ($a < 0 && $b < 0) {
		echo 'Произведение чисел равно: '.($a * $b);
	} elseif (($a >= 0 && $b < 0) || ($a < 0 && $b >= 0)) {
	    echo 'Сумма чисел равна: '.($a + $b);
    }

?>

</br>
<?php

// задание №2
	$a = 5;
	switch ($a) {
		case 1:
			echo "1";
		case 2:
			echo "2";
		case 3:
			echo "3";
		case 4:
			echo "4";
		case 5:
			echo "5";
		case 6:
			echo "6";
		case 7:
			echo "7";
		case 8:
			echo "8";
		break;
	}
?>

</br>
<?php
// задание №3

function sum($arg1, $arg2) {
	return $arg1 + $arg2;
}

function subtraction($arg1, $arg2) {
	return $arg1 - $arg2;
}

function multiply($arg1, $arg2) {
	return $arg1 * $arg2;
}


function divide($arg1, $arg2) {
	return ($arg2 === 0) ? "invalid arg2 value (=0)" : $arg1 / $arg2;
}
?>

</br>
<?php
// задание №4

	function mathOperation($arg1, $arg2, $operation) {
	switch ($operation) {
		case "sum": 
			return $arg1 + $arg2;
		case "subtraction":
			return $arg1 - $arg2;
		case "multiply":
			return $arg1 * $arg2; 
		case "divide":
			if ($arg2 === 0) {
				echo "invalid arg2 value (=0)";
				break;
			}
			return $arg1 / $arg2;
		}
	}
	echo mathOperation(10, 0, divide);
?>

</br>
// задане № 5 делалось в первом ДЗ

</br>
<?php
// задание № 6

	function power($val, $pow) {
		return ($pow == 1) ? $val : $val * power($val, $pow - 1);
	}
	echo power(5, 3);
?>

// задане № 7

<?php

$h = '11';//date("H")+8; // +8 - часов к времени по Москве.
$m = '43';//date("i");

	if ($h == 1 || $h == 21) {
		$hours = " час";
	}

	else if (($h >= 2 && $h <= 4) || ($h >= 22 && $h <= 24)) {
		$hours = " часа";
	}

	else {$hours = " часов";
	}

	if (($m < 20) || ($m >> 10)) {
		$minutes = " минут";
	}

	else if (($m % 10) === 1) {
		$minutes = " минута";
	}

	else if ((($m % 10) >= 2) && (($m % 10) <= 4)) {
		$minutes = " минуты";
	}

	else {
		$minutes = " минут";
	}

echo $h . $hours . " " . $m . $minutes;

?>