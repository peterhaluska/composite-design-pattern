<?php

namespace App\Entity;

use DateTime;

class Order implements OrderInterface
{
    /** @var UserInterface */
    private $user;

    /** @var int */
    private $id;

    /** @var DateTime */
    private $createdAt;

    /** @var array */
    private $items;

    /** @var int */
    private $price;

    /**
     * @param UserInterface $user
     * @param int           $id
     * @param DateTime      $createdAt
     * @param array         $items
     * @param int           $price
     */
    public function __construct(UserInterface $user, int $id, DateTime $createdAt, array $items, int $price)
    {
        $this->user      = $user;
        $this->id        = $id;
        $this->createdAt = $createdAt;
        $this->items     = $items;
        $this->price = $price;
    }

    /**
     * @return UserInterface
     */
    public function getUser(): UserInterface
    {
        return $this->user;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function getFormattedDate(): string
    {
        return $this->getCreatedAt()->format('Y-m-d H:i');
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }
}
