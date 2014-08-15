<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

interface TimestampedInterface
{
    /**
     * @return \DateTime
     */
    public function getCreated();

    /**
     * @return \DateTime
     */
    public function getUpdated();

    /**
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created);

    /**
     * @param \DateTime $updated
     */
    public function setUpdated(\DateTime $updated);
}
