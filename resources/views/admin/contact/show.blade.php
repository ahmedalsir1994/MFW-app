@extends('admin.layout.dashboard')

@section('content')
<div class="p-6 w-full">
    <h1 class="text-2xl font-bold text-amber-800">Contact Details</h1>
    <p class="mt-4 text-gray-800 ">Details for contact: {{ $contact->name }}</p>
    <div class="mt-6 bg-gray-100 text-gray-800 shadow-md rounded-lg p-6">
        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Company:</strong> {{ $contact->company }}</p>
        <p><strong>Job Title:</strong> {{ $contact->job_title }}</p>
        <p><strong>Country:</strong> {{ $contact->country }}</p>
        <p><strong>Phone:</strong> {{ $contact->phone }}</p>
</div>
<div class="mt-6">
    <a href="{{ route('getAllContacts') }}">
        <button class="bg-gray-600 text-white py-1 px-3 rounded hover:bg-gray-700">Back to Contacts</button>
    </a>
    <a href="mailto:{{ $contact->email }}">
        <button class="bg-blue-600 text-white py-1 px-3 rounded hover:bg-blue-700">Send an Email</button>
    </a>
    <form action="{{ route('deleteContact', $contact->id) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded hover:bg-red-700">Delete</button>
    </form>

@endsection