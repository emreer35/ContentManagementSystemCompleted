<section class="bg-white rounded-xl p-4 lg:p-8 ">
    <div class="max-w-2xl">
        <div class="font-medium md:text-lg lg:text-xl text-slate-900 mb-1">
            {{ __('Profil Bilgilerini Düzenle') }}</div>
        <p class="text-sm md:text-base  mb-4 text-slate-900  ">
            {{ __('Hesabınızın profil bilgilerini guncelleyin.') }}</p>

        <form action="{{ route('profile.password.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" mb-4 flex flex-col">
                <label class="block text-gray-700 text-sm font-bold mb-1" for="current_password">Mevcut Şifre</label>
                <input
                    class="shadow-md appearance-none border rounded w-full py-2 px-3 mb-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="password" id="current_password" name="current_password">
                @error('current_password', 'password_update')
                    <div class="mt-1 text-xs lg:text-sm text-red-500 ">{{ $message }}</div>
                @enderror
            </div>
            <div class=" mb-4 flex flex-col">
                <label class="block text-gray-700 text-sm font-bold mb-1" for="password">Yeni Şifre</label>
                <input
                    class="shadow-md appearance-none border rounded w-full py-2 px-3 mb-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="password" id="password" name="password">
                @error('password', 'password_update')
                    <div class="mt-1 text-xs lg:text-sm text-red-500 ">{{ $message }}</div>
                @enderror
            </div>
            <div class=" mb-4 flex flex-col">
                <label class="block text-gray-700 text-sm font-bold mb-1" for="password_confirmation">Yeni Şifre
                    Onay</label>
                <input
                    class="shadow-md appearance-none border rounded w-full py-2 px-3 mb-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="password" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation', 'password_update')
                    <div class="mt-1 text-xs lg:text-sm text-red-500 ">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="px-2.5 py-1.5 !rounded-md outline-none border w-1/4 !text-slate-900 !border-blue-500 hover:bg-gray-100 hover:!text-slate-700">
                    Güncelle
                </button>
            </div>
        </form>
    </div>
</section>
