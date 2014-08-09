<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB;

abstract class ArticleService
{

    public function getArticle($key)
    {
        return $this->provider->get($key);
    }

    public function listArticles()
    {
          return array();
    }
}
 