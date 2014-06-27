<?php

require 'vendor/autoload.php';

$dir1 = '/tmp/gaufrette1';
$dir2 = '/tmp/gaufrette2';
mkdir($dir1, 0700);
mkdir($dir2, 0700);
$fs1 = new Gaufrette\Filesystem(new Gaufrette\Adapter\Locale($dir1));
$fs2 = new Gaufrette\Filesystem(new Gaufrette\Adapter\Locale($dir2));

// Create a file within a filesystem
$foo = $fs1->createFile('foo.txt');
$foo->content = 'foo';
$foo->metadata = ['author' => 'GildasQ'];
$foo->save();

// Synchronize the file within another filesystem
$fs2->importFile($foo);
$foo->content = 'Une histoire de foo';
$foo->save(); // foo.txt exists now both in /tmp/gaufrette1 and /tmp/gaufrette2
              // and both files content is "Une histoire de foo"
