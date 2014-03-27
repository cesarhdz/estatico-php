<?php

namespace spec\estatico\documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DocumentFormatterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('estatico\documento\DocumentFormatter');
        $this->shouldImplement('estatico\documento\interfaces\DocumentFormatter');
    }
}
