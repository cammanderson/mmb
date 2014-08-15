<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

interface PublishedInterface
{
    /**
     * @return \DateTime
     */
    public function getPublished();

    /**
     * @param \DateTime $published
     */
    public function setPublished(\DateTime $published);
}
