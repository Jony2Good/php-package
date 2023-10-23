<?php

namespace Unit;

class Validator
{
    public $checks = [];

    public function addCheck($fn)
    {
        // функции-предикаты добавляются в массив
        $this->checks[] = $fn;
    }

    public function isValid($data)
    {
        // проходимся по каждой функции из массива
        foreach ($this->checks as $check) {
            // и проверяем на валидность данные, которые пришли в isValid
            if (!$check($data)) {
                return false;
            }
        }
        return true;
    }

}

//1. проверяем отработку возвращения булевого значения у функции два теста
//2. проверка метода в разных сценариях массив, объект, больше.меньше нечетное

$a = new Validator();




var_dump($a->checks);