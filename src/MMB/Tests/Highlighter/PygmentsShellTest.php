<?php
/*
 * Author; Cameron Manderson <cameronmanderson@gmail.com>
 */

namespace MMV\Tests\Highlighter;

use MMB\Highlighter\PygmentsShell;

class PygmentsShellTest extends \PHPUnit_Framework_TestCase
{
    public function testHighlight()
    {
        $pygments = new PygmentsShell('/opt/local/bin/pygmentize-2.7');
        $result = $pygments->highlight('<?php print "Hello World"; ?>', 'php');
        $this->assertNotEmpty($result);
    }
}
 