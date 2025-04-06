<?php

namespace App\Providers;

use App\Models\Component;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\Setting;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, UserPolicy::class);





        View::composer('*', function ($view) {
            $settings = Setting::first();
            $navbarContent = json_decode($settings->navbar_content, true);
            $footerContent = json_decode($settings->footer_content, true);
            $webSettings = json_decode($settings->web_setting, true);
            $defaultSeo = json_decode($settings->seo, true);
            $socialAccount = json_decode($settings->social_medias, true);

            $view->with([
                'socialAccount' => $socialAccount,
                'navbarContent' => $navbarContent,
                'footerContent' => $footerContent,
                'webSettings' => $webSettings,
                'defaultSeo' => $defaultSeo,
            ]);
        });

        $pages = Page::all()->pluck('components', 'name')->toArray();
        $decodedPage = array_map(function ($page) {
            return json_decode($page, true);
        }, $pages);

        View::composer('*', function ($view) use ($decodedPage) {
            $view->with('pages', $decodedPage);
        });

        $componentPath = Component::pluck('path', 'name')->toArray();
        View::composer('*', function ($view) use ($componentPath) {
            $view->with('componentPath', $componentPath);
        });


        $headerMenu = Menu::where('id', 1)->first();
        $headerMenuItems = MenuItem::where('menu_id', $headerMenu->id)->with('page')->get();
        $headerMenuItemsWithUrl = $headerMenuItems->map(function ($item) {
            return [
                'label' => $item->label,
                'slug' => $item->slug,
                'parent_id' => $item->parent_id,
                'id' => $item->id
            ];
        });

        View::share('headerMenuItems', $headerMenuItemsWithUrl);

        $footerMenu = Menu::where('id', 2)->first();
        $footerMenuItems = MenuItem::where('menu_id', $footerMenu->id)->with('page')->get();
        $footerMenuItemsWithUrl = $footerMenuItems->map(function ($item) {
            return [
                'label' => $item->id,
                'slug' => $item->slug,
                'parent_id' => $item->parent_id,
                'id' => $item->id
            ];
        });

        View::share('footerMenuItems', $footerMenuItemsWithUrl);
    }
}
