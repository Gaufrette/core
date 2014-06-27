<?php

namespace Gaufrette;

class File
{
    public $content;
    public $metadata;
    public $name;

    protected $adapter;

    public function __construct(Adapter $adapter, $name)
    {
        $this->adapter = $adapter;
        $this->name = $name;
        $this->content = $this->adapter->getContent($this);
        $this->metadata = $this->adapter->getMetadata($this);
    }

    public function save()
    {
        $this->adapter->write($this);
    }
}
