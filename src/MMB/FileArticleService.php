<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

class FileArticleService extends ArticleService
{
    protected $path;
    protected $provider;

    function __construct($path, ArticleProviderInterface $provider)
    {
        $this->path = $path;
        $this->provider = $provider;
    }

    public function getArticle($key)
    {
        // This should load the file contents
        $basepath = getcwd() . '/' . $this->path;
        $resolved = realpath($basepath . '/' . $key);
        if(strpos($resolved, $basepath) == 0) { // TODO: Sanitize the path further
            if(is_readable($resolved)) {
                return $this->provider->provide($key, file_get_contents($resolved));
            }
        }

        // Otherwise we want to indicate
        throw new ArticleNotFoundException();
    }
}
 