<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = [
            ['id' => 1, 'user_id' => 'mostafa', 'name' => 'home', 'type' => 'expense'],
            ['id' => 2, 'user_id' => 'hassan', 'name' => 'work', 'type' => 'income']
        ];
        
        return view('categories.index', [
            'categories' => $categories
        ]);
    }
}
