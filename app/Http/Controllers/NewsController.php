<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        return News::all();
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $news = News::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return response()->json([
            'message' => 'News created successfully',
            'news' => $news,
        ]);
    }

    public function show($id) {
        return News::find($id);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $news = News::find($id);
        $news->title = $request->title;
        $news->description = $request->description;
        $news->save();

        return response()->json([
            'message' => 'News update successfully',
        ]);
    }

    public function destroy($id) {
        News::destroy($id);
        return response()->json([
            'message' => 'News deleted successfully',
        ]);
    }
}
