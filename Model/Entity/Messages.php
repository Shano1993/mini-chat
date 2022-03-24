<?php

namespace App\Model\Entity;

use DateTime;

class Messages extends AbstractEntity
{
    private string $message;
    private DateTime $sendDate;
    private Users $author;

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Messages
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getSendDate(): DateTime
    {
        return $this->sendDate;
    }

    /**
     * @param DateTime $sendDate
     * @return Messages
     */
    public function setSendDate(DateTime $sendDate): self
    {
        $this->sendDate = $sendDate;
        return $this;
    }

    /**
     * @return Users
     */
    public function getAuthor(): Users
    {
        return $this->author;
    }

    /**
     * @param Users $author
     * @return Messages
     */
    public function setAuthor(Users $author): self
    {
        $this->author = $author;
        return $this;
    }
}
