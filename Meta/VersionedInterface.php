<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

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
