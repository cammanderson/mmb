<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Meta;

trait MetaVersionTrait
{
    protected $currentVersionId;

    /**
     * @param mixed $currentVersionId
     */
    public function setCurrentVersionId($currentVersionId)
    {
        $this->currentVersionId = $currentVersionId;
    }

    /**
     * @return mixed
     */
    public function getCurrentVersionId()
    {
        return $this->currentVersionId;
    }
}
