<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

use MMB\Meta\PublishedInterface;
use MMB\Meta\MetaPublishTrait;

abstract class Article implements PublishedInterface
{
    use MetaPublishTrait;

    protected $body;
    protected $key;

    public function getBody()
    {
        return $this->body;
    }

    public function getKey()
    {
        return $this->key;
    }
}
