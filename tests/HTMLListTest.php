<?php

namespace Unit\Tests;

use Unit\HTMLList;
use Unit\Tests\FixturesFiles;
class HTMLListTest extends \PHPUnit\Framework\TestCase
{
    protected FixturesFiles $path;
    protected HTMLList $list;
    protected array $fileName;
    protected function setUp(): void
    {
        $this->fileName = [
            'json' => "list.json",
            'yaml' => "list.yaml",
            'csv' => "list.csv",
            "result" => "result.html"
        ];
        $this->list = new HTMLList();
        $this->path = new FixturesFiles();

    }
    public function testEqualsFromJsonToHTML()
    {
        $expected = $this->path->getFixtureFullPath($this->fileName['result']);
        $path = $this->path->getFixtureFullPath($this->fileName['json']);
        $data = $this->list->toHTMLList($path);
        $this->assertStringNotEqualsFile($expected, $data);
    }
}
