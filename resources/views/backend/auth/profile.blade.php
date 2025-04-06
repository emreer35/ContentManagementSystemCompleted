@extends('backend.layout.app')
@section('title')
    Profile
@endsection
@section('content')
    <div class="">

        <hr>
        <div class="mb-4">
            @include('backend.auth.profilePartials.profile-image-update')
        </div>
        <div class="mb-4">
            @include('backend.auth.profilePartials.profile-update')
        </div>
        <div class="mb-4">
            @include('backend.auth.profilePartials.password-update')
        </div>
        <div class="mb-4">
            @include('backend.auth.profilePartials.profile-user-delete')
        </div>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById("user_image");
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);

            document.getElementById("save_button").classList.remove("hidden");
            document.getElementById("upload_button").textContent = "Fotoğraf Seçin";
        }
    </script>
@endsection
