<?php

namespace Gaufrette\Adapter;

use Gaufrette\Core\AdapterInterface;
use Gaufrette\Core\FileInterface;

class Local implements AdapterInterface
{
    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }

    public function get(FileInterface $file)
    {
        $filepath = $this->getFilePath($file->getName());
        $metapath = $this->getFilePath($file->getName() . '_meta');

        if (false === $this->exists($file)) {
            throw new \Exception(sprintf(
                'File "%s" not found',
                $filepath
            ));
        }

        if (is_file($metapath)) {
            $meta = unserialize(file_get_contents($metapath));
            $file->setMetadata($meta);
        }

        return $file->setContent(file_get_contents($filepath));
    }

    public function save(FileInterface $file)
    {
        $filepath = $this->getFilePath($file->getName());
        $metapath = $this->getFilePath($file->getName() . '_meta');

        file_put_contents($filepath, $file->getContent());

        if (!empty($file->getAllMetadata())) {
            file_put_contents(
                $metapath,
                serialize($file->getAllMetadata())
            );
        }
    }

    public function delete(FileInterface $file)
    {
        unlink($this->getFilePath($file->getName()));
    }

    public function exists(FileInterface $file)
    {
        return is_file($this->getFilePath($file->getName()));
    }

    protected function getFilePath($filename)
    {
        return $this->basePath . DIRECTORY_SEPARATOR . $filename;
    }
}
