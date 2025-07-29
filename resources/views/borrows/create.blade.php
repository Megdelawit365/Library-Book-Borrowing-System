<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Book') }}
        </h2>
    </x-slot>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div>
        <form action="{{route('borrows.store')}}" method="POST">
            @csrf
            @method('POST')
            <div>
                <label for="">Book</label>
                <select name="book_id" id="">
                    @foreach ($books as $book)
                        <option value="{{$book->id}}">{{$book->title}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Borrower (student id)</label>
                <select name="student_id" id="">
                    @foreach ($students as $student)
                        <option value="{{$student->id}}">{{$student->student_id}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Borrow book</button>
        </form>
    </div>
</x-app-layout>