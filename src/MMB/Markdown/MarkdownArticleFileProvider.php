<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Markdown;

use MMB\ArticleProviderInterface;

class MarkdownArticleFileProvider implements ArticleProviderInterface
{
    protected $parser;

    function __construct(MarkdownParserInterface $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @param $key
     * @param $path
     * @return \MMB\Article
     */
    public function provide($key, $body)
    {
        // Load the file body
        return new MarkdownArticle($key, $body, $this->parser);
    }


}