<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

use Silex\Application;
use Silex\ServiceProviderInterface;

class ArticleServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Application $app An Application instance
     */
    public function register(Application $app)
    {
        // TODO: configure e.g. file, db, cmf, github, markdown, parsedown, sundowner, pygment, geshi etc
        $app['markdown_parser_highlighter'] = $app->share(function($app) {
            return new \MMB\Highlighter\PygmentsShell($app['config']['pygment']);
        });
        $app['markdown_parser'] = $app->share(function ($app) {
            $parser = new \MMB\Markdown\Parsedown\StylisedParsedown();
            if(!empty($app['markdown_parser_highlighter']))
                $parser->setFencedCodeHighlighter($app['markdown_parser_highlighter']);
            return $parser;
        });
        $app['article_provider'] = $app->share(function ($app) {
            return new \MMB\Markdown\MarkdownArticleProvider($app['markdown_parser']);
        });
        $app['article_service'] = $app->share(function ($app) {
            return new FileArticleService($app['config']['path'], $app['article_provider']);
        });

    }

    /**
     */
    public function boot(Application $app)
    {

    }

}
 