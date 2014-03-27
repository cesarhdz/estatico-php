<?php

namespace spec\estatico\documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DocumentCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
    	$this->beConstructedWith('dir', 'name');

        $this->shouldHaveType('estatico\documento\interfaces\DocumentCollection');
        $this->shouldHaveType('estatico\documento\DocumentCollection');
    }
}
