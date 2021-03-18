<?php

namespace Tests\Feature\View\Blade;

class BladeShowTest extends AbstractBladeTestCase
{
    public function testShowsAreCompiled()
    {
        $this->assertSame('<?php echo $__env->yieldSection(); ?>', $this->compiler->compileString('@show'));
    }
}
