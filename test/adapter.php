<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$adapter = new Gaufrette\Adapter\Local('/tmp');
$factory = new Gaufrette\Core\FileFactory();
$fs      = new Gaufrette\Core\Filesystem($factory, $adapter);

$file = $factory->createFile('foo.bar', 'baz');
$file->addMetadata('author', 'The Amazing Serges');
$file->addMetadata('team', 'Tu peux pas test');

//Save the file
$fs->save($file);
var_dump($fs->exists($file) ? 'File created' : 'ERROR !!!');

//Delete the file
$fs->delete($file);
var_dump(!$fs->exists($file) ? 'File deleted' : 'ERROR !!!');

//Move the file
$fs->save($file);
var_dump($fs->exists($file) ? 'File created' : 'ERROR !!!');
$fs->delete($file);
var_dump(!$fs->exists($file) ? 'File deleted' : 'ERROR !!!');
$file->setName('bar.foo');
$fs->save($file);
var_dump($fs->exists($file) ? 'File moved' : 'ERROR !!!');
