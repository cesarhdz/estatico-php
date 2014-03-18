<?php

namespace spec\Estatico\Documento\Format;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

require __DIR__ . '/../../../helpers.php';

class PageFormatSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Estatico\Documento\Format\PageFormat');
        $this->shouldImplement('Estatico\Documento\Format\DocumentFormat');
    }


    function it_supports_html_files(){
    	$this->shouldBeSupported('index.html');
    	$this->shouldBeSupported('services/photo.html');
    	$this->shouldBeSupported('services/web/design.html');

    }

}
