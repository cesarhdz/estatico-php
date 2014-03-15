<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PageFormatSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Estatico\Documento\PageFormat');
        $this->shouldImplement('Estatico\Documento\DocumentFormat');
    }


    function it_supports_html_files(){
    	$this->shouldBeSupported('index.html');
    	$this->shouldBeSupported('services/photo.html');
    	$this->shouldBeSupported('services/web/desig.html');
    }
}
