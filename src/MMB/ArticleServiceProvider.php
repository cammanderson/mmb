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

        // TODO: configure source e.g. file, markdown
        $app['markdown_formatter'] = $app->share(function () {
            return new \MMB\ParsedownWrapper(new \Parsedown()); // TODO: inject in..
        });
        $app['article_provider'] = $app->share(function ($app) {
            return new \MMB\MarkdownArticleFileProvider($app['markdown_formatter']);
        });
        $app['article_service'] = $app->share(function ($app) {
            return new \MMB\FileArticleService($app['config']['path'], $app['article_provider']);
        });

    }

    /**
     */
    public function boot(Application $app)
    {

    }

}
 