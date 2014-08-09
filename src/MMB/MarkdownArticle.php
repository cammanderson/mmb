<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

class MarkdownArticle extends Article
{
    protected $markdown;
    protected $formatter;

    function __construct($key, $markdown, MarkdownFormatterInterface $formatter)
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
 