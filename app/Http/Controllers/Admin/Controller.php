<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseAdminController;

class Controller extends BaseAdminController
{
    protected $viewPrefix = 'admins/';
}
