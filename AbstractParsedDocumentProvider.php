<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB;

class AbstractParsedDocumentProvider
{
    protected $parser;

    /**
     * @param mixed $parser
     */
    public function setParser($parser)
    {
        $this->parser = $parser;
    }

    /**
     * @return mixed
     */
    public function getParser()
    {
        return $this->parser;
    }


}
 