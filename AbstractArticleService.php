<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

abstract class AbstractArticleService
{

    protected $provider;

    public function getArticle($key)
    {
        return $this->provider->get($this->stripKey($key));
    }

    public function listArticles()
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

}
