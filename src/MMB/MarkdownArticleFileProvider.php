<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

class MarkdownArticleFileProvider implements ArticleProviderInterface
{
    protected $formatter;

    function __construct($formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * @param $key
     * @param $path
     * @return \MMB\Article
     */
    public function provide($key, $body)
    {
        // Load the file body
        return new MarkdownArticle($key, $body, $this->formatter);
    }


}