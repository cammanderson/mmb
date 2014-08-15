<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB;

interface AuthoredInterface
{
    public function getAuthorUser();
    public function getAuthorEmail();
    public function getAuthorName();

    public function setAuthorUser($user);
    public function setAuthorEmail($email);
    public function setAuthorName($name);
}
 