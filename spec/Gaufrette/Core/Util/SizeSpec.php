<?php

namespace spec\Gaufrette\Core\Util;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SizeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Util\Size');
    }

    function it_calculates_size_of_content()
    {
        $this->fromContent('some content')->shouldReturn(12);
        $this->fromContent('some other content')->shouldReturn(18);
        $this->fromContent('some')->shouldReturn(4);
    }
}
