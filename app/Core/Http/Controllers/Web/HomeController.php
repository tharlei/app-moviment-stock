<?php

namespace App\Core\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
  public function index(): View
  {
    return view('core::pages.home.index');
  }
}
