<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
  /**
   * Display the specified page.
   */
  public function showPage($slug)
  {
    $page = Page::where('slug', $slug)->firstOrFail();

    return view('pages.show', [
        'page' => $page
    ]);
  }



}
