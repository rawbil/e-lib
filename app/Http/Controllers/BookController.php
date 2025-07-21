<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // No middleware in constructor for now, as roles are removed.
    // All methods are public for simplicity.

    public function index(Request $request)
    {
        // For now, just get all books with their author and category
        $books = Book::with(['author', 'category'])->paginate(10);
        $categories = Category::all(); // For filter dropdown
        return view('books.index', compact('books', 'categories'));
    }

    public function show(Book $book)
    {
        $book->load(['author', 'category']);
        return view('books.show', compact('book'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    // Placeholder methods for future logic
    public function store(Request $request) {
        return back()->with('info', 'Book creation logic will be implemented later.');
    }
    public function update(Request $request, Book $book) {
        return back()->with('info', 'Book update logic will be implemented later.');
    }
    public function destroy(Book $book) {
        return back()->with('info', 'Book deletion logic will be implemented later.');
    }
}
