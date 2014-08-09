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
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Application $app An Application instance
     */
    public function register(Application $app)
    {
        // By configuration

        // e.g. file, markdown



        $app['markdown_formatter'] = $app->share(function () {
            return new \MMB\MarkdownFormatter();
        });
        $app['article_provider'] = $app->share(function ($app) {
            return new \MMB\MarkdownArticleFileProvider($app['markdown_formatter']);
        });
        $app['article_service'] = $app->share(function ($app) {
            return new \MMB\FileArticleService($app['config']['path'], $app['article_provider']);
        });

    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {

    }

}
 