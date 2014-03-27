<?php

namespace spec\estatico\documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DocumentMetaSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('estatico\documento\DocumentMeta');
        $this->shouldImplement('estatico\documento\interfaces\DocumentMeta');
    }
}
