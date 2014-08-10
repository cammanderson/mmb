<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Markdown\Parsedown;

class ParsedownWrapper implements MarkdownParserInterface
{
    private $parser;

    function __construct(\Parsedown $parser)
    {
        $this->parser = $parser;
    }

    public function parse($source)
    {
        return $this->parser->text($source);
    }
}
 