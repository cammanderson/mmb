# Minimalist Markdown Blog

Focus on writing clean blog articles using simple markdown. Include beautiful colourful fenced code blocks that people
will love.

Minimalistic approach, based on silex. Chose where to store and retrieve your markdown, I'm using a separate git
repository. Articles are pushed here and mapped by the FileArticleService.

## Usage

For your application:

* Add to your composer
* Add to your Silex application
* Install [Pygments](http://pygments.org/download/)
* Specify the pygmentize bin
* Specify the path to the articles (default file provider)

### Composer

```yaml
{
    "require": {
        "cammanderson/mmb" : "dev-master"
    }
}
```


### Silex Service Provider and Route

You can add the article service and then use it in your application as needed.

```php
...
$app->register(new MMB\ArticleServiceProvider());
...
// Add the article route
$app->match('/article/{key}', function ($key) use ($app) {
    try {
        // TODO: Twig it up
        $doc = '<style type="text/css">' . $app['markdown_parser_highlighter']->getStyles() . '</style>';
        $doc .= $app['article_service']->getArticle($key)->getBody();
        return $doc;
    } catch(MMB\ArticleNotFoundException $e) {
        $app->abort(404, 'Not found');
    }
})->assert('key', '.+');
...
```

### Configuration

Currently needs a couple of elements:
| path    | Location of your markdown articles             |
| pygment | Location of your pygmentize syntax highlighter |

```yaml
path: ../content
pygment: /opt/local/bin/pygmentize-2.7
```

### Writing Articles

Using the FileArticleService, it will take a configuration _path_ to look for files. Articles are mapped by key, where
the key matches the filename.

    2014-08-10_my-article.md
    2014-08-12_my-other-article.md

### Hosting articles on github

It is easily possible to place the articles in your github repository and connect to it using [GithubService for mmd](https://github.com/cammanderson/mmb-github).

## Extending

### Alternative location for Articles

You can always implement your own ArticleService to source the articles from another location.

```php
class MyArticleService extends AbstractArticleService
{
    public function getArticle($key)
    {
        // TODO: Implement your own method to locate the article
        $articleContents = '...';

        // Create the article
        $article = $this->provider->provide($key, $articleContents);

        // ... Apply further properties your Service supports

        // Return
        return $article;
    }
}
```

Now register to the dependency injector (remember to provider the article provider).

```php
$app['article_service'] = $app->share(function ($app) {
    $service = new MyArticleService();
    $service->setProvider($app['article_provider']);
    return $service;
});
```

## TODO

Eventually to be moved to MCB (Minimalist Coders Blog) for more broader use. Developers can then implement their
own article providers (file, git, cmf etc), formating and highlighters (e.g. pygments, geshi etc).

- Add various traits to article to support dates, author, version, changelog etc
- Implement a GitArticleService/GitHubArticleService that interrogates git for author, versions, etc
- Implement a better configuration layout
- Implement ArticleService list commands, allowing listings of blog history
- Possible Symfony2 support via DI/Service container config
- Implement geshi/sundown/restructedtext etc.

