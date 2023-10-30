<?php

namespace Unit\Tests;

use Unit\Acl;
use Unit\Acl\AccessDenied;
use Unit\Acl\PrivilegeUndefined;
use Unit\Acl\ResourceUndefined;


class AclTest extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        $data = [
            'articles' => [
                'show' => ['editor', 'manager'],
                'edit' => ['editor']
            ],
            'money' => [
                'create' => ['editor'],
                'show' => ['editor', 'manager'],
                'edit' => ['manager'],
                'remove' => ['manager']
            ]
        ];
        $this->acl = new Acl($data);
    }

    public function testResourceUndefined()
    {
        try {
            $this->acl->check('article', 'edit', 'manager');
        } catch (ResourceUndefined $e) {
            $this->assertNotNull($e);
        }
        $this->expectException(ResourceUndefined::class);
        $this->acl->check('article', 'edit', 'manager');
    }

    public function testPrivilegeUndefined()
    {
        $this->expectException(PrivilegeUndefined::class);
        $this->acl->check('articles', 'editor', 'manager');
    }

    public function testAccessDenied()
    {
        $this->expectException(AccessDenied::class);
        $this->acl->check('articles', 'show', 'reader');
    }
}