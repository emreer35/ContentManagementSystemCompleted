<section class="bg-white rounded-xl p-4 lg:p-8 ">
    <div class="max-w-2xl">
        <div class="font-medium md:text-lg lg:text-xl text-slate-900  mb-1">
            {{ __('Hesabını Sil') }}</div>
        <p class="text-sm md:text-base  mb-4 text-slate-900 ">
            {{ __('Hesabınız silindiğinde, tüm kaynakları ve verileri kalıcı olarak silinecektir.') }}
        </p>

        <button data-modal-target="user-delete-modal" data-modal-toggle="user-delete-modal"
            class="block text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
            type="button">
            Hesabımı Sil
        </button>

        <!-- Modal -->
        <div id="user-delete-modal" tabindex="-1" style="background: rgba(0, 0, 0, 0.3);"
            class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50  flex justify-center items-center">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow ">
                    <div class="p-4 md:p-5 text-center">
                        <form action="{{ route('delete.account') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 ">
                                {{ __('Hesabını silmek istediğine emin misin? ') }}</h3>
                            <p class="text-sm md:text-base mb-4 text-slate-900 ">
                                {{ __('Hesabınız silindiğinde, tüm kaynakları ve verileri kalıcı olarak silinecektir.') }}
                            </p>

                            <input type="password" name="password" id="password" placeholder="{{ __('Mevcut Şifre') }}"
                                class="w-full block mb-4 px-2.5 py-1.5 text-sm lg:text-base border text-slate-900  rounded focus:ring-1 focus:ring-gray-300   focus:outline-none">
                            @error('password', 'delete-account')
                                <div class="mt-1 text-xs lg:text-sm text-red-500  ">{{ $message }}
                                </div>
                            @enderror
                            <button data-modal-hide="user-delete-modal"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                {{ __('Hesabımı Sil') }}
                            </button>
                            <button data-modal-hide="user-delete-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">
                                {{ __('İptal Et') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const modalButton = document.querySelector("[data-modal-target='user-delete-modal']");
    const modal = document.getElementById("user-delete-modal");
    const closeModalButtons = document.querySelectorAll('[data-modal-hide="user-delete-modal"]');

    modalButton.addEventListener("click", () => {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        document.body.style.overflow = "hidden";
    });

    closeModalButtons.forEach((button) => {
        button.addEventListener("click", () => {
            modal.classList.add("hidden");
            modal.classList.remove("flex");
            document.body.style.overflow = "auto";
        });
    });
</script>
