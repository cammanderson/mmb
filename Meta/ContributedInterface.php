<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

interface ContributedInterface
{
    public function getContributors();
    public function addContributor(Author $author);
}
