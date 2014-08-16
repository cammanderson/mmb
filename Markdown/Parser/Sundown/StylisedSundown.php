<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Markdown\Parser\Sundown;

use MMB\Highlighter\HighlighterInterface;
use MMB\Markdown\MarkdownParserInterface;
use MMB\Highlighter\HighlightableInterface;
use Sundown\Render\XHTML;

class StylisedSundown extends XHTML implements MarkdownParserInterface, HighlightableInterface
{
    /**
     * @var HighlighterInterface
     */
    protected $highlighter;

    public function setHighlighter(HighlighterInterface $highlighter)
    {
        $this->highlighter = $highlighter;
    }

    public function blockCode($code, $language)
    {
        // If we have set a highlighter
        if(empty($this->highlighter))

            return parent::completeFencedCode($code, $language);

        return $this->highlighter->highlight($code, $language);
    }

    public function parse($markdown)
    {
        return $this->render($markdown);
    }

}
