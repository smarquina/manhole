<?php

namespace Manhole\Http\Controllers;

use Shared\Http\Controllers\Controller;

class ManholeController extends Controller {

    public function hi() {
        return response("Welcome to manhole API");
    }
}
