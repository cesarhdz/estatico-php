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

    function it_should_return_a_page_when_get_is_called(){
        $this->setDir(get_example_dir('documento/page'));

        foreach ($this->pages as $page) {
            $file = $this->get($page);

            $file->shouldImplement('Estatico\Documento\Document');
            $file->shouldHaveType('Estatico\Documento\Page');
        }
    }

    function it_should_return_null_if_file_does_not_exists(){
        $this->setDir(get_example_dir('documento/page'));

        $this->get('notFound.md')->shouldReturn(null);
    }

    
    function it_should_return_all_public_pages(){
        $this->setDir(get_example_dir('documento/page'));

        foreach($this->getWrappedObject()->all() as $page){
            $msg = 'After PageFormat:all() the result set must contain only Pages';
            assertInstanceOf('Estatico\Documento\Page', $page, $msg);
        }

        $this->all()->shouldHaveCount(3);
    }
}
