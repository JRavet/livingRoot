<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Author;
use App\Models\Resource;


class ContentWriter extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contentWriter/contentWriter');
    }

    public function save()
    {
        Content::create([

        ]);
    }
}
