<?php

namespace Unit;

class Fillable
{
    public function fill(array &$coll, $value, int $start = 0, $end = null): array
    {
        $endArr = min(count($coll), is_null($end) ? count($coll) : $end);
        for ($i = $start; $i < $endArr; $i++) {
            $coll[$i] = $value;
        }
        return $coll;
    }
}