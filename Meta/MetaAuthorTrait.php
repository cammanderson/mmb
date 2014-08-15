<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

trait MetaAuthorTrait
{
    protected $authorUser;
    protected $authorName;
    protected $authorEmail;

    /**
     * @param mixed $authorUser
     */
    public function setAuthorUser($authorUser)
    {
        $this->authorUser = $authorUser;
    }

    /**
     * @return mixed
     */
    public function getAuthorUser()
    {
        return $this->authorUser;
    }

    /**
     * @param mixed $authorEmail
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
    }

    /**
     * @return mixed
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * @param mixed $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

}
