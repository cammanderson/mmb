<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Markdown\Sundown;

use MMB\Highlighter\HighlighterInterface;

trait FencedCodeHighlightableTrait
{
    /**
     * @var HighlighterInterface
     */
    protected $highlighter;

    public function setFencedCodeHighlighter(HighlighterInterface $highlighter)
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
}
 