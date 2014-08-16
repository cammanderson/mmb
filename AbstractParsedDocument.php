<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB;

abstract class AbstractParsedDocument extends AbstractDocument
{
    /**
     * @var ParserInterface
     */
    protected $parser;

    function __construct($content, ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    public function getParsedContent()
    {
        $this->parser->parse($this->getContent());
    }

    /**
     * @param \MMB\ParserInterface $parser
     */
    public function setParser($parser)
    {
        $this->parser = $parser;
    }

    /**
     * @return \MMB\ParserInterface
     */
    public function getParser()
    {
        return $this->parser;
    }


}
 