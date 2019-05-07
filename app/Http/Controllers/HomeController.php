<?php

namespace App\Http\Controllers;

use App\Publication;
use Illuminate\Http\Request;

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
        $publications = Publication::with([
            'likes' => function ($query) {
                $query->count();
            },
        ])->get();
        return $publications;
        // return view('home');
    }
}
