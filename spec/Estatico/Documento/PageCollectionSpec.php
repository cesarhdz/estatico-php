<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PageCollectionSpec extends ObjectBehavior
{
    function it_is_initializable_and_have_name_and_dir()
    {
    	//when
    	$this->beConstructedWith(__DIR__, 'name');

    	//then
        $this->shouldHaveType('Estatico\Documento\PageCollection');
        $this->getDir()->shouldReturn(__DIR__);
        $this->getName()->shouldReturn('name');
    }
}
