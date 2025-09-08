<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ArticleRequest;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::get();
        return view('pages.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('pages.articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $data = $request->except('image_article');

        if ($request->hasFile('image_article')) {
            $data['image_article'] = $this->storeFile($request, 'article', 'image_article');
        }

        Article::create($data);
        return redirect()->route('articles.index')->with('success', 'تم اضافة المقال بنجاح');
    }

    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('pages.articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, string $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->except('image_article');

        if ($request->hasFile('image_article')) {
            $this->deleteFile($article->image_article, 'article');
            $data['image_article'] = $this->storeFile($request, 'article', 'image_article');
        }

        $article->update($data);
        return redirect()->route('articles.index')->with('success', 'تم تحديث المقال بنجاح');
    }

    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $this->deleteFile($article->image_article, 'article');
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'تم حذف المقال بنجاح');
    }

     private function deleteFile($path, $disk)
    {
        if ($path && Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }
    }

    private function storeFile($request, $disk, $file)
    {
        if ($request->hasFile($file)) {
            $filename = Str::uuid() . '.' . $request->file($file)->getClientOriginalExtension();

            $path = $request->file($file)->storeAs('', $filename, $disk);
            return $path;
        }
    }
}
