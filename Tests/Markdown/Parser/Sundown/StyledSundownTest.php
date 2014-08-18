<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */
namespace MMB\Tests\Markdown\Parser\Sundown;

use MMB\Highlighter\HighlighterInterface;
use MMB\Markdown\Parser\Sundown\StylisedSundown;

class StyledSundownTest extends \PHPUnit_Framework_TestCase
{
    public function testSundown()
    {
        $sundown = new StylisedSundown();
        $result = $sundown->parse('Hello _Sundown_!');
        $this->assertNotEmpty($result);
    }

    public function testSundownTrait()
    {
        $highlighter = new MockHighlighter();
        $sundown = new StylisedSundown();
        $sundown->setHighlighter($highlighter);
        $sundown->parse(<<<EOF
```php
<?php print "Hello World"; ?>
```
EOF
        );
        $this->assertTrue($highlighter->wasCalled(), 'Did not call the highlighter for a code block');
        $this->assertTrue(strpos($highlighter->getBlock(), '<?php print "Hello World"; ?>') > -1);
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
