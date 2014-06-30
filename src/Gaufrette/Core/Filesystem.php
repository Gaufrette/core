<?php

namespace Gaufrette\Core;

use Gaufrette\Core\FileFactory;
use Gaufrette\Core\AdapterInterface;
use Gaufrette\Core\FileInterface;

/**
 * A filesystem abstraction
 *
 * @Package Gaufrette
 */
class Filesystem
{
    /**
     * @var FileFactory $fileFactory
     */
    private $fileFactory;

    /**
     * @var AdapterInterface $adapter
     */
    private $adapter;

    /**
     * @param FileFactory $fileStat
     *
     * @return
     */
    public function __construct(FileFactory $fileFactory, AdapterInterface $adapter)
    {
        $this->fileFactory = $fileFactory;
        $this->adapter     = $adapter;
    }

    public function createStream($key)
    {
        return $this->adapter->createStream($key);
    }

    /**
     * @param string $name
     *
     * @return FileInterface
     */
    public function get($name)
    {
        return $this->fileFactory->createFile($name);
    }

    /**
     * @param FileInterface $file
     *
     * @return Filesystem
     */
    public function save(FileInterface $file)
    {
        $this->adapter->save($file);

        return $this;
    }

    /**
     * @param FileInterface $file
     *
     * @return Filesystem
     */
    public function delete(FileInterface $file)
    {
        $this->adapter->delete($file);

        return $this;
    }

    /**
     * Returns the adapter
     *
     * @return Adapter
     */
    public function getAdapter()
    {
        return $this->adapter;
    }
}