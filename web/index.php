<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
ini_set('display_errors', true);

$loader = require_once __DIR__.'/../vendor/autoload.php';
$loader->add('MMB', __DIR__.'/../src');

$app = new Silex\Application();
$app['debug'] = true;


$app->register(new DerAlex\Silex\YamlConfigServiceProvider(__DIR__ . '/../app/config/config.yml'));
$app->register(new MMB\ArticleServiceProvider());

// article/key
$app->get('/article/{key}', function ($key) use ($app) {
    return $app['article_service']->getArticle($key)->getBody();
});

$app->run();