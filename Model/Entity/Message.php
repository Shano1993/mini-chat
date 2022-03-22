<?php

namespace App\Model\Entity;

use DateTime;

class Message
{
    private int $id;
    private string $content;
    private DateTime $dateTime;
    private User $author;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Message
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Message
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateTime(): DateTime
    {
        return $this->dateTime;
    }

    /**
     * @param DateTime $dateTime
     * @return Message
     */
    public function setDateTime(DateTime $dateTime): self
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param User $author
     * @return Message
     */
    public function setAuthor(User $author): self
    {
        $this->author = $author;
        return $this;
    }
}