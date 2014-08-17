<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

interface AuthoredInterface
{
    public function getAuthor();
    public function setAuthor(Author $author);
}
