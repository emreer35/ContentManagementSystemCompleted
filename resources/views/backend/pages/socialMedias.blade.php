@extends('backend.layout.app')


@section('title')
    Sosyal Medya Ayarlari
@endsection

@section('content')
    <div class="container mx-auto px-4 md:px-6 lg:px-8 mt-8">
        {{-- <form action="{{ route('update.social.media') }}" method="POST">
            @csrf
            @foreach ($socialAccount as $index => $social)
                @if ($index === 0)
                <div class="font-semibold text-lg underline">Facebook</div>
                @endif
                @if ($index === 1)
                <div class="font-semibold text-lg underline">Linkedin</div>
                @endif
                @if ($index === 2)
                <div class="font-semibold text-lg underline">Instagram</div>
                @endif
                @foreach ($social as $key => $value)
                    @if (isset($value))
                        <div class="mb-6 md:mb-8">
                            <label class="block text-gray-700 text-sm md:text-base font-bold"
                                for="{{ $key }}">{{ Str::title(str::replace('_', ' ', $key)) }}</label>
                            <input
                                class="block w-1/2 px-2.5 py-1.5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                type="text" name="settings[{{ $key }}]" id="{{ $key }}"
                                value="{{ $value }}" {{$key === 'target' ? 'readonly' : ''}} {{$key === 'icon' ? 'readonly' : ''}}>
                        </div>
                    @endif
                @endforeach
            @endforeach
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Submit
                </button>
            </div>
        </form> --}}
        <form action="{{ route('update.social.media') }}" method="POST">
            @csrf
            @foreach ($socialAccount as $index => $social)
                @if ($index === 0)
                <div class="font-semibold text-lg underline">Facebook</div>
                @endif
                @if ($index === 1)
                <div class="font-semibold text-lg underline">Linkedin</div>
                @endif
                @if ($index === 2)
                <div class="font-semibold text-lg underline">Instagram</div>
                @endif
                @foreach ($social as $key => $value)
                    @if (isset($value))
                        <div class="mb-6 md:mb-8">
                            <label class="block text-gray-700 text-sm md:text-base font-bold" for="{{ $key }}">
                                {{ Str::title(str::replace('_', ' ', $key)) }}
                            </label>
                            <input
                                class="block w-1/2 px-2.5 py-1.5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                type="text" name="settings[{{ $index }}][{{ $key }}]" id="{{ $key }}" value="{{ $value }}"
                                {{$key === 'target' ? 'readonly' : ''}} {{$key === 'icon' ? 'readonly' : ''}}>
                        </div>
                    @endif
                @endforeach
            @endforeach
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white font-medium text-sm rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection
