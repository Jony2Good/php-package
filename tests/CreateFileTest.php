<?php

namespace Unit\Tests;

use org\bovigo\vfs\vfsStream,
    org\bovigo\vfs\vfsStreamDirectory;
use PHPUnit\Framework\TestCase;
use Unit\CreateFile;

class CreateFileTest extends TestCase
{
    private $root;
    private $dir;

    protected function setUp(): void
    {
        $this->root = vfsStream::setup("files");
    }

    public function testDirectoryIsCreated()
    {
        $this->dir = new CreateFile("text");
        $this->assertFalse($this->root->hasChild("text"));
        $this->dir->create(vfsStream::url("files"));
        $this->assertTrue($this->root->hasChild("text"));
    }

}