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

        if (!is_file($filepath)) {
            throw new \Exception(sprintf(
                'File "%s" not found',
                $path
            ));
        }

        if (is_file($metapath)) {
            $meta = unserialize(file_get_contents($metapath));
            foreach ($meta as $key => $value) {
                $file->setMetadata($key, $value);
            }
        }

        return $file->setContent(file_get_contents($filepath));
    }

    public function save(FileInterface $file)
    {
        file_put_contents($this->getFilePath($file->name), $file->getContent());

        if (!empty($file->getAllMetadata())) {
            file_put_contents(
                $this->getFilePath($file->name . '_meta'),
                serialize($file->getAllMetadata())
            );
        }
    }

    protected function getFilePath($filename)
    {
        return $this->basePath . DIRECTORY_SEPARATOR . $filename;
    }
}
