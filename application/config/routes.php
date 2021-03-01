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
    'tasks/([0-9]+)' => [
        'replacement' => '$1',
        'controller' => 'tasks',
        'action' => 'show',
        'allowed' => ['admin', 'client'],
    ],
    'tasks/update/([0-9]+)' => [
        'replacement' => '$1',
        'controller' => 'tasks',
        'action' => 'update',
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
