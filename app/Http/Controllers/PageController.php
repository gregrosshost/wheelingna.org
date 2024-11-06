<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
  /**
   * Display home page.
   */
  public function index()
  {
    return view('home', [
        'page' => null // No page variable
    ]);
  }



  /**
   * Display the specified page.
   */
  public function showPage($slug)
  {

  }



}
