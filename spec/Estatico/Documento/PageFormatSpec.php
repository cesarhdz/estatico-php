<?php

namespace spec\Estatico\Documento;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

require __DIR__ . '/../../helpers.php';

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
    	$this->shouldBeSupported('services/web/design.html');

    }

    function it_doesn_support_underscore_prefixed_files(){
    	$this->shouldNotBeSupported('_index.html');
    	$this->shouldNotBeSupported('services/_photo.html');
    	$this->shouldNotBeSupported('services/web/_design.html');
    }

    var $pages = array(
        'about.html',
        'articles/typo.html',
        'contact.html'
    );

    function it_should_test_file_existence_with_in_markdwon_by_default(){
        $this->setDir(get_example_dir('documento/page'));

        foreach ($this->pages as $page) {
            $this->exists($page)->shouldReturn(true);
        }
    }
}
