<?php
/* @var $pageHeader string */
/* @var $user ?User */
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>
<h1><?= $pageHeader ?></h1>

<?php if (isset($user)): ?>
    <p>Давно не заходили, <?= $user->getName() ?></p>
    <a href="?controller=task">Задачи</a>
    <hr>
    <a href="?controller=security&action=logout">Выйти</a>

<?php else: ?>
    <a href="?controller=security&action=signin">Войти</a>
<?php endif; ?>
</body>
</html>
