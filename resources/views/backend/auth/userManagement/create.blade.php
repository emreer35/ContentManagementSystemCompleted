@extends('backend.layout.app')
@section('title')
    Kullanıcı Oluştur
@endsection

@section('content')
    <div class="container ">
        <div class="mb-6">
            <p class=" text-gray-500 mt-1">Sisteme Kullanıcı Oluşturma</p>
        </div>

        <div>
            <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class=" grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
                    <div class="mb-4 col-span-1 md:col-span-2 lg:col-span-1 items-center justify-center flex flex-col">

                        <img class="w-28 h-28 object-cover rounded-full mb-4 ring-2 ring-blue-100" id="user_image"
                            src="{{ asset('backend/images/avatar/user.png') }}" alt="user_image">
                        <p class="text-sm text-gray-500 mt-1">Profil fotoğrafınızı seçmezseniz default olarak
                            kalacaktır.</p>
                        <div>
                            <input type="file" name="image" id="image_input" class="hidden"
                                onchange="previewImage(event)">
                            <label for="image_input"
                                class="px-2.5 py-1.5 bg-blue-500 rounded-md text-white dark:bg-blue-500 dark:hover:bg-blue-600 hover:bg-blue-400 transition-all duration-75 cursor-pointer"
                                id="upload_button">
                                {{ __('Fotoğraf Seç') }}
                            </label>
                            @error('image')
                                <div class="text-red-500 text-xs my-1">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-span-2 md:col-span-2 sm:col-span-2 grid grid-cols-2 gap-2">

                        <div class="mb-4">
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900 placeholder:opacity-60">İsim</label>
                            <input type="text" name="first_name" id="first_name" placeholder="John"
                                class="w-full p-2 {{ $errors->has('first_name') ? '!border-red-500' : '' }} !border-gray-400 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @error('first_name')
                                <div class="text-red-500 text-xs my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="last_name"
                                class="block mb-2 text-sm font-medium text-gray-900 placeholder:opacity-60">Soyisim</label>
                            <input type="text" name="last_name" id="last_name" placeholder="Doe"
                                class="w-full p-2 {{ $errors->has('last_name') ? '!border-red-500' : '' }} !border-gray-400 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @error('last_name')
                                <div class="text-red-500 text-xs my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 placeholder:opacity-60">Email</label>
                            <input type="text" name="email" id="email" placeholder="johndoe@email.com"
                                class="w-full p-2 {{ $errors->has('email') ? '!border-red-500' : '' }} !border-gray-400 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @error('email')
                                <div class="text-red-500 text-xs my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4 ">
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 placeholder:opacity-60">Şifre</label>
                            <input type="password" name="password" id="password" placeholder="•••••••••••"
                                class="w-full p-2 {{ $errors->has('password') ? '!border-red-500' : '' }} !border-gray-400 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @error('password')
                                <div class="text-red-500 text-xs my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4 ">
                            <label for="password_confirmation"
                                class="block mb-2 text-sm font-medium text-gray-900 placeholder:opacity-60">Şifre</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="•••••••••••"
                                class="w-full p-2 {{ $errors->has('password_confirmation') ? '!border-red-500' : '' }} !border-gray-400 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @error('password_confirmation')
                                <div class="text-red-500 text-xs my-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4 col-span-2">
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 placeholder:opacity-60">Rol</label>
                            <select name="role" id="role"
                                class="w-full p-2 {{ $errors->has('role') ? '!border-red-500' : '' }} !border-gray-400 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option selected>Bir Seçim Yapın</option>
                                <option value="admin">Admin</option>
                                <option value="editor">Editör</option>
                                <option value="user">Kullanıcı</option>
                            </select>
                            @error('role')
                                <div class="text-red-500 text-xs my-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit"
                        class="px-2.5 py-1.5 bg-blue-500 text-white rounded-lg font-semibold lg:w-2/10 w-full">Kullanıcı
                        Oluştur</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById("user_image");
                output.classList.remove('d-none')
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);

            document.getElementById("upload_button").textContent = "Fotoğraf Seçin";
        }
    </script>
@endsection
