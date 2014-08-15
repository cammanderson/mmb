<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Markdown\Parsedown;

use MMB\Highlighter\HighlightableInterface;
use MMB\Markdown\MarkdownParserInterface;

class StylisedParsedown extends \Parsedown implements MarkdownParserInterface, HighlightableInterface
{
    use FencedCodeHighlightableTrait;

    public function parse($markdown)
    {
        return $this->text($markdown);
    }
}
