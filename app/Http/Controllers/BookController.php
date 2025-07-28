<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view("books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("books.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "string|required",
            "author" => "string|required",
            "category_id" => "integer|exists:categories,id",
            "stock" => "integer|required|min:1"
        ]);
        Book::create($request->all());
        return redirect()->route("book.index")->with("success", "Book created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view("books.show", compact("book"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $book = Book::findOrFail($id);
        return view("books.edit", compact("categories", "book"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" => "string|required",
            "author" => "string|required",
            "category_id" => "integer|exists:categories,id",
            "stock" => "integer|required|min:1"
        ]);
        Book::findOrFail($id)->update($request->all());
        return redirect()->route("book.index")->with("success", "Book editted successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Book::findOrFail($id)->delete();
        return redirect()->route("book.index")->with("success", "Book deletted successfully");
    }
}
