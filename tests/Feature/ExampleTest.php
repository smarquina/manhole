<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example(): void {
        $response = $this->get(url('/api/manhole_cover/health-check'));

        $response->assertStatus(200);
    }
}
