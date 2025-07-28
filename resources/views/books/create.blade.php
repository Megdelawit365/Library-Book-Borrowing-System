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
        <form action="{{route('book.store')}}" method="POST">
            @csrf
            @method('POST')
            <div>
                <label for="">Title</label>
                <input type="text" name="title" id="">
            </div>
            <div>
                <label for="">Author</label>
                <input type="text" name="author" id="">
            </div>
            <div>
                <label for="">Category</label>
                <select name="category_id" id="">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Stock</label>
                <input type="number" name="stock" min=1 id="">
            </div>
            <button type="submit">Add Book</button>
        </form>
    </div>
</x-app-layout>