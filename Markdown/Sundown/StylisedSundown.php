<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Markdown\Sundown;

use MMB\Markdown\MarkdownParserInterface;
use MMB\Highlighter\HighlightableInterface;
use Sundown\Render\XHTML;

class StylisedSundown extends XHTML implements MarkdownParserInterface, HighlightableInterface
{

    use FencedCodeHighlightableTrait;

    public function parse($markdown)
    {
        return $this->render($markdown);
    }

}
 