<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB;

class FileArticleService extends ArticleService {
    protected $path;
    protected $provider;

    function __construct($path, MarkdownArticleFileProvider $provider)
    {
        $this->path = $path;
        $this->provider = $provider;
    }

    public function getArticle($key)
    {
        // This should load the file contents
        $body = $this->path . '/' . $key;
        return $this->provider->provide($key, $body);
    }
}
 