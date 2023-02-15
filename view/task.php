<?php
/* @var $tasks array */
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
            crossorigin="anonymous">
    <style>
        table, td, th {
            border: 1px solid black
        }
    </style>
</head>
<body>
<div class="container text-center">
    <div class="row">
        <form action="?controller=task&action=add" method="post">
            <label>Описание задачи</label><br>
            <input type="text" name="description">
            <button type="submit">Добавить</button>
        </form>
        <hr>
        <table style="width: 300px; margin: auto">
            <thead>
            <tr>
                <th>#</th>
                <th>Задача</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            /* @var $task Task */
            foreach ($tasks as $task) :?>
                <tr>
                    <td><?= $task->getDescription() ?></td>
                    <td><?= $task->isDone() ? 'Выполнена' : 'Не выполнена' ?></td>
                    <td><a href="?controller=task&action=setDone&id=<?= $task->getId() ?>">Выполнить</a></td>
                </tr>
            <?php endforeach;
            ?>
            </tbody>
        </table>


    </div>
</div>
</body>
</html>