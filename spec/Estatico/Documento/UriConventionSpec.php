<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Estatico\Documento\UriConvention;

class UriConventionSpec extends ObjectBehavior
{
    function it_should_have_a_default_collection(){
    	//when
    	$this->beConstructedWith('/');

    	//then
    	$defaultCollection = UriConvention::DEFAULT_COLLECTION;
    	$this->getCollectionName()->shouldReturn($defaultCollection);
    }


    function it_should_take_the_first_part_of_uri_as_collection_name(){
    	//when
    	$this->beConstructedWith('/collection/file.md');

    	//then
    	$this->getCollectionName()->shouldReturn('collection');
    }

}
