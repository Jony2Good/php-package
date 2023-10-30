<?php

return [
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
