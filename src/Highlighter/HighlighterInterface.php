<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Highlighter;

interface HighlighterInterface
{
    public function highlight($block, $language);
    public function getStyles();
}
