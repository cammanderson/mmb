<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Markdown;

use MMB\AbstractParsedDocumentProvider;
use MMB\DocumentProviderInterface;

class MarkdownDocumentProvider extends AbstractParsedDocumentProvider implements DocumentProviderInterface
{
    public function provide($source)
    {
        return new MarkdownDocument($source, $this->parser);
    }
}
