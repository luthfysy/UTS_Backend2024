<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        if ($news) {
            $data = [
                'message' => 'Get all news',
                'data' => $news
            ];
        } else {
            $data = [
                'message' => 'No news found'
            ];
        }

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json([
            'message' => 'News created successfully',
            'data' => $news,
        ]);
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return response()->json([
            'message' => 'News updated successfully',
            'data' => $news,
        ]);
    }

    public function destroy(News $news)
    {
        $news->delete();

        return response()->json([
            'message' => 'News deleted successfully',
        ]);
    }

    public function show($news)
    {
        $news = News::find($news);

        if ($news) {
            $data = [
                'message' => 'Get news details',
                'data' => $news
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'News not found'
            ];

            return response()->json($data, 404);
        }
    }
}