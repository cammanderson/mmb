<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

trait MetaContributorsTrait
{
    protected $contributed;

    public function getContributors()
    {
        return $this->contributed;
    }

    public function addContributor(Author $author)
    {
        $this->contributed[] = $author;
    }
}
