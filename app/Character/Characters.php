<?php

namespace App\Character;

use IteratorIterator;
use ArrayIterator;

class Characters extends IteratorIterator {

    public function __construct(Character ...$characters)
    {
        parent::__construct(new ArrayIterator($characters));
    }

    public function current(): Character
    {
        return parent::current();
    }

    public function offsetGet($index)
    {
        parent::offsetGet($index);
    }

    public function add(Character $character)
    {
        $this->getInnerIterator()->append($character);
    }

    public function set(int $key, Character $character)
    {
        $this->getInnerIterator()->offsetSet($key, $character);
    }
}
