<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB;

interface VersionedInterface
{
    /**
     * @return String
     */
    public function getCurrentVersionId();

    /**
     * @param $versionId Version representation
     * @return mixed
     */
    public function setCurrentVersionId($versionId);
}
 