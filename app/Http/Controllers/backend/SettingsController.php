<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function webSettings()
    {
        return view('backend.pages.webSettings');
    }

    public function seo()
    {
        return view('backend.pages.seo');
    }
    public function navbar()
    {
        return view('backend.pages.navbar');
    }
    public function footer()
    {
        return view('backend.pages.footer');
    }
    public function socialMedias()
    {
        return view('backend.pages.socialMedias');
    }



    // public function updateWebSettings(Request $request){
    //     $settings = Setting::first();
    //     $webSettings = json_decode($settings->web_setting,true);

    //     $rule = [];

    //     foreach($webSettings as $key => $value){
    //         $rule['settings.$key'] = 'sometimes|image|mimes:jpg,png,jpeg,gif,svg';
    //     }
    //     $validatedData = $request->validate($rule);


    //     $updatedSettings = $webSettings;
    //     foreach($webSettings as $key => $value){
    //         if($request->hasFile('settings.$key')){
    //             $file = $request->file('settings.$key');
    //             $fileName = time() . '.' . $file->getClientOriginalExtension();
    //             $path = 'frontend/images';
    //             $file->move(public_path($path),$fileName);
    //             $updatedSettings[$key] = $fileName;
    //         }
    //     }

    //     $settings->web_setting = json_encode($updatedSettings);
    //     $settings->save();

    //     return redirect()->route('web.settings')->with('success','Web Ayarlari Basariyla Degisti.');
    // }
    public function updateWebSettings(Request $request)
    {
        $settings = Setting::first();
        $webSettings = json_decode($settings->web_setting, true);

        $rules = [];
        foreach ($webSettings as $key => $value) {
            $rules["settings.$key"] = 'sometimes|image|mimes:jpg,png,jpeg,gif,svg';
        }

        $validatedData = $request->validate($rules);
        $updatedSettings = $webSettings;

        foreach ($webSettings as $key => $value) {
            if ($request->hasFile("settings.$key")) {
                $file = $request->file("settings.$key");
                $fileName = time() . '_' . $key . '.' . $file->getClientOriginalExtension();
                $path = 'frontend/images';
                $file->move(public_path($path), $fileName);
                $updatedSettings[$key] = $fileName;
            }
        }

        $settings->web_setting = json_encode($updatedSettings);
        $settings->save();

        return redirect()->route('web.settings')->with('success', 'Web Ayarlari Basariyla Degisti.');
    }

    public function updateSeo(Request $request)
    {
        $settings = Setting::first();
        $defaultSeo = json_decode($settings->seo, true);
        $data = $request->all();
        $rule = [
            'settings.site_title' => 'nullable|string|max:255',
            'settings.meta_description' => 'nullable|string'
        ];
        $validator = Validator::make($data, $rule,);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $inputSettings = $request->input('settings');
        foreach ($defaultSeo as $key => $value) {
            if (isset($inputSettings[$key])) {
                $defaultSeo[$key] = $inputSettings[$key];
            }
        }

        $settings->seo = json_encode($defaultSeo);
        $settings->save();
        return redirect()->route('seo')->with(['success' => 'Seo Ayarlari Basariyla Degisti']);
    }
    public function updateNavbar(Request $request)
    {
        $settings = Setting::first();
        $navbarContent = json_decode($settings->navbar_content, true);

        $data = $request->all();
        $rule = [
            'settings.email' => 'nullable|string',
            'settings.address' => 'nullable|string',
            'settings.phone' => 'nullable|string|regex:/^\d+$/',
        ];
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $navbarSettings = $request->input('settings');
        foreach ($navbarContent as $key => $value) {
            if (isset($navbarSettings[$key])) {
                $navbarContent[$key] = $navbarSettings[$key];
            }
        }

        $settings->navbar_content = json_encode($navbarContent);
        $settings->save();

        return redirect()->route('navbar')->with(['success' => 'Navbar Ayarlari Basariyla Degisti']);
    }
    public function updateFooter(Request $request)
    {
        $settings = Setting::first();

        $footerContent = json_decode($settings->footer_content, true);

        $data = $request->all();
        $rule = [
            'settings.email' => 'nullable|string',
            'settings.address' => 'nullable|string',
            'settings.phone' => 'nullable|string',
            'settings.about' => 'nullable|string',
            'settings.copyright' => 'nullable|string',
        ];
        $validator = Validator::make($data, $rule);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $footerSettings = $request->input('settings');

        foreach ($footerContent as $key => $value) {
            if (isset($footerSettings[$key])) {
                $footerContent[$key] = $footerSettings[$key];
            }
        }
        $settings->footer_content = json_encode($footerContent);
        $settings->save();

        return redirect()->route('footer')->with(['success' => 'Footer Ayarlari Basariyla Degisti']);
    }
    public function updateSocialMedia(Request $request)
    {
        $settings = Setting::first();
        $socialAccount = json_decode($settings->social_medias, true); 
    
        $socialSettings = $request->input('settings');
    
        $rules = [];
        foreach ($socialAccount as $index => $social) {
            $rules["settings.$index.url"] = 'nullable|string';  
        }
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        foreach ($socialAccount as $index => $value) {
            if (isset($socialSettings[$index]['url'])) {
                $socialAccount[$index]['url'] = $socialSettings[$index]['url'];
            }
        }
    
        $settings->social_medias = json_encode($socialAccount, JSON_UNESCAPED_SLASHES);  
        $settings->save();
    
        return redirect()->route('social.medias')->with('success', 'Sosyal medya linkleri başarıyla güncellendi!');
    }
}
