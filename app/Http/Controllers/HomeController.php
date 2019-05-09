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
        $this->middleware('auth');
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

        /*
        return [
            'skip' => $skip,
            "limit" => $limit,
            "publications" => $publications,
            'classifications' => $classifications,
            'categories' => $categories,
        ];
        */
        return view('home', [
            'publications' => $publications,
        ]);
    }
}
