<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Tests\Markdown\Parsedown;

use MMB\Highlighter\HighlighterInterface;
use MMB\Markdown\Parsedown\StylisedParsedown;

class StyledParsedownTest extends \PHPUnit_Framework_TestCase
{
    public function testParsedown()
    {
        $parsedown = new StylisedParsedown();
        $result = $parsedown->text('Hello _Parsedown_!');
        $this->assertNotEmpty($result);
    }

    public function testParsedownTrait()
    {
        $highlighter = new MockHighlighter();
        $parsedown = new StylisedParsedown();
        $parsedown->setFencedCodeHighlighter($highlighter);
        $parsedown->text(<<<EOF
```php
<?php print "Hello World"; ?>
```
EOF
        );
        $this->assertTrue($highlighter->wasCalled(), 'Did not call the highlighter for a code block');
        $this->assertTrue($highlighter->getBlock() == '<?php print "Hello World"; ?>');
    }
}

class MockHighlighter implements HighlighterInterface
{
    private $called = false;
    private $block;

    public function highlight($block, $language)
    {
        $this->called = true;
        $this->block = $block;
        return $block;
    }

    public function wasCalled()
    {
        return $this->called;
    }
    public function getBlock()
    {
        return $this->block;
    }
    public function getStyles()
    {
        return;
    }

}
 