<div class="sidebar bg-gray-900 text-white h-screen absolute left-0 top-0 w-64 p-6">
    <img src="/img/logo.png" alt="Logo" class="mb-10 w-30">
    <nav>
        <ul>
            <li class="mb-4">
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">Dashboard</a>
            </li>
            <li class="mb-4">
                <a href="{{ route('getAllContacts') }}" class="block py-2 px-4 rounded hover:bg-gray-700 {{ request()->routeIs('getAllContacts') ? 'bg-gray-700' : '' }}">Contacts</a>
            </li>
            <li class="mb-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-600 w-full text-left block py-2 px-4 rounded hover:bg-red-700">Logout</button>
                </form>
            </li>
            <!-- Add more navigation items as needed -->
        </ul>
    </nav>
</div>
