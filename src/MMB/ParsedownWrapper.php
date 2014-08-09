<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

class ParsedownWrapper implements MarkdownFormatterInterface
{
    private $parser;

    function __construct(\Parsedown $parser)
    {
        $this->parser = $parser;
    }

    public function format($source)
    {
        return $this->parser->text($source);
    }
}
 