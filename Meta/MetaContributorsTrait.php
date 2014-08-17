<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

trait MetaContributedTrait
{
    protected $contributed;

    public function getAuthors()
    {
        return $this->contributed;
    }

    public function addAuthor(Author $author)
    {
        $this->contributed[] = $author;
    }
}
 