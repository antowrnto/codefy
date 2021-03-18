<?php

namespace Tests\Feature\View\Blade;

class BladeUnsetStatementsTest extends AbstractBladeTestCase
{
    public function testUnsetStatementsAreCompiled()
    {
        $string = '@unset ($unset)';
        $expected = '<?php unset($unset); ?>';
        $this->assertEquals($expected, $this->compiler->compileString($string));
    }
}
