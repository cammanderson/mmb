<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Filesystem;

use MMB\AbstractDocument;
use MMB\ArticleProviderInterface;

class FilesystemArticleProvider implements ArticleProviderInterface
{
    /**
     * @param $key
     * @param $document
     * @return \MMB\Article
     */
    public function provide($key, AbstractDocument $document)
    {
        return new FilesystemArticle($key, $document);
    }

}
