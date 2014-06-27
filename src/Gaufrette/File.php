<?php

namespace Gaufrette;

class File
{
    public $content;
    public $metadata;
    public $name;

    protected $adapters = array();

    public function __construct(Adapter $adapter, $name)
    {
        $this->addAdapter($adapter);
        $this->name = $name;
        $this->content = $adapter->getContent($this);
        $this->metadata = $adapter->getMetadata($this);
    }

    public function save()
    {
        foreach ($this->adapters as $adapter)
        {
            $adapter->write($this);
        }
    }

    public function addAdapter(Adapter $adapter)
    {
        $this->adapters[] = $adapter;
    }
}
