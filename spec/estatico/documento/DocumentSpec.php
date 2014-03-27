<?php

namespace spec\estatico\documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DocumentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('estatico\documento\Document');
        $this->shouldImplement('estatico\documento\interfaces\Document');
    }
}
