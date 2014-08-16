<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

use MMB\Filesystem\FilesystemArticleService;
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
        $app['markdown_parser_highlighter'] = $app->share(function ($app) {
            return new \MMB\Highlighter\PygmentsShell($app['config']['parameters']['pygments_bin']);
        });
        $app['markdown_parser'] = $app->share(function ($app) {
            $parser = new \MMB\Markdown\Parser\Parsedown\StylisedParsedown();
            if(!empty($app['markdown_parser_highlighter']))
                $parser->setHighlighter($app['markdown_parser_highlighter']);

            return $parser;
        });
        $app['article_provider'] = $app->share(function () {
            return new \MMB\Filesystem\FilesystemArticleProvider();
        });
        $app['document_provider'] = $app->share(function ($app) {
            $documentProvider = new \MMB\Markdown\MarkdownDocumentProvider();
            $documentProvider->setParser($app['markdown_parser']);

            return $documentProvider;
        });
        $app['article_service'] = $app->share(function ($app) {
            return new FilesystemArticleService($app['config']['parameters']['mmb_file_path'], $app['article_provider'], $app['document_provider']);
        });

    }

    /**
     */
    public function boot(Application $app)
    {

    }

}
