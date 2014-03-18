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


    function it_should_take_the_extension_of_the_uri_and_save(){
    	//when
    	$this->beConstructedWith('any.txt');

    	//then
    	$this->getExtension()->shouldReturn('txt');
    }

    function it_should_have_html_as_default_extension_in_case_no_one_is_provided(){
    	//when
    	$this->beConstructedWith('/');

    	//then
    	$this->getExtension()->shouldReturn('html');
    }

}
