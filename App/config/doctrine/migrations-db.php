<?php

return [
    'driver' => 'pdo_pgsql',
    'user' => getenv('DATABASE_USER'),
    'password' => getenv('DATABASE_PASSWORD'),
    'dbname' => getenv('DATABASE_NAME'),
    'host' => getenv('DATABASE_HOST'),
];
