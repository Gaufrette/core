<?php

namespace Gaufrette\Core;

use Gaufrette\Core\FileFactory;
use Gaufrette\Core\Filesystem;

/**
 * Provide a direct access to file content
 */
class ContentManager
{
    /**
     * @var Filesystem $filesystem
     */
    private $filesystem;

    /**
     * @var FileFactory $factory
     */
    private $factory;

    /**
     * @param Filesystem $filesystem
     * @param FileFactory $factory
     */
    public function __construct(Filesystem $filesystem, FileFactory $factory)
    {
        $this->filesystem  = $filesystem;
        $this->factory = $factory;
    }

    /**
     * @param string $key
     *
     * @return string
     */
    public function read($key)
    {
        $file = $this
            ->filesystem
            ->get($key)
        ;

        return $file->getContent();
    }

    /**
     * @param string $key
     * @param string $content
     *
     * @return
     */
    public function write($key, $content)
    {
        $this->filesystem->save(
            $file = $this->factory->createFile($key, $content)
        );

        return $file;
    }
}
