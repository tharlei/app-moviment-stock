<?php

namespace App\Web\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
  public function index(): View
  {
    return view('web::pages.home.index');
  }
}
