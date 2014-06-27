<?php

require 'vendor/autoload.php';

$dir = '/tmp/gaufrette';
mkdir($dir, 0700);
$fs = new Gaufrette\Filesystem(new Gaufrette\Adapter\Locale($dir));
$foo = $fs->createFile('foo.txt');
$foo->content = 'foo';
$foo->metadata = ['author' => 'GildasQ'];
$foo->save();
