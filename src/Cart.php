<?php

namespace Unit;
class Cart
{

    private $items = [];

    public function addItem($good, $count)
    {
        $this->items[] = ['good' => $good, 'count' => $count];
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getCount()
    {
        return array_reduce($this->items, fn($acc, $item) => $acc + $item['count'], 0);
    }

    public function getCost()
    {
        return array_reduce($this->items, fn($acc, $item) => $acc + $item['good']['price'] * $item['count']);
    }
}