<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Markdown;

class MarkdownArticle extends Article
{
    protected $markdown;
    protected $parser;

    function __construct($key, $markdown, MarkdownParserInterface $parser)
    {
        $this->key = $key;
        $this->markdown = $markdown;
        $this->formatter = $formatter;
    }

    public function getBody()
    {
        return $this->formatter->format($this->markdown);
    }
}
 