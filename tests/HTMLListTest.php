<?php

//include 'FixturesFiles.php';
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
        //получаем путь к файлу
        $path = $this->path->getFixtureFullPath($this->fileName['json']);
        //преобразуем данные из файла в HTML форму
        $data = $this->list->toHTMLList($path);
        //сравнение файла с результирующими данными
        $this->assertStringEqualsFile($expected, $data);
    }
}
