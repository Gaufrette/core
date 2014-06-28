<?php

namespace Gaufrette\Adapter;

use Gaufrette\Adapter;
use Gaufrette\File;

class Locale implements Adapter
{
    protected $basePath;

    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }

    public function getContent(File $file)
    {
        $path = $this->getFilePath($file->name);
        if (!is_file($path)) {
            return '';
        }

        return file_get_contents($path);
    }

    public function getMetadata(File $file)
    {
        $path = $this->getFilePath($file->name) . '.metadata';
        if (!is_file($path)) {
            return array();
        }

        return unserialize(file_get_contents($path));
    }

    public function write(File $file)
    {
        file_put_contents($this->getFilePath($file->name), $file->content);
        file_put_contents($this->getFilePath($file->name) . '.metadata', serialize($file->metadata));
    }

    public function getFilePath($filename)
    {
        return $this->basePath . DIRECTORY_SEPARATOR . $filename;
    }
}
