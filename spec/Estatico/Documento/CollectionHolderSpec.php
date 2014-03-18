<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionHolderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Estatico\Documento\CollectionHolder');
    }
}
