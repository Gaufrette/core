<?php

namespace spec\Gaufrette\Core\Operator;

use Gaufrette\Core\Adapter;
use Gaufrette\Core\Adapter\KnowsLastModification;
use Gaufrette\Core\File;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LastModificationOperatorSpec extends ObjectBehavior
{
    function let(KnowsLastModification $adapter, Adapter $other, File $file)
    {
        $date = new \DateTime('2015-01-01', new \DateTimeZone("Europe/Paris"));

        $adapter->implement('Gaufrette\Core\Adapter');
        $adapter->readLastModification('file.png')->willReturn(1234566000);

        $file->getName()->willReturn('file.png');
        $file->getLastModification()->willReturn($date);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gaufrette\Core\Operator\LastModificationOperator');
    }

    function it_supports_lasttime_interface($adapter, $file)
    {
        $this->supports($file, $adapter)->shouldReturn(true);
    }

    function it_doesnt_supports_other_adapter($other, $file)
    {
        $this->supports($file, $other)->shouldReturn(false);
    }

    function it_sets_last_access($adapter, $file)
    {
        $file->setLastModification(new \DateTime('2009-02-14', new \DateTimeZone("Europe/Paris")))->shouldBeCalled();

        $this->load($file, $adapter)->shouldReturn($this);
    }

    function it_gets_last_access($adapter, $file)
    {
        $adapter->writeLastModification('file.png', 1420066800)->shouldBeCalled();

        $this->save($file, $adapter)->shouldReturn($this);
    }

    function it_doesnt_load_lass_access_if_null($adapter, $file)
    {
        $adapter->readLastModification('file.png')->willReturn(null);
        $file->setLastModification(Argument::cetera())->shouldNotBeCalled();

        $this->load($file, $adapter)->shouldReturn($this);
    }

    function it_doesnt_save_lass_access_if_null($adapter, $file)
    {
        $file->getLastModification()->willReturn(null);
        $adapter->writeLastModification(Argument::cetera())->shouldNotBeCalled();

        $this->save($file, $adapter)->shouldReturn($this);
    }
}
