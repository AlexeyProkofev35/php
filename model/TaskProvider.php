<?php

class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addTask(Task $task)
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (user_id, description, isDone) VALUES (:user_id, :description, :isDone)'
        );
        $statement->execute([
            'user_id' => $task->getUserId(),
            'description' => $task->getDescription(),
            'isDone' => $task->isDone()
        ]);
    }

    public function setIsDone(int $taskId, int $isDone)
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks SET isDone = :isDone WHERE rowid = :id'
        );
        $statement->execute([
            'id' => $taskId,
            'isDone' => $isDone,
        ]);
    }

    public function getUndoneList(): ?array
    {
        $statement = $this->pdo->prepare(
            'SELECT id, description FROM tasks WHERE user_id = :user_id AND isDone = 0'
        );
        $statement->execute([
            'user_id' => $_SESSION['user']->getId(),
        ]);
        return $statement->fetchAll(PDO::FETCH_CLASS, Task::class) ?: null;
    }


}