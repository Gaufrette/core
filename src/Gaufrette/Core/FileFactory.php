<?php

namespace Gaufrette\Core;

use Gaufrette\Core\File;

/**
 * Build e new file instance
 *
 * @Package Gaufrette
 */
class FileFactory
{
    /**
     * @var string $name
     * @var string $content
     *
     * @param string $name
     * @param string $content
     * @return File
     */
    public function createFile($name = null, $content = null)
    {
        $file = new File;

        return $file
            ->setName($name)
            ->setContent($content)
        ;
    }
}
