<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Markdown\Parsedown;

use MMB\Markdown\MarkdownParserInterface;

class StylisedParsedown extends \Parsedown implements MarkdownParserInterface
{
    use FencedCodeHighlightable;

    public function parse($markdown)
    {
        return $this->text($markdown);
    }
}
