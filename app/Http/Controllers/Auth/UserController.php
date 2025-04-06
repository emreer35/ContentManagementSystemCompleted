<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.auth.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    public function imageUpdate(Request $request)
    {
        $request->validateWithBag('change_profile_image', [
            'image' => 'required|mimes:png,jpg,jpeg,svg'
        ], [
            'image.required' => 'Lütfen bir fotoğraf seçiniz.',
            'image.mimes' => 'Görüntü alanı şu türde bir dosya olmalıdır: png, jpg, jpeg, svg.'
        ]);
        $user = Auth::user();
        if ($user->avatar && $user->avatar !== 'user.png' && File::exists(public_path('backend/images/avatar' . $user->avatar))) {
            File::delete(public_path('backend/images/avatar' . $user->avatar));
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $filePath = 'backend/images/avatar/';
            $file->move(public_path($filePath), $fileName);

            $user->avatar = $fileName;
            $user->save();
            return back()->with('success', 'Profil Resminiz Basariyla Guncellendi');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request)
    {
        $request->user()->fill($request->validated());
        $request->user()->save();
        return redirect()->route('profile.index')->with('success', 'Profiliniz Basariyla Guncellendi');
    }

    public function passwordUpdate(Request $request)
    {

        $validate = $request->validateWithBag('password_update', [
            'current_password' => 'required|string|current_password',
            'password' => [
                'required',
                'string',
                'min:6',
                Password::defaults(),
                'confirmed'
            ]
        ], [
            'current_password.required' => 'Mevcut Şifre Alanı Gereklidir.',
            'current_password.current_password' => 'Girdiğiniz mevcut şifre hatalıdır.',
            'password.required' => 'Yeni şifre alanı zorunludur.',
            'password.confirmed' => 'Yeni şifreler eşleşmiyor.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
        ]);

        $request->user()->password = Hash::make($validate['password']);
        $request->user()->save();

        return redirect()->route('profile.index')->with(['success' => 'Profiliniz Basariyla Guncellendi']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('delete-account', [
            'password' => 'current_password|required'
        ], [
            'password.current_password' => 'Şifre mevcut sifre ile eslesmiyor.',
            'password.required' => 'Şifre Alanı Gereklidir.',
        ]);

        $user = $request->user();
        if ($user->avatar && $user->avatar !== 'user.png' && File::exists(public_path('backend/images/avatar' . $user->avatar))) {
            File::delete(public_path('backend/images/avatar' . $user->avatar));
        }

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
