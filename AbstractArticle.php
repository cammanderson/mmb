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

    public function __construct($key, AbstractDocument $document)
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

    public function getDocumentContent() {
        return $this->document->getContent();
    }
}
