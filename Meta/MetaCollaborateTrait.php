<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

trait MetaCollaborateTrait
{
    protected $collaborators;

    public function getAuthors()
    {
        return $this->collaborators;
    }

    public function addAuthor(Author $author)
    {
        $this->collaborators[] = $author;
    }
}
 