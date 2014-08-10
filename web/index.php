<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

$loader = require_once __DIR__.'/../app/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

// Allow config
$app->register(new DerAlex\Silex\YamlConfigServiceProvider(__DIR__ . '/../app/config/config.yml'));

// Article
$app->register(new MMB\ArticleServiceProvider());
$app->match('/article/{key}', function ($key) use ($app) {
    try {
        // TODO: Twig
        $doc = '<style type="text/css">' . $app['markdown_parser_highlighter']->getStyles() . '</style>';
        $doc .= $app['article_service']->getArticle($key)->getBody();
        return $doc;
    } catch(MMB\ArticleNotFoundException $e) {
        $app->abort(404, 'Not found');
    }
})->assert('key', '.+');;

$app->run();