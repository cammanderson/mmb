<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

use MMB\Meta\PublishedInterface;
use MMB\Meta\MetaPublishTrait;

abstract class AbstractArticle implements PublishedInterface
{
    use MetaPublishTrait;

    protected $document;
    protected $key;

    function __construct($key, AbstractDocument $document)
    {
        $this->key = $key;
        $this->document = $document;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function getKey()
    {
        return $this->key;
    }
}
