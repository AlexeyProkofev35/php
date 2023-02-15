<?php

class Task
{
    private int $id;
    private int $user_id;
    private string $description = "";
    private int $isDone = 0;

    public function __construct()
    {
        $this->user_id = $_SESSION['user']->getId();
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function getDescription(): string
    {
        return $this->description;
    }

    public function isDone(): int
    {
        return $this->isDone;
    }

    public function setIsDone(int $isDone): void
    {
        $this->isDone = $isDone;
    }
}