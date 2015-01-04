<?php

namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    /**
     * @dataProvider tagsProvider
     */
    public function test_it_parses_tags($input, $expected)
    {
        // Arrange
        $parser = new TagParser();

        // Act
        $result = $parser->parse($input);

        // Assert
        $this->assertSame($expected, $result);
    }

    public function tagsProvider()
    {
        return [
            ['personal', ['personal']],
            ['personal,money,family', ['personal', 'money', 'family']],
            ['personal | money | family', ['personal', 'money', 'family']],

        ];
    }

    // public function test_it_parses_a_single_tag()
    // {
        
    //     // Act
    //     $result = $this->parser->parse("personal");
    //     $expected = ['personal'];

    //     // Assert
    //     $this->assertSame($expected, $result);
    // }

    // public function test_it_parses_a_comma_separated_list_of_tags()
    // {
    //     $result = $this->parser->parse("personal, family, money");
    //     $expected = ['personal', 'family', 'money'];

    //     $this->assertSame($expected, $result);
    // }

    // public function test_it_parses_a_comma_separated_list_of_tags_without_space()
    // {
    //     $result = $this->parser->parse("personal,family,money");
    //     $expected = ['personal', 'family', 'money'];

    //     $this->assertSame($expected, $result);
    // }

    // public function test_it_parses_a_pipe_separated_list()
    // {
    //     $result = $this->parser->parse("personal|family|money");
    //     $expected = ['personal', 'family', 'money'];

    //     $this->assertSame($expected, $result);
    // }
}
