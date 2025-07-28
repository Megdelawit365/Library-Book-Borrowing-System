<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Category') }}
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
        <form action="{{route('category.store')}}" method="POST">
            @csrf
            @method('POST')

            <div>
                <label for="">Category Name</label>
                <input type="text" name="name" id="">
            </div>
            <button type="submit">Add Category</button>
        </form>
    </div>
</x-app-layout>