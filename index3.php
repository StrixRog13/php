<?php
header('Content-type: text/html; charset=utf-8');
ini_set('default_charset', 'UTF-8');
//1.задание 
$number = 1;
while ($number < 100) {
    if ($number % 3 == 0) {
        echo $number++ . ' ';
    }
    $number++;
}

echo '<hr>';
//2. задание

$number = 0;
do {
    if ($number == 0) {
        echo $number . ' – это ноль.' . '<br>';
        $number++;
    } elseif ($number % 2 != 0) {
        echo $number . ' – нечетное число.' . '<br>';
        $number++;
    } else {
        echo $number . ' – четное число.' . '<br>';
        $number++;
    }
} while ($number < 11);

echo '<hr>';

//3 задание

$areaArr = [
    'Московская область:' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область:' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Волгоградская область:' => ['Волгоград', 'Волжский', 'Камышин', 'Урюпинск', 'Иловля']
];

function displayCity($arr)
{
    if (!is_array($arr)) {
        return print "incorrect argument '{$arr}'";
    }
    foreach ($arr as $key => $value) {
        echo $key . '<br>';
        for ($i = 0; $i < $arrLength = count($arr[$key]); $i++) {
            //находим последний элемент вложенного массива для переноса строки
            if ($i == $arrLength - 1) {
                echo $arr[$key][$i] . '.' . '<br>';
            } else {
                //если не последний, ставим запятую
                echo $arr[$key][$i] . ', ';
            }
        }
    }
}

displayCity($areaArr);

echo '<hr>';

//4 задание
function translit($string)
{
    if (!is_string($string)) {
        return 'incorrect argument';
    }

    $ruChars = 'А	Б	В	Г	Д	Е	Ё	Ж	З	И	Й	К	Л	М	Н	О	П	Р	С	Т	У	Ф	Х	Ц	Ч	Ш	Щ	Ъ	Ы	Ь	Э	Ю	Я';
    $enChars = 'A	B	V	G	D	E	E	ZH	Z	I	Y	K	L	M	N	O	P	R	S	T	U	F	KH	TS	CH	SH	SCH	’ 	Y	’ 	E	YU	YA';

    //совмещенный массив
    $tranArr = array_combine(explode('	', mb_strtolower($ruChars)), explode('	', strtolower($enChars)));
    //преобразуем аргумент в массив
    $stringArr = preg_split('//u', mb_strtolower($string), 0, PREG_SPLIT_NO_EMPTY);

    $requestedArr = [];

    //перебираем строку и для каждой буквы ищем совпадение в массиве транслита
    for ($i = 0; $i < count($stringArr); $i++) {
        foreach ($tranArr as $key => $value) {
            //если находим, добавляем в новый массив
            if ($stringArr[$i] == $key) {
                array_push($requestedArr, $value);
                break;
                //если встречаются знаки пунктуации или пробелы, добавляем без обработки
            } elseif (preg_match('/[[:punct:]]|\s/', $stringArr[$i])) {
                array_push($requestedArr, $stringArr[$i]);
                break;
            }
        }
    }

    //выводим на экран
    return implode($requestedArr);
}

echo translit('Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания');

echo '<hr>';

// 5 задание
function replaceSpace($string)
{
    if (!is_string($string)) {
        return "incorrect argument {$string}";
    }

    return preg_replace('/\s/', '_', $string);
}

echo replaceSpace('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.');

echo '<hr>';

// 6 задание

$menuArr = [
    'Item 1',
    'Item 2' => ['Subitem 1', 'Subitem 2', 'Subitem 3'],
    'Item 3' => ['Subitem 4' => ['One level deeper 1', 'One level deeper 2']]
];

function menuRender($arr)
{

    if (!is_array($arr)) {
        return 'incorrect argument';
    }

    $renderArr[] = '<ul>';
    foreach ($arr as $key => $value) {
        //перебираем массив, если значение - массив, то обрабатываем его нашей функцией
        if (is_array($value)) {
            $renderArr[] = '<li>' . $key . menuRender($value) . '</li>';
        } else {
            $renderArr[] = '<li>' . $value . '</li>';
        }
    }
    $renderArr[] = '</ul>';

    return implode($renderArr);
}

echo menuRender($menuArr);

echo '<hr>';

// 7 задание

for ($i = 0; $i < 10; print $i++ . ' ') {
};

echo '<hr>';

// 8 задание

function searchCity($char, $arr)
{
    if (!is_array($arr) || !is_string($char)) {
        return print 'incorrect arguments.';
    }
    //счетчик неподходящих городов.
    $wrongCity = 0;
    //количество городов в массиве
    $cityCount = count($arr, COUNT_RECURSIVE) - count($arr);
    foreach ($arr as $key => $value) {
        for ($i = 0; $i < count($arr[$key]); $i++) {
            //для работы с кириллицей
            $explodeArr = preg_split('//u', $arr[$key][$i], 0, PREG_SPLIT_NO_EMPTY);
            //если первая буква совпадает с искомой, то выводим на экран
            if ($explodeArr[0] == $char) {
                echo implode($explodeArr) . '<br>';
            } else {
                $wrongCity++;
                // если счетчик неподходящих городов == количество городов в массиве, то выводим сообщение
                if ($wrongCity == $cityCount) {
                    return print "Города на букву '{$char}' в массиве нет.";
                }
            }
        }
    }
}

searchCity('К', $areaArr);

echo '<hr>';

// 9 задание
function translitReplaceSpaces($string)
{
    if (!is_string($string)) {
        return 'incorrect argument';
    }

    $ruChars = 'А	Б	В	Г	Д	Е	Ё	Ж	З	И	Й	К	Л	М	Н	О	П	Р	С	Т	У	Ф	Х	Ц	Ч	Ш	Щ	Ъ	Ы	Ь	Э	Ю	Я';
    $enChars = 'A	B	V	G	D	E	E	ZH	Z	I	Y	K	L	M	N	O	P	R	S	T	U	F	KH	TS	CH	SH	SCH	’	Y	’	E	YU	YA';

    //совмещенный массив
    $tranArr = array_combine(explode('	', mb_strtolower($ruChars)), explode('	', strtolower($enChars)));
    //преобразуем аргумент (строку) в массив
    $stringArr = preg_split('//u', mb_strtolower($string), 0, PREG_SPLIT_NO_EMPTY);

    //перебираем строку и для каждой буквы ищем совпадение в массиве транслита
    for ($i = 0; $i < count($stringArr); $i++) {
        foreach ($tranArr as $key => $value) {
            //если находим, добавляем в новый массив
            if ($stringArr[$i] == $key) {
                $requestedArr[] = $value;
                break;
                //если встречаются знаки пунктуации или пробелы, добавляем без обработки
            } elseif (preg_match('/[[:punct:]]|\s/', $stringArr[$i])) {
                $requestedArr[] = $stringArr[$i];
                break;
            }
        }
    }

    //выводим на экран
    return preg_replace('/\s/', '_', implode($requestedArr));
}

echo translitReplaceSpaces('Объединить две ранее написанные функции в одну');