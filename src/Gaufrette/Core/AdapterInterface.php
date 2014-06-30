<?php

namespace Gaufrette\Core;

use Gaufrette\Core\FileInterface;

/**
 * Interface for the filesystem adapters
 */
interface AdapterInterface
{
    /**
     * Reads the content of the file
     *
     * @param string $name
     *
     * @return FileInterface
     */
    public function get($name);

    /**
     * Writes the given content into the file
     *
     * @param FileInterface $file
     */
    public function save(FileInterface $file);

    /**
     * Deletes the file
     *
     * @param FileInterface $file
     */
    public function delete(FileInterface $file);
}
