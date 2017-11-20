<?php
$base = __DIR__ . '/../app/';

$folders = [
    'controllers',
    'route'
];

foreach($folders as $f)
{
    foreach (glob($base . "$f/*.php") as $filename)
    {
        require_once $filename;
    }
}
