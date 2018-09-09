<?php

namespace Nikaia\Rating\Tests;

use Nikaia\Rating\Http\Controllers\ToolController;
use Nikaia\Rating\Rating;
use Symfony\Component\HttpFoundation\Response;

class ToolControllerTest extends TestCase
{
    /** @test */
    public function it_can_can_return_a_response()
    {
        $this
            ->get('nova-vendor/nikaia/nova-rating-field/endpoint')
            ->assertSuccessful();
    }
}
