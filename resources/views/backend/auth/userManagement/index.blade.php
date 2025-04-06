@extends('backend.layout.app')
@section('title')
    Users
@endsection

@section('content')
    <div class="container">
        <!-- Page Header -->
        <div class="mb-6">
            <p class="text-sm text-gray-500 mt-1">Sistem kullanıcılarını yönetme ve organize etme</p>
        </div>

        <!-- Search and Filter Bar -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 mb-6">
            <form action="{{ route('user.index') }}" method="get">
                <div class="flex flex-col lg:flex-row gap-4 justify-between">
                    <!-- Search Box -->
                    <div class="w-full lg:w-1/2">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search" name="search" value="{{ old('search', $search) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-20 p-2.5"
                                placeholder="Search for users...">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <a href="{{ route('user.index') }}"
                                    class="text-sm text-blue-600 hover:text-blue-800 hover:underline">
                                    Reset
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="flex flex-col sm:flex-row gap-3 items-center justify-end w-full lg:w-1/2">
                        <button type="submit"
                            class="px-4 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none transition-colors w-full sm:w-auto">
                            Apply Filters
                        </button>

                        <div class="flex items-center">
                            <label for="per_page" class="mr-2 text-sm font-medium text-gray-700">Show:</label>
                            <select name="per_page" id="per_page" onchange="this.form.submit()"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                                <option value="10" {{ $per_page == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ $per_page == 20 ? 'selected' : '' }}>20</option>
                                <option value="50" {{ $per_page == 50 ? 'selected' : '' }}>50</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>



        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>


                        <th scope="col" class="px-3 py-3">
                            <a href="{{ route('user.index', array_merge(request()->all(), ['sort_by' => 'id', 'sort_direction' => $sort_direction === 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center hover:text-blue-600 transition-colors">
                                <span>
                                    ID
                                </span>
                                @if ($sort_by == 'id')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        @if ($sort_direction == 'asc')
                                            <path fill-rule="evenodd"
                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                clip-rule="evenodd" />
                                        @else
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        @endif
                                    </svg>
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="px-3 py-3 ">
                            <a href="" class="flex justify-center">
                                Thumbnail
                            </a>
                        </th>
                        <th scope="col" class="px-3 py-3">
                            <a href="{{ route('user.index', array_merge(request()->all(), ['sort_by' => 'first_name', 'sort_direction' => $sort_direction === 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center hover:text-blue-600 transition-colors">

                                <span>
                                    Full Name
                                </span>
                                @if ($sort_by == 'first_name')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        @if ($sort_direction == 'asc')
                                            <path fill-rule="evenodd"
                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                clip-rule="evenodd" />
                                        @else
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        @endif
                                    </svg>
                                @endif

                            </a>
                        </th>
                        <th scope="col" class="px-3 py-3">
                            <a
                                href="{{ route('user.index', array_merge(request()->all(), ['sort_by' => 'email', 'sort_direction' => $sort_direction === 'asc' ? 'desc' : 'asc'])) }}"class="flex items-center hover:text-blue-600 transition-colors">
                                <span>
                                    Email
                                </span>
                                @if ($sort_by == 'email')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        @if ($sort_direction == 'asc')
                                            <path fill-rule="evenodd"
                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                clip-rule="evenodd" />
                                        @else
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        @endif
                                    </svg>
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="px-3 py-3">
                            <a href="{{ route('user.index', array_merge(request()->all(), ['sort_by' => 'role', 'sort_direction' => $sort_direction === 'asc' ? 'desc' : 'asc'])) }}"
                                class="flex items-center hover:text-blue-600 transition-colors">
                                <span>
                                    Role
                                </span>
                                @if ($sort_by == 'role')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        @if ($sort_direction == 'asc')
                                            <path fill-rule="evenodd"
                                                d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                                clip-rule="evenodd" />
                                        @else
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        @endif
                                    </svg>
                                @endif
                            </a>
                        </th>
                        <th scope="col" class="px-13 py-3">
                            <a href="">
                                Action
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="bg-white border-b  border-gray-200">
                            <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $user->id }}
                            </th>
                            <td class="px-3 py-4 flex justify-center">
                                <img class="w-8 h-8 rounded-full brand-image img-circle elevation-2"
                                    style="opacity: .9; border: 2px solid rgba(255,255,255,0.7);"
                                    src="{{ asset('backend/images/avatar/' . $user->avatar) }}" />
                            </td>
                            <td class="px-3 py-4 ">

                                {{ Str::title($user->first_name) }} {{ Str::title($user->last_name) }}
                            </td>
                            <td class="px-3 py-4 hidden md:table-cell">
                                {{ $user->email }}
                            </td>
                            <td class="px-2 py-4 hidden sm:table-cell">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $user->role == 'admin'
                                        ? 'bg-purple-100 text-purple-800'
                                        : ($user->role == 'editor'
                                            ? 'bg-blue-100 text-blue-800'
                                            : 'bg-green-100 text-green-800') }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-3 py-4 ">
                                <div class="flex gap-2">
                                    <button type="button" data-modal-target="user-update-modal-{{ $user->id }}"
                                        class="text-blue-600 hover:text-blue-900 font-medium text-sm flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        <span class="hidden sm:inline">Edit</span>
                                    </button>
                                    <div id="user-update-modal-{{ $user->id }}"
                                        style="background: rgba(0, 0, 0, 0.3);"
                                        class="fixed inset-0 z-50 hidden overflow-y-auto flex items-center justify-center">
                                        <div class="relative p-4 w-full max-w-md">
                                            <!-- Modal İçeriği -->
                                            <div class="bg-white rounded-lg shadow-lg">
                                                <!-- Modal Başlık -->
                                                <div class="flex items-center justify-between p-4 border-b">
                                                    <h3 class="text-lg font-semibold text-gray-900">Kullanıcı Güncelle</h3>
                                                    <button type="button"
                                                        data-modal-hide="user-update-modal-{{ $user->id }}"
                                                        class="text-gray-400 hover:text-gray-900 focus:outline-none">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                    </button>
                                                </div>

                                                <form action="{{ route('user.update', $user) }}" method="POST"
                                                    class="p-4 space-y-4">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="grid grid-cols-2 gap-2">


                                                        <div class="">
                                                            <label for="first_name-{{ $user->id }}"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Ad</label>
                                                            <input type="text" name="first_name"
                                                                id="first_name-{{ $user->id }}"
                                                                value="{{ $user->first_name }}"
                                                                class="w-full p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                                                placeholder="Ad girin">
                                                            @error('first_name')
                                                                <div class="text-red-500 text-xs mb-1">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div>


                                                            <label for="last_name-{{ $user->id }}"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Soyad</label>
                                                            <input type="text" name="last_name"
                                                                id="last_name-{{ $user->id }}"
                                                                value="{{ $user->last_name }}"
                                                                class="w-full p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                                                placeholder="Ad girin">
                                                            @error('last_name')
                                                                <div class="text-red-500 text-xs mb-1">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>


                                                        <div class="col-span-2">
                                                            <label for="email-{{ $user->id }}"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                                            <input type="email" name="email"
                                                                id="email-{{ $user->id }}"
                                                                value="{{ $user->email }}"
                                                                class="w-full p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                                                placeholder="Email girin">
                                                            @error('email')
                                                                <div class="text-red-500 text-xs mb-1">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div>
                                                            <label for="password-{{ $user->id }}"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Yeni
                                                                Şifre
                                                            </label>
                                                            <input type="password" name="password"
                                                                id="password-{{ $user->id }}"
                                                                class="w-full p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                                            @error('password')
                                                                <div class="text-red-500 text-xs mb-1">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="">
                                                            <label for="role-{{ $user->id }}"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Rol</label>
                                                            <select name="role" id="role-{{ $user->id }}"
                                                                class="w-full p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                                                <option value="admin"
                                                                    {{ $user->role == 'admin' ? 'selected' : '' }}>Admin
                                                                </option>
                                                                <option value="editor"
                                                                    {{ $user->role == 'editor' ? 'selected' : '' }}>Editor
                                                                </option>
                                                                <option value="user"
                                                                    {{ $user->role == 'user' ? 'selected' : '' }}>User
                                                                </option>
                                                            </select>
                                                            @error('role')
                                                                <div class="text-red-500 text-xs mb-1">{{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>



                                                    </div>

                                                    <!-- Kaydet Butonu -->
                                                    <div class="text-right">
                                                        <button type="submit"
                                                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Güncelle</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <button type="button" data-modal-target="user-delete-modal-{{ $user->id }}"
                                        data-modal-toggle="user-delete-modal-{{ $user->id }}"
                                        class="text-red-600 hover:text-red-900 font-medium text-sm flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span class="hidden sm:inline">Delete</span>
                                    </button>

                                    <div id="user-delete-modal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
                                        class="fixed inset-0 z-50 hidden overflow-y-auto backdrop-blur-sm bg-black/40 flex items-center justify-center transition-opacity duration-300">
                                        <div class="relative p-4 w-full max-w-md">
                                            <!-- Modal Content -->
                                            <div
                                                class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                                                <!-- Modal Header -->
                                                <div
                                                    class="flex items-center justify-between p-5 border-b border-gray-200 dark:border-gray-700">
                                                    <div class="flex flex-col text-center w-full">
                                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                                            Kullanıcı Sil</h3>
                                                        <p class="mt-1 text-gray-600 dark:text-gray-300">Kullanıcıyı silmek
                                                            istediğine emin misin?</p>
                                                    </div>
                                                    <button type="button"
                                                        data-modal-hide="user-delete-modal-{{ $user->id }}"
                                                        class="absolute right-5 top-5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white rounded-lg p-1.5 inline-flex items-center transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300 dark:focus:ring-gray-600">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                        <span class="sr-only">Kapat</span>
                                                    </button>
                                                </div>

                                                <form action="{{ route('user.destroy', $user) }}" method="POST"
                                                    class="p-6">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="flex justify-center gap-2">
                                                        <button type="button"
                                                            data-modal-hide="user-delete-modal-{{ $user->id }}"
                                                            class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-200 dark:focus:ring-gray-600">
                                                            Vazgeç
                                                        </button>
                                                        <button type="submit"
                                                            class="px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 dark:focus:ring-red-600 flex items-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5"
                                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                            Sil
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr class="bg-white">
                            <td colspan="5" class="px-3 py-8 text-center text-gray-500">
                                No users found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
    <div class="my-4">
        {{ $users->links() }}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Modalı açma işlemi
            document.querySelectorAll('[data-modal-target]').forEach(button => {
                button.addEventListener('click', () => {
                    const modalId = button.getAttribute('data-modal-target');
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.classList.remove('hidden');
                    }
                });
            });

            // Modalı kapatma işlemi
            document.querySelectorAll('[data-modal-hide]').forEach(button => {
                button.addEventListener('click', () => {
                    const modalId = button.getAttribute('data-modal-hide');
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.classList.add('hidden');
                    }
                });
            });

            // Modal dışına tıklayınca kapatma
            document.querySelectorAll('.fixed.inset-0.z-50').forEach(modal => {
                modal.addEventListener('click', (event) => {
                    if (event.target === modal) {
                        modal.classList.add('hidden');
                    }
                });
            });



            const userId = {{ $user->id ?? 'null' }};
            if (userId) {
                // Check if there are any validation errors
                @if ($errors->any())
                    const errorModalId = `user-update-modal-{{ old('user_id', $user->id) }}`;
                    const errorModal = document.getElementById(errorModalId);
                    if (errorModal) {
                        errorModal.classList.remove('hidden');
                    }
                @endif
            }
        })
    </script>
@endsection
