<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Tests\Filesystem;

use MMB\AbstractDocument;
use MMB\ArticleProviderInterface;
use MMB\DocumentProviderInterface;
use MMB\AbstractArticle;
use MMB\Filesystem\FilesystemArticleService;

class FilesystemArticleServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetList()
    {
        $articleServer = new FilesystemArticleService(getcwd() . '/Tests/Resources/content', new MockArticleProvider(), new MockDocumentProvider());
        $result = $articleServer->getArticles();
        $this->assertTrue(count($result) >= 4, 'Can not locate all the articles');
        $this->assertTrue(get_class(current($result)) == 'MMB\Tests\Filesystem\DummyArticle');
    }

    public function testGetArticle()
    {
        $articleServer = new FilesystemArticleService(getcwd() . '/Tests/Resources/content', new MockArticleProvider(), new MockDocumentProvider());
        $result = $articleServer->getArticle('2014_08_13/example-article.md');
        $this->assertTrue(get_class($result) == 'MMB\Tests\Filesystem\DummyArticle');
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
    public function provide($key, AbstractDocument $document)
    {
        return new DummyArticle($key, $document);
    }

}

class MockDocumentProvider implements DocumentProviderInterface
{
    public function provide($source)
    {
        return new DummyDocument($source);
    }

}

class DummyArticle extends AbstractArticle
{}

class DummyDocument extends AbstractDocument
{}
