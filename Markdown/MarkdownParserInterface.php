<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMB\Markdown;

use MMB\ParserInterface;

interface MarkdownParserInterface extends ParserInterface
{
    public function parse($markdown);
}
