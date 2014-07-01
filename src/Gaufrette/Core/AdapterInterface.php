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
     * @param FileInterface $file
     *
     * @return FileInterface
     */
    public function get(FileInterface $file);

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

    /**
     * Return TRUE if the file exists, FALSE else
     *
     * @param FileInterface $file
     * @return boolean
     */
    public function exists(FileInterface $file);
}
