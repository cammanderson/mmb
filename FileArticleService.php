<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

use Symfony\Component\Finder\Finder;

class FileArticleService extends AbstractArticleService
{
    protected $path;

    protected $match = '/(\d{2,4})[_\/\-]+(\d{2})[_\/\-]+(\d{2})[_\/\-]+(.+\.md)$/i';

    public function __construct($path, ArticleProviderInterface $provider)
    {
        $this->path = $path;
        $this->provider = $provider;
    }

    public function getArticle($key)
    {
        // This should load the file contents
        $basepath = getcwd() . '/' . $this->path;
        $resolved = realpath($basepath . '/' . $key);
        if (strpos($resolved, $basepath) == 0) { // TODO: Sanitize the path further
            if (is_readable($resolved)) {
                return $this->provider->provide($key, file_get_contents($resolved));
            }
        }

        // Otherwise we want to indicate
        throw new ArticleNotFoundException();
    }

    public function getList()
    {
        $finder = new Finder();
        $articles = array();
        foreach ($finder->in($this->path)->files()->name($this->match) as $file) {
            $articles[$file->getRelativePathname()] = $this->provider->provide($file->getRelativePathname(), $file->getContents());
        }
        // Sort by the naming in reverse
        krsort($articles);

        return $articles;
    }

    /**
     * @param mixed $match
     */
    public function setMatch($match)
    {
        $this->match = $match;
    }

    /**
     * @return mixed
     */
    public function getMatch()
    {
        return $this->match;
    }

}
