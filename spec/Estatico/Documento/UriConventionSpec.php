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
    	$this->getCollectionName()
    		 ->shouldReturn('pages');
    }


    function it_should_take_the_first_part_of_uri_as_collection_name(){
    	//when
    	$this->beConstructedWith('/collection/file.md');

    	//then
    	$this->getCollectionName()->shouldReturn('collection');
    }


    function it_should_have_a_default_file_name(){
    	//when
    	$this->beConstructedWith('/');

    	//then
    	$this->getFileName()
    		 ->shouldReturn('index');
    }


    function it_should_take_the_filename_and_save_wihtout_extension(){
    	//when
    	$this->beConstructedWith('/about.html');

    	//then
    	$this->getFileName()->shouldReturn('about');
    }

}
