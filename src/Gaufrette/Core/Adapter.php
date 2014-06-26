<?php

namespace Gaufrette\Core;

use Gaufrette\Core\File;

/**
 * Interface for the filesystem adapters
 */
interface Adapter
{
    /**
     * Reads the content of the file
     *
     * @param File $file
     *
     * @return string|boolean if cannot read content
     */
    public function read(File $file);

    /**
     * Writes the given content into the file
     *
     * @param File $file
     * @param string $content
     *
     * @return integer|boolean The number of bytes that were written into the file
     */
    public function write(File $file, $content);

    /**
     * Indicates whether the file exists
     *
     * @param File $file
     *
     * @return boolean
     */
    public function exists(File $file);

    /**
     * Returns an array of all files and directories
     *
     * @return array
     */
    public function files();

    /**
     * Returns the last modified time
     *
     * @param File $file
     *
     * @return integer|boolean An UNIX like timestamp or false
     */
    public function mtime(File $file);

    /**
     * Deletes the file
     *
     * @param File $file
     *
     * @return boolean
     */
    public function delete(File $file);

    /**
     * Renames a file
     *
     * @param File $sourceFile
     * @param File $targetFile
     *
     * @return boolean
     */
    public function move(File $sourceFile, File $targetFile);

    /**
     * Check if file is directory
     *
     * @param File $file
     *
     * @return boolean
     */
    public function isDirectory(File $file);
}
