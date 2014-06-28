<?php

namespace Gaufrette;

class Filesystem
{
    protected $fileFactory;

    public function __construct(Adapter $adapter, FileFactory $fileFactory = null)
    {
        $this->adapter = $adapter;
        $this->fileFactory = $fileFactory ?: new FileFactory;
    }

    public function createFile($name)
    {
        return $this->fileFactory->create($this->adapter, $name);
    }

    public function importFile(File $file)
    {
        $file = clone $file;
        $file->setAdapter($this->adapter);

        return $file;
    }
}
