<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

class FencedCodePygmentsTest extends \PHPUnit_Framework_TestCase
{
    public function testStyliseParsedownWithPygments()
    {
        $parser = new \MMB\Markdown\Parsedown\StylisedParsedown();
        $parser->setFencedCodeHighlighter(new \MMB\Highlighter\PygmentsShell('/opt/local/bin/pygmentize-2.7'));
        $result = $parser->text(<<<EOF
Hello
```php
<?php print 'Hello World'; ?>
```
EOF
        );

        $this->assertNotEmpty($result);
    }

}
 