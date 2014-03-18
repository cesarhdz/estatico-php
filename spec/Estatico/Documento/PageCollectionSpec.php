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


    function it_should_be_constructed_with_a_real_dir_or_an_exception_is_thrown(){
    	//setup
    	$this
    		->shouldThrow('\InvalidArgumentException')
    		->during('__construct', array('not a valid dir', 'name'));

    }
}
