<?php

namespace Gaufrette\Core;

use Gaufrette\Core\FileInterface;

/**
 * A file abstraction
 *
 * @Package Gaufrette
 */
class File implements FileInterface
{
    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $content
     */
    private $content;

    /**
     * @var string $siez
     */
    private $size;

    /**
     * @var string $checksum
     */
    private $checksum;

    /**
     * @var array $metadata
     */
    private $metadata;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * {@inheritdoc}
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * {@inheritdoc}
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getChecksum()
    {
        return $this->checksum;
    }

    /**
     * {@inheritdoc}
     */
    public function setChecksum($checksum)
    {
        $this->checksum = $checksum;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addMetadata($key, $value)
    {
        $this->metadata[$key] = $value;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMetadata($key)
    {
        return array_key_exists($key, $this->metadata) ? $this->metadata[$key] : array();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllMetadata()
    {
        return $this->metadata;
    }
}
