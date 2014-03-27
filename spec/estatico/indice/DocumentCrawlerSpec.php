<?php

namespace spec\estatico\indice;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DocumentCrawlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('estatico\indice\DocumentCrawler');
    }
}
