<?php

namespace Unit;

class CreateFile
{
    protected string $id;

    protected string $dir;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function create(string $directory): void
    {
        $this->dir = $directory . DIRECTORY_SEPARATOR . $this->id;
        if (file_exists($this->dir) === false) {
            mkdir($this->dir, 700, true);
        }
    }
}

