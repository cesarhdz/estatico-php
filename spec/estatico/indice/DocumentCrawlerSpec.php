<?php

namespace spec\estatico\indice;

use org\bovigo\vfs\vfsStream as FS;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DocumentCrawlerSpec extends ObjectBehavior
{
	private $homeDir;

	function let(){
		FS::setup('home');
		$this->homeDir = FS::url('home');
	}

    function it_is_initializable()
    {
    	$this->beConstructedWith(FS::url('home'));
        $this->shouldHaveType('estatico\indice\DocumentCrawler');

        $this->getDir()->shouldReturn($this->homeDir);
    }
}
