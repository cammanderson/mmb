<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

abstract class AbstractArticleService
{

    protected $match = '/(\d{2,4})[_\/\-]+(\d{2})[_\/\-]+(\d{2})[_\/\-]+(.+\.md)$/i';
    /**
     * @var ArticleProviderInterface
     */
    protected $articleProvider;

    /**
     * @var DocumentProviderInterface
     */
    protected $documentProvider;

    public function getArticle($key)
    {
        throw new ArticleNotFoundException();
    }

    public function getArticles()
    {
          return array();
    }

    /**
     * @param \MMB\ArticleProviderInterface $articleProvider
     */
    public function setArticleProvider($articleProvider)
    {
        $this->articleProvider = $articleProvider;
    }

    /**
     * @return \MMB\ArticleProviderInterface
     */
    public function getArticleProvider()
    {
        return $this->articleProvider;
    }

    /**
     * @param \MMB\DocumentProviderInterface $documentProvider
     */
    public function setDocumentProvider($documentProvider)
    {
        $this->documentProvider = $documentProvider;
    }

    /**
     * @return \MMB\DocumentProviderInterface
     */
    public function getDocumentProvider()
    {
        return $this->documentProvider;
    }

    protected function getDateFromKey($key)
    {
        preg_match('/([\d]{4}).?([\d]{2}).?([\d]{2})/', $key, $matches);

        return new \DateTime(implode(array_slice($matches, 1), '/'));
    }
}
