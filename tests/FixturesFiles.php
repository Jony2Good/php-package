<?php

namespace Unit\Tests;
class FixturesFiles
{
    public function getFixtureFullPath(string $fileName): string
    {
        $parts = [__DIR__, 'fixtures', $fileName];
        return realpath(implode('/', $parts));
    }
}