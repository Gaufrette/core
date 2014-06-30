<?php

namespace Gaufrette\Core;

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
     * @return File
     */
    public function get($name);

    /**
     * Writes the given content into the file
     *
     * @param File $file
     */
    public function save(File $file);

    /**
     * Deletes the file
     *
     * @param File $file
     */
    public function delete(File $file);
}
