<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function store() {
        $data = request()->validate([
            'display_name' => '',
            'description' => '',
            'income' => '',
            'exclude_budget' => '',
            'exclude_totals' => ''
        ]);
        
        $category = Category::create($data);
        $category->save();

        return $category;
    }
}
