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
        $this->setAdapter($adapter);
        $this->name = $name;
        $this->content = $adapter->getContent($this);
        $this->metadata = $adapter->getMetadata($this);
    }

    public function save()
    {
        $this->adapter->write($this);
    }

    public function setAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }
}
