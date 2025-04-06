<section class="bg-white rounded-xl p-4 lg:p-8 ">
    <div class="max-w-2xl">
        <div class="font-medium md:text-lg lg:text-xl text-slate-900 mb-1">
            {{ __('Profil Bilgilerini Düzenle') }}</div>
        <p class="text-sm md:text-base  mb-4 text-slate-900  ">
            {{ __('Hesabınızın profil bilgilerini guncelleyin.') }}</p>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                <div class="{{ $errors->has('first_name') ? 'mb-1' : 'mb-3' }} flex flex-col">
                    <label class="block text-gray-700 text-sm font-bold mb-1" for="first_name">First Name</label>
                    <input
                        class="shadow-md appearance-none border rounded w-full py-2 px-3 mb-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" id="first_name" name="first_name" class=""
                        value="{{ Str::title(Auth::user()->first_name) }}">
                    @error('first_name')
                        <div class="text-red-500 text-xs mb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="{{ $errors->has('last_name') ? 'mb-1' : 'mb-3' }} flex flex-col">
                    <label class="block text-gray-700 text-sm font-bold mb-1" for="last_name">Last Name</label>
                    <input
                        class="shadow-md appearance-none border rounded w-full py-2 px-3 mb-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="last_name" value="{{ Str::title(Auth::user()->last_name) }}">
                    @error('last_name')
                        <div class="text-red-500 text-xs mb-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="{{ $errors->has('email') ? 'mb-1' : 'mb-3' }} col-span-2 flex flex-col">
                    <label class="block text-gray-700 text-sm font-bold mb-1" for="email">Email</label>
                    <input
                        class="shadow-md appearance-none border rounded mb-1 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="email" name="email" value="{{ Auth::user()->email }}">
                    @error('email')
                        <div class="text-red-500 text-xs mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="px-2.5 py-1.5 !rounded-md outline-none border w-2/4 !text-slate-900 !border-blue-500 hover:bg-gray-100 hover:!text-slate-700">
                        Güncelle
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
