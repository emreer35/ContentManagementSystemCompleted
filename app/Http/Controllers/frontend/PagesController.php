<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home');
    }
    public function pageShow($slug)
    {
        $menuItem = MenuItem::where('slug', $slug)->firstorFail();

        $page = Page::findOrFail($menuItem->id);

        return view('frontend.pages.page', compact('page'));
    }
}
