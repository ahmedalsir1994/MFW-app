@extends('admin.layout.dashboard')

@section('content')
<div class="p-6 w-full">
    <h1 class="text-2xl font-bold text-amber-800">Contacts</h1>
    <p class="mt-4 text-gray-800 ">Welcome to the admin contacts page!</p>
</div>

@if ($contacts->isEmpty())
    <div class="p-6 w-full">
        <p class="mt-4 text-gray-800 ">No contacts found.</p>
    </div>
@else
    <div class="p-6 w-full overflow-x-auto text-gray-600">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-900">ID</th>
                    <th class="py-2 px-4 border-b border-gray-900">Name</th>
                    <th class="py-2 px-4 border-b border-gray-900">Email</th>
                    <th class="py-2 px-4 border-b border-gray-900">Company</th>
                    <th class="py-2 px-4 border-b border-gray-900">Job Title</th>
                    <th class="py-2 px-4 border-b border-gray-900">country</th>
                    <th class="py-2 px-4 border-b border-gray-900">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-900">{{ $contact->id }}</td>
                        <td class="py-2 px-4 border-b border-gray-900">{{ $contact->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-900">{{ $contact->email }}</td>
                        <td class="py-2 px-4 border-b border-gray-900">{{ $contact->company }}</td>
                        <td class="py-2 px-4 border-b border-gray-900">{{ $contact->job_title }}</td>
                        <td class="py-2 px-4 border-b border-gray-900">{{ $contact->country }}</td>
                        <td class="py-2 px-4 border-b border-gray-900">{{ $contact->phone }}</td>
                        <td class="py-2 px-4 border-b border-gray-900 flex justify-center align-center">
                            <a href="{{ route('getcontactById', $contact->id) }}">
                                <button class="bg-blue-600 text-white py-1 px-3 rounded hover:bg-blue-700 mr-2">View</button>
                            </a>
                            <form action="{{ route('deleteContact', $contact->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif


@endsection