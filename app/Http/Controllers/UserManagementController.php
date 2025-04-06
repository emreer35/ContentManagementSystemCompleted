<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);
        $sortBy = $request->input('sort_by', 'role');
        $sortDirection = $request->input('sort_direction', 'asc');


        $users = User::query()->when($search, function ($query) use ($search) {
            $query->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        })->orderBy($sortBy, $sortDirection)
            ->paginate($perPage)
            ->appends([
                'search' => $search,
                'per_page' => $perPage,
                'sort_by' => $sortBy,
                'sort_direction' => $sortDirection
            ]);



        return view('backend.auth.userManagement.index', [
            'users' => $users,
            'search' => $search,
            'sort_by' => $sortBy,
            'sort_direction' => $sortDirection,
            'per_page' => $perPage
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.auth.userManagement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $authUser = Auth::user();
        if (Gate::denies('create', $authUser)) {
            return redirect()->back()->with('error', 'Bu Isleme Yetkiniz Yok');
        }
        $data = $request->all();
        $rules = [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'first_name' => 'required|string|regex:/^[a-zA-ZÇçĞğİıÖöŞşÜü]{2,50}( [a-zA-ZÇçĞğİıÖöŞşÜü]{2,50})?$/',
            'last_name' => 'required|string|regex:/^[a-zA-ZÇçĞğİıÖöŞşÜü]{2,50}( [a-zA-ZÇçĞğİıÖöŞşÜü]{2,50})?$/',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'confirmed|required|min:6|string',
            'password_confirmation' => 'required|string',
            'role' => 'required|in:admin,editor,user'
        ];
        $messages = [
            'image.image' => 'Yüklenen dosya bir resim olmalıdır.',
            'image.mimes' => 'Resim formatı yalnızca jpeg, png, jpg veya gif olabilir.',
            'first_name.required' => 'Ad alanı zorunludur.',
            'first_name.string' => 'Ad alanı sadece metin içermelidir.',
            'first_name.regex' => 'Ad alanı yalnızca harflerden oluşmalı ve 2-50 karakter arasında olmalıdır.',
            'last_name.required' => 'Soyad alanı zorunludur.',
            'last_name.string' => 'Soyad alanı sadece metin içermelidir.',
            'last_name.regex' => 'Soyad alanı yalnızca harflerden oluşmalı ve 2-50 karakter arasında olmalıdır.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi girin.',
            'email.unique' => 'Bu e-posta adresi zaten kullanılıyor.',
            'password.required' => 'Şifre alanı zorunludur.',
            'password.string' => 'Şifre metin formatında olmalıdır.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
            'password.confirmed' => 'Şifre onayı eşleşmiyor.',
            'password_confirmation.required' => 'Şifre onay alanı zorunludur.',
            'password_confirmation.string' => 'Şifre onay alanı metin formatında olmalıdır.',
            'role.required' => 'Rol alanı zorunludur.',
            'role.in' => 'Geçersiz rol seçimi. Yalnızca admin, editor veya user olabilir.',
        ];
        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $imageName = 'user.png';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'backend/images/avatar/';
            $image->move(public_path($imagePath), $imageName);
        }

        $user->create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'avatar' => $imageName,
        ]);
        return redirect()->route('user.index')->with('success', 'Kullanıcı Başarılı Bir Şekilde Oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     *   kullanici kendi profilini guncellemeye calisiyorsa bu kisimdan engelle
     *   kullanicinin rolu admin ise kendi rolunu admin den daha dusuk bir role getirememe
     *   ancak kendi disinda bir admin rolunu guncelleyebilir 
     */
    public function update(Request $request, User $user)
    {
        $authUser = Auth::user();
        if (Gate::denies('update', [$user, $authUser])) {
            return redirect()->back()->with('error', 'Bu Isleme Yetkiniz Yok');
        }
        $data = $request->all();
        $rules = [
            'first_name' => 'required|string|regex:/^[a-zA-ZÇçĞğİıÖöŞşÜü]{2,50}( [a-zA-ZÇçĞğİıÖöŞşÜü]{2,50})?$/',
            'last_name' => 'required|string|regex:/^[a-zA-ZÇçĞğİıÖöŞşÜü]{2,50}( [a-zA-ZÇçĞğİıÖöŞşÜü]{2,50})?$/',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|string',
            'role' => 'required|in:admin,editor,user'
        ];
        $messages = [
            'first_name.required' => 'Ad alanı zorunludur.',
            'first_name.regex' => 'İsim yalnızca harflerden oluşmalı ve 2-50 karakter arasında olmalıdır.',
            'last_name.required' => 'Soyad alanı zorunludur.',
            'last_name.regex' => 'Soyisim yalnızca harflerden oluşmalı ve 2-50 karakter arasında olmalıdır.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi girin.',
            'email.unique' => 'Bu e-posta adresi zaten kullanımda.',
            'role.required' => 'Rol alanı zorunludur.',
            'role.in' => 'Geçersiz rol seçimi. (admin, editor, user olmalı)',
        ];
        $validate = Validator::make($data, $rules, $messages);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('user.index')->with('success', 'Kullanici basariyla guncellenmistir');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Kullanıcı başarıyla silindi.');
    }
}
