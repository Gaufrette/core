<?php

namespace Gaufrette\Core;

interface FileInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     *
     * @return FileInterface
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getContent();

    /**
     * @param string $content
     *
     * @return FileInterface
     */
    public function setContent($content);

    /**
     * @return string
     */
    public function getSize();

    /**
     * @param string $size
     *
     * @return FileInterface
     */
    public function setSize($size);

    /**
     * @return string
     */
    public function getChecksum();

    /**
     * @param string $checksum
     *
     * @return FileInterface
     */
    public function setChecksum($checksum);

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getMetadata($key);

    /**
     * @param string $key
     * @param mixed $content
     *
     * @return FileInterface
     */
    public function addMetadata($key, $content);

    /**
     * @param array $metadata
     *
     * @return FileInterface
     */
    public function setMetadata(array $metadata);
}
