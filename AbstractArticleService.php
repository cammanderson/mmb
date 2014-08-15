<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

abstract class AbstractArticleService
{

    protected $match = '/(\d{2,4})[_\/\-]+(\d{2})[_\/\-]+(\d{2})[_\/\-]+(.+\.md)$/i';
    protected $provider;

    public function getArticle($key)
    {
        return $this->provider->get($key);
    }

    public function getArticles()
    {
          return array();
    }

    /**
     * @param ArticleProviderInterface $provider
     */
    public function setProvider(ArticleProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return mixed
     */
    public function getProvider()
    {
        return $this->provider;
    }

    protected function getDateFromKey($key)
    {
        preg_match('/([\d]{4}).?([\d]{2}).?([\d]{2})/', $key, $matches);

        return new \DateTime(implode(array_slice($matches, 1), '/'));
    }
}
