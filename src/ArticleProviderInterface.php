<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

interface ArticleProviderInterface
{
    /**
     * @param $key
     * @param $path
     * @return \MMB\Article
     */
    public function provide($key, $path);
}
