<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Book') }}
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
        <form action="{{route('book.update', $book->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="">Title</label>
                <input value="{{$book->title}}" type="text" name="title" id="">
            </div>
            <div>
                <label for="">Author</label>
                <input value="{{$book->author}}" type="text" name="author" id="">
            </div>
            <div>
                <label for="">Category</label>
                <select name="category" id="">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" {{$book->category_id === $category->id ? "selected" : ""}}>
                            {{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Stock</label>
                <input value="{{$book->stock}}" type="number" name="stock" min=1 id="">
            </div>
            <button type="submit">Edit Book</button>
        </form>
    </div>
</x-app-layout>