<?php

namespace Unit;

class Storage
{
    public function get($coll, $index, $defaultValue = null)
    {
        return array_key_exists($index, $coll) ? $coll[$index] : $defaultValue;
    }

    public function indexOf($coll, $value, $fromIndex = 0)
    {
        $length = count($coll);

        if ($length === 0) {
            return -1;
        }

        $index = $fromIndex;

        if ($index < 0) {
            if (-$index > $length) {
                $index = 0;
            } else {
                $index = $length + $index;
            }
        }

        for ($i = $index; $i < $length; $i++) {
            if ($coll[$i] === $value) {
                return $i;
            }
        }
        return -1;
    }

    public function slice($coll, $start = 0, $end = null): array
    {
        $length = count($coll);
        $end = $end ?? $length;
        $normalisedStart = $start;

        if ($normalisedStart < 0) {
            $normalisedStart = -$normalisedStart > $length ? 0 : $normalisedStart + $length;
        }

        $normalisedEnd = $end > $length ? $length : $end;

        if ($normalisedEnd < 0) {
            $normalisedEnd += $length;
        }

        $result = [];

        for ($i = $normalisedStart; $i < $normalisedEnd; $i++) {
            $result[] = $coll[$i];
        }

        return $result;
    }

}

$a = new Storage();
var_dump($a->indexOf([1,2,3,2,5], 2, -3));


