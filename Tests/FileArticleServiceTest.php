<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Tests;

use MMB\ArticleProviderInterface;
use MMB\FileArticleService;
use MMB\Article;

class FileArticleServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetList()
    {
        $articleServer = new FileArticleService(__DIR__ . '/Resources/content', new MockArticleProvider());
        $result = $articleServer->getArticles();
        $this->assertTrue(count($result) >= 4, 'Can not locate all the articles');
        $this->assertTrue(get_class(current($result)) == 'MMB\Tests\DummyArticle');
    }

    public function testGetArticle()
    {
        $articleServer = new FileArticleService(__DIR__ . '/Resources/content', new MockArticleProvider());
        $result = $articleServer->getArticle('2014_08_13/example-article.md');
        $this->assertTrue(get_class($result) == 'MMB\Tests\DummyArticle');
        $this->assertTrue(date('Y-m-d', $result->getPublished()->getTimestamp()) == date('Y-m-d', strtotime('2014-08-13')));
    }
}

class MockArticleProvider implements ArticleProviderInterface
{
    /**
     * @param $key
     * @param $path
     * @return \MMB\Article
     */
    public function provide($key, $content)
    {
        return new DummyArticle($key, $content);
    }
}

class DummyArticle extends Article
{
    public function __construct($key, $content)
    {
        $this->key = $key;
        $this->content = $content;
    }
}
