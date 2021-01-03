<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;

class TagController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::all());
    }

    public function store() {
        $data = request()->validate([
            'name' => 'required',
            'description' => '',
            'color' => ''
        ]);

        $tag = Tag::create($data);
        $tag->save();

        return $tag;
    }
}
