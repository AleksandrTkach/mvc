<?php

return [
    // Account
    '' => [
        'controller' => 'account',
        'action' => 'login',
        'allowed' => ['guest'],
    ],
    'login' => [
        'controller' => 'account',
        'action' => 'login',
        'allowed' => ['guest'],
    ],
    'registration' => [
        'controller' => 'account',
        'action' => 'registration',
        'allowed' => ['guest'],
    ],
    'logout' => [
        'controller' => 'account',
        'action' => 'logout',
        'allowed' => ['admin', 'client'],
    ],
    // Tasks
    'tasks' => [
        'controller' => 'tasks',
        'action' => 'index',
        'allowed' => ['admin', 'client'],
    ],
    'tasks/:id' => [
        'controller' => 'tasks',
        'action' => 'show',
        'allowed' => ['admin', 'client'],
    ],
    'upload' => [
        'controller' => 'tasks',
        'action' => 'upload',
        'allowed' => ['admin'],
    ],
    // Parser
    'parser' => [
        'controller' => 'parser',
        'action' => 'index',
        'allowed' => ['admin'],
    ],
];
