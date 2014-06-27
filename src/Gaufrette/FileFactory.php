<?php

namespace Gaufrette;

class FileFactory
{
    public function create(Adapter $adapter, $name)
    {
        return new File($adapter, $name);
    }
}
