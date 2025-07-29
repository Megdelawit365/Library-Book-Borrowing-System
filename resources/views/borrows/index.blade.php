<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Book Borrows') }}
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
    <a href="{{ route('borrows.create') }}"
        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 m-8 mb-0 mt-4 inline-block">Add borrow</a>

    <div class=" bg-white shadow-lg m-4 mr-8 ml-8">
        <table class="w-[100%] divide-gray-200">
            <thead class='bg-gray-200'>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 ">Borrow Id</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Book Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Student Name</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Borrow date</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($borrows as $borrow)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-3 text-left text-sm text-gray-900">{{$borrow->id}} </td>
                        <td class="px-6 py-3 text-left text-sm text-gray-900">{{$borrow->book->title}} </td>
                        <td class="px-6 py-3 text-left text-sm text-gray-900">{{$borrow->student->name}} </td>
                        <td class="px-6 py-3 text-left text-sm text-gray-900">{{$borrow->borrowed_at}} </td>
                        <td class="px-6 py-3 text-left text-sm text-gray-900">
                            @if ($borrow->returned_at === null)
                                Not returned
                            @else
                                Returned
                            @endif
                        </td>

                        <td class="px-6 py-3 text-left text-sm text-gray-900 flex">
                            <a" class="text-indigo-600 hover:text-indigo-900 font-medium pr-4">Edit</a>
                                <form action="" method="POST">
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