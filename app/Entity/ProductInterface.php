<?php

namespace App\Entity;

interface ProductInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @return int
     */
    public function getPrice(): int;
}
