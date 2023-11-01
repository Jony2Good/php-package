<?php

namespace Unit;
include '../tests/FixturesFiles.php';

use Symfony\Component\Yaml\Yaml;
use Unit\Tests\FixturesFiles;

class HTMLList
{
    public function toHTMLList(string $path): string
    {
        $parsers = [
            'json' => fn ($content) => json_decode($content, true),
            'yaml' => fn ($content) => Yaml::parse($content),
            'csv' => fn ($content) => str_getcsv($content)
        ];

        $content = file_get_contents($path);
        $type = pathinfo($path)['extension'];
        $items = $parsers[$type]($content);
        $list = array_map(fn ($item) => "<li>{$item}</li>", $items);
        return "<ul>\r\n" . implode('\r\n', $list) . "\r\n</ul>ul>\r\n";
    }
}
