<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

abstract class ArticleService
{

    public function getArticle($key)
    {
        return $this->provider->get($this->stripKey($key));
    }

    public function listArticles()
    {
          return array();
    }

    protected function stripKey($key)
    {
        return preg_replace('/[^a-z0-9\-\/]/i', '', $key);
    }
}
 