<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Highlighter;

interface HighlightableInterface
{
    public function setFencedCodeHighlighter(HighlighterInterface $highlighter);
}
 