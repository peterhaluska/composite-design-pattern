<?php

namespace App\Entity;

class GiftBox
{
    /** @var array */
    private $items;

    /** @var string */
    private $name;

    /** @var string */
    private $code;

    /** @var int */
    private $price;

    /**
     * @param array  $items
     * @param string $name
     * @param int  $price
     * @param string $code
     */
    public function __construct(array $items, string $name, int $price, string $code)
    {
        $this->items = $items;
        $this->name  = $name;
        $this->price = $price;
        $this->code = $code;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }
}
