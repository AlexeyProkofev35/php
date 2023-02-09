 <?php

/*задание 1
Разработайте класс Task, выполняющий ответственность обычной задачи Todo-списка.
Класс должен содержать приватные свойства description, dateCreated, dateUpdated, dateDone, priority (int), 
isDone (bool) и обязательное user (User). В качества класса пользователя воспользуйтесь разработанным на уроке.
Класс Task должен содержать все необходимые для взаимодействия со свойствами методы (getters, setters).
При вызове метода setDescription обновляйте значение свойства dateUpdated.
Разработайте метод markAsDone, помечающий задачу выполненной, а также обновляющий свойства dateUpdated и dateDone.

class Task
{
    private User $user;
    private int $priority;
    private string $description;
    private string $dateCreated;
    private string $dateUpdated;
    private bool $isDone = false;
    private string $dateDone;
    function __construct(User $user, int $priority, string $description)

{
$this->user = $user;
$this->priority = $priority;
$this->description = $description;
$this->dateCreated = $this->dateUpdated = date('Y-m-d H:i:s');
}
public function setDescription(string $description): void
{
    $this->description = $description;
    $this->dateUpdated = date('Y-m-d H:i:s');
}
public function getDescription(): string
{
    return $this->description;
}
public function markAsDone(): void
{
    $this->dateDone = $this->dateUpdated = date('Y-m-d H:i:s');
    $this->isDone = true;
}
}
class User
{
    private string $username;
    private string $email;
function __construct(string $username, string $email)
{
$this->username = $username;
$this->email = $email;
}
}

$user = new User('Ivan', 'ivan@mail.ru');
$task = new Task($user, 1, 'Little');
sleep(2);
$task->setDescription('newDescription');
sleep(2);
$task->markAsDone();
var_dump($task);

задание2 
Реализуйте два класса: Comment и TaskService. Comment должен содержать свойства author
(User), task (Task) и text (string). TaskService должен реализовывать статичный метод addComment(User, Task, text),
добавляющий к задаче комментарий пользователя. Отношение между классами задачи и комментария
должны быть построены по типу ассоциация, поэтому необходимо добавить соответствующее свойство и методы классу Task*/
class TaskService
{
    public static function addComment(User $user, Task $task, string $text): void
{
    $comment = new Comment($user, $task, $text);
    $task->addComment($comment);
}
}

class Comment
{
    private User $author;
    private Task $task;
    private string $text;
    public function __construct(User $author, Task $task, string $text)
    {
        $this->author = $author;
        $this->task = $task;
        $this->text = $text;
    }
}

class Task
{
    private User $user;
    private int $priority;
    private string $description;
    private string $dateCreated;
    private string $dateUpdated;
    private bool $isDone = false;
    private string $dateDone;
    private array $comments;
    function __construct(User $user, int $priority, string $description)

{
$this->user = $user;
$this->priority = $priority;
$this->description = $description;
$this->dateCreated = $this->dateUpdated = date('Y-m-d H:i:s');
}
public function setDescription(string $description): void
{
    $this->description = $description;
    $this->dateUpdated = date('Y-m-d H:i:s');
}
public function getDescription(): string
{
    return $this->description;
}
public function markAsDone(): void
{
    $this->dateDone = $this->dateUpdated = date('Y-m-d H:i:s');
    $this->isDone = true;
}
public function addComment(Comment $comment): void
{
    $this->comments[] = $comment;
}
}
class User
{
    private string $username;
    private string $email;
function __construct(string $username, string $email)
{
$this->username = $username;
$this->email = $email;
}
}

$user = new User('Ivan', 'ivan@mail.ru');
$task = new Task($user, 1, 'Little');
$task->setDescription('newDescription');
$task->markAsDone();
$user2 = new User('Victor', 'victor@mail.ru');
TaskService::addComment($user2, $task, 'Ehoho');
var_dump($task);