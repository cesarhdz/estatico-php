<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


use Estatico\Documento\CollectionHolder;

require_once __DIR__ . '/../../helpers.php';

class CollectionHolderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
    	$this->beConstructedWith(__DIR__);
        $this->shouldHaveType('Estatico\Documento\CollectionHolder');
    }



    function it_should_be_created_with_a_root_dir(){
    	//when
    	$this->beConstructedWith(__DIR__);

    	//then
    	$this->getCollections()->shouldNotReturn(null);
    }
}
