<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase {

    protected const REQUEST_HEADERS = [
        "Accept" => "application/json",
    ];

    use CreatesApplication;
}
