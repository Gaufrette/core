<?php

namespace spec\Gaufrette\Core;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Gaufrette\Core\FileFactory;
use Gaufrette\Core\AdapterInterface;

class FilesystemSpec extends ObjectBehavior
{
    function let(FileFactory $fileFactory, AdapterInterface $adapter)
    {
        $this->beConstructedWith($fileFactory, $adapter);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Filesystem');
    }
}
