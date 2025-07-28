<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
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
    <a href="{{ route('book.create') }}"
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 m-8 mb-0 mt-4 inline-block">Add Book</a>

    <div class=" bg-white shadow-lg m-4 mr-8 ml-8">
        <table class="w-[100%] divide-gray-200">
            <thead class='bg-gray-200'>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 ">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Author</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Stock</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($books as $book)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 text-left text-sm text-gray-900">{{$book->title}} </td>
                        <td class="px-6 py-3 text-left text-sm text-gray-900">{{$book->author}} </td>
                        <td class="px-6 py-3 text-left text-sm text-gray-900">{{$book->category->name}} </td>
                        <td class="px-6 py-3 text-left text-sm text-gray-900">{{$book->stock}} </td>
                        <td class="px-6 py-3 text-left text-sm text-gray-900 flex">
                            <a href="{{route('book.edit', $book->id)}}"
                                class="text-indigo-600 hover:text-indigo-900 font-medium pr-4">Edit</a>
                            <form action="{{route('book.delete', $book->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button onclick="return confirm('Are you sure?')" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>