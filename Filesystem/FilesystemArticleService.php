<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Filesystem;

use MMB\AbstractArticleService;
use MMB\ArticleNotFoundException;
use MMB\ArticleProviderInterface;
use MMB\DocumentProviderInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use MMB\Meta\PublishedInterface;

class FilesystemArticleService extends AbstractArticleService
{
    protected $path;

    public function __construct($path, ArticleProviderInterface $articleProvider, DocumentProviderInterface $documentProvider)
    {
        $this->path = $path;
        $this->articleProvider = $articleProvider;
        $this->documentProvider = $documentProvider;
    }

    public function getArticle($key)
    {
        // This should load the file contents
        $basepath = $this->path;
        $resolved = realpath($basepath . '/' . $key);
        if (strpos($resolved, $basepath) == 0) { // TODO: Sanitize the path further
            if (is_readable($resolved)) {

                // Structure our article
                $document = $this->documentProvider->provide(file_get_contents($resolved));
                $article = $this->articleProvider->provide($key, $document);

                if($article instanceof PublishedInterface)
                    $article->setPublished($this->getDateFromKey($key));

                return $article;
            }
        }

        // Otherwise we want to indicate
        throw new ArticleNotFoundException();
    }

    public function getArticles()
    {
        $finder = new Finder();
        $articles = array();
        $filter = function (SplFileInfo $file) {
            // Filter if the file matches our path reference
            return (preg_match($this->match, $file->getRelativePathname()));
        };

        foreach ($finder->in($this->path)->files()->filter($filter) as $file) {

            $document = $this->documentProvider->provide($file->getContents());
            $articles[$file->getRelativePathname()] = $this->articleProvider->provide($file->getRelativePathname(), $document);
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
