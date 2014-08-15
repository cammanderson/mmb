<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB;

interface TimestampedInterface
{
    /**
     * @return \DateTimeInterface
     */
    public function getCreated();

    /**
     * @return \DateTimeInterface
     */
    public function getUpdated();

    /**
     * @param \DateTimeInterface $created
     */
    public function setCreated(\DateTimeInterface $created);

    /**
     * @param \DateTimeInterface $updated
     */
    public function setUpdated(\DateTimeInterface $updated);
}
 