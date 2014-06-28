<?php

namespace Gaufrette;

interface Adapter
{
    public function getContent(File $file);
    public function getMetadata(File $file);
    public function write(File $file);
}
