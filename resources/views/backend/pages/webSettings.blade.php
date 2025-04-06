@extends('backend.layout.app')


@section('title')
    Web Ayarlari
@endsection

@section('content')
    <div class="container mx-auto px-4 md:px-6 lg:px-8 mt-8">
        <form action="{{route('update.web.settings')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($webSettings as $key => $value)
                <div class="mb-6 md:mb-8">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3 mb-2">
                        <img class="h-8 sm:h-10 w-auto preview-image" id="img-{{ $key }}"
                            src="{{ asset('frontend/images/' . $value) }}"
                            alt="{{ Str::title($key) }} image">
                        <label class="block text-gray-700 text-sm md:text-base font-bold"
                            for="{{ $key }}">{{ Str::title($key) }}</label>
                    </div>
                    <input
                        class="block  px-2.5 py-1.5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        type="file" name="settings[{{ $key }}]" id="{{ $key }}" accept="image/*"
                        onchange="updateImage(this, 'img-{{ $key }}');">
                </div>
            @endforeach
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Submit
                </button>
            </div>
        </form>
    </div>
    <script>
        function updateImage(input, imgId) {
            const imgElement = document.getElementById(imgId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imgElement.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
