<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$adapter = new Gaufrette\Adapter\Local('/tmp');
$factory = new Gaufrette\Core\FileFactory();
$fs      = new Gaufrette\Core\Filesystem($factory, $adapter);

$file = $factory->createFile('foo.bar', 'baz');
$file->addMetadata('author', 'The Amazing Serges');
$file->addMetadata('team', 'Tu peux pas test');
$fs->save($file);

unset($file);
var_dump($fs->get('foo.bar'));
