<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    public function test_it_parses_a_single_tag()
    {
        // Arrange 
        $parser = new TagParser();

        // Act
        $result = $parser->parse("personal");
        $expected = ['personal'];

        // Assert 
        $this->assertSame($expected, $result);

    }

    public function test_it_parses_a_comma_separated_list_of_tags()
    {
        $parser = new TagParser();

        $result = $parser->parse("personal, family, money");
        $expected = ['personal', 'family', 'money'];

        $this->assertSame($expected, $result);
    }

    public function test_it_parses_a_comma_separated_list_of_tags_without_space()
    {
        $parser = new TagParser();

        $result = $parser->parse("personal,family,money");
        $expected = ['personal', 'family', 'money'];

        $this->assertSame($expected, $result);
    }

    public function test_it_parses_a_pipe_separated_list()
    {
        $parser = new TagParser();

        $result = $parser->parse("personal|family|money");
        $expected = ['personal', 'family', 'money'];

        $this->assertSame($expected, $result);
    }
}