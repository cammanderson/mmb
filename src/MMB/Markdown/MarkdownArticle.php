<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Markdown;

use MMB\Article;

class MarkdownArticle extends Article
{
    protected $markdown;
    protected $parser;

    function __construct($key, $markdown, MarkdownParserInterface $parser)
    {
        $this->key = $key;
        $this->markdown = $markdown;
        $this->parser = $parser;
    }

    public function getBody()
    {
        return $this->parser->parse($this->markdown);
    }
}
 