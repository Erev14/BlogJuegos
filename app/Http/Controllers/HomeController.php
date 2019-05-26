<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;
use App\Classification;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $publications = Publication::withCount([
            'likes'
        ])
            ->paginate(9);
        $classifications = Classification::all();
        $categories = Category::all();

        return view('home', [
            'publications' => $publications,
            'classifications' => $classifications,
            'categories' => $categories
        ]);
    }

    /**
     * show the application welcome page
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $publications = Publication::withCount([
            'likes'
        ])
            ->paginate(9);
        $classifications = Classification::all();
        $categories = Category::all();

        return view('welcome', [
            'publications' => $publications,
            'classifications' => $classifications,
            'categories' => $categories
        ]);
    }
}
