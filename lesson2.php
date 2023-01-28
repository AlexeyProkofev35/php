<?php

// Задание 1

/*while(true) {
    $answer = (int)readline("В каком году развалился советский союз?" .
    "1) 1987 " .
    "2) 1993"  .
    "3) 1991"  . PHP_EOL);
    if ($answer === 1987) {
        echo 'Ответ неверный';
    break;
    }
    if ($answer === 1993) {
        echo 'Ответ неверный';
    break;
    }
    if ($answer === 1991) {
        echo 'Ответ верный';
    break;
    }
}*/

//Задание 2
 
while(true) {
$taskCount = (int)readline("Список задач запланированных на день:");
if ($taskCount > 0 && $taskCount < 2) {
    for ($i = 0; $i < 2; $i++) {
        $name = readline('Введите ваше имя:');
        $task1 = readline('Какая первая задача стоит перед вами сегодня?:');
        $time1 = readline('Сколько примерно времени эта задача займет?:');
        $task2 = readline('Какая вторая задача стоит перед вами сегодня?:');
        $time2 = readline('Сколько примерно времени эта задача займет?:');
        $task3 = readline('Какая третья задача стоит перед вами сегодня?:');
        $time3 = readline('Сколько примерно времени эта задача займет?:');
        echo "$name сегодня запланировано три приорететных задачи на день:\n - $task1 ($time1)\n - $task2 ($time2)\n - $task3 ($time3)\n";
        $summatime = $time1+$time2+$time3;
        echo "Примерное время выполнения плана = $summatime часа";
        break;
    }
}
}