<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Tests;

use MMB\ArticleProviderInterface;
use MMB\ArticleServiceProvider;
use MMB\FileArticleService;
use MMB\Markdown\MarkdownArticleProvider;
use MMB\Markdown\Parsedown\StylisedParsedown;

class FileArticleServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGetList()
    {
        $articleServer = new FileArticleService(__DIR__ . '/Resources/content', new MockMarkdownArticleProvider());
        $result = $articleServer->getList();
        $this->assertEquals(count($result), 2);
        $this->assertTrue(get_class(current($result)) == 'MMB\Markdown\Parsedown\StylisedParsedown');
    }
}

class MockMarkdownArticleProvider implements ArticleProviderInterface
{
    /**
     * @param $key
     * @param $path
     * @return \MMB\Article
     */
    public function provide($key, $content)
    {
        return new StylisedParsedown($key, $content);
    }

}