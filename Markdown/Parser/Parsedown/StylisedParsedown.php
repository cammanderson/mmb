<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Markdown\Parser\Parsedown;

use MMB\Highlighter\HighlightableInterface;
use MMB\Highlighter\HighlighterInterface;
use MMB\Markdown\MarkdownParserInterface;

class StylisedParsedown extends \Parsedown implements MarkdownParserInterface, HighlightableInterface
{
    protected $highlighter;

    public function setHighlighter(HighlighterInterface $highlighter)
    {
        $this->highlighter = $highlighter;
    }

    protected function completeFencedCode($Block)
    {
        // If we have set a highlighter
        if(empty($this->highlighter))

            return parent::completeFencedCode($Block);

        // Identify the code language
        $class = $Block['element']['text']['attributes']['class'];
        $language = !empty($class) ? preg_replace('/^language\-/i', '', $class) : null;
        if(empty($language)) return $Block;

        // Proceed with a highlighter
        $output = $this->highlighter->highlight($Block['element']['text']['text'], $language);
        $Block['element']['text']['text'] = $output;

        return $Block;
    }

    public function parse($markdown)
    {
        return $this->text($markdown);
    }
}
