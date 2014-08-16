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
    protected $parsedContent;

    public function __construct($content, ParserInterface $parser)
    {
        $this->content = $content;
        $this->parser = $parser;
    }

    public function getContent()
    {
        if(empty($this->parsedContent)) {
            $this->parsedContent = $this->parser->parse($this->content);
        }
        return $this->parsedContent;
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