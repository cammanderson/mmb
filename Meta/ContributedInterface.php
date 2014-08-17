<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

interface ContributedInterface
{
    public function getAuthors();
    public function addAuthor(Author $author);
}
 