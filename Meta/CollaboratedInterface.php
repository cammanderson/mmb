<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

interface CollaboratedInterface
{
    public function getAuthors();
    public function addAuthor(Author $author);
}
 