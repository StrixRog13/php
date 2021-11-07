<?php
$a = 5;
$b = '05';
var_dump($a == $b); // Почему true? преобразование к 5 происходит происходит автоматически
var_dump((int)'012345'); // Почему 12345? Потом что int это целое число , идет преобразование в целове число вручную
var_dump((float)123.0 === (int)123.0); // Почему false? Потому что идет сравнение типов и числа, два типа и они не равны по значению 
var_dump((int)0 === (int)'hello, world'); // Почему true? приравнивает бквы к типу int получаем 0, в итоге значения и типы одинако
?>

</br>
<?php
$name = "GeekBrains user";
echo "Hello, $name!";
?>

<?php
	$h1='H1';
	$title='Title';
	$year=date('Y');
?>
<html>
<head>
	<title><?php echo $title; ?></title>
</head>
<body>
	<h1><?php echo $h1; ?></h1>
	<span><?php echo $year; ?></span>
</body>
</html>

<pre>
<?php
// поменять две переменные местами
$a = 1;
$b = 2;

$a += $b;
$b = $a - $b;
$a -= $b;
var_dump($a); // 2
var_dump($b); // 1
?>
</pre>