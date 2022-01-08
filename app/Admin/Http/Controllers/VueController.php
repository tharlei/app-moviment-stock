<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class VueController extends Controller
{
  public function index(): View
  {
    return view('admin::app');
  }
}
