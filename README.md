# Minimalist Markdown Blog

My minimalist markdown blog. Done for a coding blog.

Currently silex based, markdown and pygment colourful coding, calls directly to markdown stored on the server.

Eventually to be moved to MCB (Minimalist Coders Blog) for more broader use. Developers can then implement their
own article providers (file, git, cmf etc), formating and highlighters (e.g. pygments, geshi etc).

## Silex Service Provider and Route

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

## Configuration

Currently needs a couple of elements:
| path | Location of your markdown articles |
| pygment | Location of your pygmentize syntax highlighter |

```yaml
path: ../content
pygment: /opt/local/bin/pygmentize-2.7
```
