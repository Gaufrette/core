<?php

namespace Gaufrette\Core;

use Gaufrette\Core\AdapterInterface;
use Gaufrette\Core\FileFactory;
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
     *
     * @return
     */
    public function __construct(FileFactory $fileFactory, AdapterInterface $adapter)
    {
        $this->fileFactory = $fileFactory;
        $this->adapter     = $adapter;
    }

    /**
     * @param string $name
     *
     * @return FileInterface
     */
    public function get($name)
    {
        $file = $this->fileFactory->createFile($name);
        $file = $this->adapter->get($file);

        return $file;
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
     * @param FileInterface $file
     *
     * @return boolean
     */
    public function exists(FileInterface $file)
    {
        return $this->adapter->exists($file);
    }
}
