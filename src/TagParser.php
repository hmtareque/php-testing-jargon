<?php
namespace App;

class TagParser {
    public function parse(String $tags) : array
    {
        return preg_split("/ ?[,|] ?/", $tags);
    }
}