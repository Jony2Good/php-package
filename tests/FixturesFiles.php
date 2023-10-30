<?php

namespace Unit\Tests;
class FixturesFiles
{
    public function __construct(private readonly string $fixturesFileName, private array $file = [])
    {
        $this->file = $this->getFixtureFullPath();
    }
    public function get(): array
    {
        return $this->file;
    }

    private function getFixtureFullPath(): array
    {
        $parts = [__DIR__, 'fixtures', $this->fixturesFileName];
        $path = realpath(implode('/', $parts));
        return include $path;
    }
}