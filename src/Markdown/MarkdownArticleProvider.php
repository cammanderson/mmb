<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Markdown;

use MMB\ArticleProviderInterface;

class MarkdownArticleProvider implements ArticleProviderInterface
{
    protected $parser;

    public function __construct(MarkdownParserInterface $parser)
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
