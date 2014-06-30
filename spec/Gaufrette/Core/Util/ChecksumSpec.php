<?php

namespace spec\Gaufrette\Core\Util;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ChecksumSpec extends ObjectBehavior
{
    function let()
    {
        $path = __DIR__.DIRECTORY_SEPARATOR.'testFile';
        file_put_contents($path, 'some other content');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Util\Checksum');
    }

    function it_calculates_checksum_from_content()
    {
        $this->fromContent('some content')->shouldReturn(md5('some content'));
    }

    function it_calculates_checksum_from_filepath()
    {
        $path = __DIR__.DIRECTORY_SEPARATOR.'testFile';
        $this->fromFile($path)->shouldReturn(md5('some other content'));
    }

    function letgo()
    {
        $path = __DIR__.DIRECTORY_SEPARATOR.'testFile';
        @unlink(__DIR__.DIRECTORY_SEPARATOR.'testFile');
    }
}
