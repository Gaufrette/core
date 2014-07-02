<?php

namespace spec\Gaufrette\Core;

use PhpSpec\ObjectBehavior;

class FileFactorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\FileFactory');
    }

    function its_createFile_should_return_file()
    {
        $this->createFile()->shouldHaveType('Gaufrette\Core\File');
    }

    function its_createFile_should_return_fully_loaded_file_if_wanted()
    {
        $this->createFile('foo', 'bar')->getName()->shouldReturn('foo');
        $this->createFile('foo', 'bar')->getContent()->shouldReturn('bar');
    }
}
