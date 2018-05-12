<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TodoRepository")
 */
class Todo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $todo_date;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $create_date;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTodoDate(): ?string
    {
        return $this->todo_date;
    }

    public function setTodoDate(string $todo_date): self
    {
        $this->todo_date = $todo_date;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeImmutable
    {
        return $this->create_date;
    }

    public function setCreateDate(\DateTimeImmutable $create_date): self
    {
        $this->create_date = $create_date;

        return $this;
    }
}
