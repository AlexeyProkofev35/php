<?php
/*задание2
Разработайте функцию с объявленными типами аргументов и возвращаемого значения,
принимающую в качестве аргумента массив целых чисел. Результатом работы функции должен быть массив,
содержащий три элемента: 
max — наибольшее число, min — наименьшее число, avg — среднее арифметическое всех чисел массива;

$mas = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];

$aggregationData = function (array $numbers): array {

return [
    'max' => max($numbers),
    'min' => min($numbers),
    'average' => array_sum($numbers) / count($numbers),
];
};
print_r($aggregationData($mas));

задание1
Подготовьте массив целых чисел (4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2).
Разработайте анонимную функцию для применения в качестве аргумента array_map, возвращающую для 
каждого элемента массива строковое значение:
«четное» или «нечетное». Для проверки четности числа используйте деление по модулю (%);

$mas = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];
$eventOddCheck = function (int $el): string {
    return $el % 2 ? 'нечётное' : 'чётное';
};
$evenOdd = array_map($eventOddCheck, $mas);
print_r($evenOdd);

задание3
Дан многомерный массив, представляющий собой коробку, в которую сложены предметы. 
Помимо обычных предметов, каждая коробка может содержать другие коробки. Необходимо написать функцию, 
проверяющую, есть ли предмет в цепочке коробок или нет.
Функция должна принимать два аргумента: стоковое название предмета для поиска (например: «Ключ») и 
изначальный массив. Возвращаемое значение — bool, где true означает наличие предмета, а false его отсутствие.
Механизм поиска должен быть реализован с применением рекурсии. Пример массива:*/



$box = [
   [
       0 => 'Тетрадь',
       1 => 'Книга',
       2 => 'Настольная игра',
       3 => [
           'Настольная игра',
           'Настольная игра',
       ],
       4 => [
           [
               'Ноутбук',
               'Зарядное устройство'
           ],
           [
               'Компьютерная мышь',
               'Набор проводов',
               [
                   'Фотография',
                   'Картина'
               ]
           ],
           [
               'Инструкция',
               [
                   'Ключ'
               ]
           ]
       ]
   ],
   [
       0 => 'Пакет кошачьего корма',
       1 => [
           'Музыкальный плеер',
           'Книга'
       ]
   ]
];

$text = (string)readline("Введите предмет:");
function search(string $searchThing, array $searchArray): bool
{
    foreach ($searchArray as $value) {
        if (is_array($value)) {
            if (search($searchThing, $value)) {
                return true;
            }
        } else {
            if ($searchThing === $value) {
                return true;
            }
        }
    }
    return false;
}
echo search($text, $box) ? 'true' : 'false';