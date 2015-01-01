<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    public function it_parses_a_comma_separated_list_of_tags()
    {
        $parser = new TagParser;

        $result = $parser->parse("personal, family, money");
        $expected = ['personal', 'family', 'money'];

        $this->assertSame($expected, $result);

    }
}