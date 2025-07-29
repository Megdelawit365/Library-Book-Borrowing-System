<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::all();
        return view("borrows.index", compact("borrows"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::where("stock", '>', 0)->get();
        $students = Student::all();
        return view('borrows.create', compact('students', 'books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "student_id" => "required|string|exists:students,id",
            "book_id" => "required|string|exists:books,id",
        ]);
        $book = Book::findOrFail($request->book_id);
        $borrowedBook = Borrow::where('student_id', $request->student_id)
            ->where('book_id', $request->book_id)
            ->whereNull('returned_at')
            ->first();

        if ($borrowedBook) {
            return redirect()->route('borrows.index')->with('error', "Student has not returned this book.");
        }
        $book->stock -= 1;
        $book->save();
        Borrow::create([
            "student_id" => $request->student_id,
            "book_id" => $request->book_id,
            "returned_at" => null,
            "borrowed_at" => Carbon::now(),
        ]);

        return redirect()->route("borrows.index")->with("success", "");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $book = Book::findOrFail($borrow->book_id);
        $borrow->returned_at = Carbon::now();
        $book->stock += 1;
        $book->save();
        $borrow->save();
        return redirect()->route('borrows.index')->with('success', 'Book returned successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
