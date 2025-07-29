<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Register a new student') }}
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
        <form action="{{route('student.store')}}" method="POST">
            @csrf
            @method('POST')
            <div>
                <label for="">Student Name</label>
                <input type="text" name="name" id="">
            </div>
            <div>
                <label for="">Student Id</label>
                <input type="text" name="student_id" id="">
            </div>
            <div>
                <label for="">Student email</label>
                <input type="email" name="email" id="">
            </div>
            <div>
                <label for="">Temporary password</label>
                <input type="text" name="password" id="">
            </div>
            <button type="submit">Add Student</button>
        </form>
    </div>
</x-app-layout>