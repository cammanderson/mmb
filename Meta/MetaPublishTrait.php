<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

trait MetaPublishTrait
{
    protected $published;

    /**
     * @param \DateTime $published
     */
    public function setPublished(\DateTime $published)
    {
        $this->published = $published;
    }

    /**
     * @return \DateTime
     */
    public function getPublished()
    {
        return $this->published;
    }
}
