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
        // get resource & content
        $resource = Resource::with('contents.type')->find(1);

        $data = [
            'resource' => $resource
        ];

        return view('contentWriter/contentWriter', $data);
    }

    public function save()
    {
        Content::create([

        ]);
    }
}
