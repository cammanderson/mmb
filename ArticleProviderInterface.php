<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

interface ArticleProviderInterface
{
    /**
     * @param $key
     * @return \MMB\Article
     */
    public function provide($key, AbstractDocument $document);
}
