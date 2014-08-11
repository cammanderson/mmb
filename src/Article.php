<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB;

abstract class Article
{
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
