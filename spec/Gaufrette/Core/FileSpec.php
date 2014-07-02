<?php

namespace spec\Gaufrette\Core;

use PhpSpec\ObjectBehavior;

class FileSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\File');
    }
}
