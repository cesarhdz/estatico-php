<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Estatico\Documento\UriConvention;

class UriConventionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Estatico\Documento\UriConvention');
    }

    function it_should_have_a_default_collection(){
    	//expect
    	$defaultCollection = UriConvention::DEFAULT_COLLECTION;
    	$this->getCollectionName()->shouldReturn($defaultCollection);
    }

}
