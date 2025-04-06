<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultSeo = [
            'site_title' => 'Tema 1',
            'meta_description' => 'Yunus Emre Er'
        ];

        $webSettings = [

            'logo' => 'logo.png',
            'logo_dark' => 'logo_blue.png',
            'logo_light' => 'logo_light.png',
            'favicon' => 'favicon.png',

        ];

        $navbarContent = [
            'email' => 'emreer3509@gmail.com',
            'address' => 'Izmir/Cigli',
            'phone' => '555 555 55 55',
        ];

        $footerContent = [
            'email' => 'emreer3509@gmail.com',
            'address' => 'Izmir/Cigli',
            'phone' => '555 555 55 55',
            'about' => 'Gelişmiş tema yönetimi sayesinde, her bir temayı bağımsız olarak yönetebilir veya temalar arası bileşen paylaşımı yapabilirsiniz. Bu esneklik, modern ve dinamik uygulamalar oluşturmanızı kolaylaştırır.',
            'copyright' => '© 2025 <a href="emreer.com.tr">emreer.com.tr</a> Tüm hakları saklıdır.'
        ];

        $socialAccount = [
            [
                'icon' => 'fab fa-facebook-f',
                'url' => 'www.facebook.com/xpirextions',
                'target' => '_blank'
            ],
            [
                'icon' => 'fa-brands fa-linkedin',
                'url' => 'https://www.linkedin.com/in/yunus-emre-er-560912257/',
                'target' => '_blank'
            ],
            [
                'icon' => 'fa-brands fa-square-instagram',
                'url' => 'www.instagram.com/emre.er.21',
                'target' => '_blank'
            ],
        ];

        Setting::updateOrCreate([], [
            'web_setting' => json_encode($webSettings),
            'seo' => json_encode($defaultSeo),
            'navbar_content' => json_encode($navbarContent),
            'footer_content' => json_encode($footerContent),
            'social_medias' => json_encode($socialAccount),
            'created_at' => now(),
            'updated_at' => now()
        ]);


        $pages = [
            'Anasayfa Sablonu' => [
                ['id' => 1, 'name' => 'header', 'version' => 1],
                ['id' => 2, 'name' => 'banner', 'version' => 1],
                ['id' => 3, 'name' => 'portfolio', 'version' => 3],

                ['id' => 4, 'name' => 'about', 'version' => 1],
                ['id' => 5, 'name' => 'blog', 'version' => 1],
                ['id' => 6, 'name' => 'choose', 'version' => 1],
                ['id' => 7, 'name' => 'client', 'version' => 1],
                ['id' => 8, 'name' => 'contact', 'version' => 1],
                ['id' => 9, 'name' => 'fun-fact', 'version' => 1],
                ['id' => 10, 'name' => 'services', 'version' => 1],
                ['id' => 11, 'name' => 'process', 'version' => 3],
                ['id' => 12, 'name' => 'progress', 'version' => 3],
                ['id' => 13, 'name' => 'pricing', 'version' => 2],
                ['id' => 14, 'name' => 'team', 'version' => 1],
                ['id' => 15, 'name' => 'testimonial', 'version' => 2],
                ['id' => 16, 'name' => 'google-maps', 'version' => 1],


                ['id' => 17, 'name' => 'footer', 'version' => 1],
            ],
            'Hakkimizda Sablonu' => [
                ['id' => 1, 'name' => 'header', 'version' => 1],
                ['id' => 2, 'name' => 'banner', 'version' => 1],
                ['id' => 3, 'name' => 'portfolio', 'version' => 3],

                ['id' => 4, 'name' => 'about', 'version' => 1],
                ['id' => 5, 'name' => 'fun-fact', 'version' => 1],
                ['id' => 6, 'name' => 'services', 'version' => 1],
                ['id' => 7, 'name' => 'team', 'version' => 1],


                ['id' => 8, 'name' => 'footer', 'version' => 1],
            ],
            'Iletisim Sablonu' => [
                ['id' => 1, 'name' => 'header', 'version' => 1],
                ['id' => 2, 'name' => 'contact', 'version' => 1],


                ['id' => 3, 'name' => 'footer', 'version' => 1],
            ],
        ];

        foreach ($pages as $key => $value) {
            Page::create([
                'name' => $key,
                'components' => json_encode($value ?? [])
            ]);
        }

        $headerMenu = Menu::create(['name' => 'Header Menu']);
        $footerMenu = Menu::create(['name' => 'Footer Menu']);

        $pageMenus = [
            'Anasayfa Sablonu' => 'Anasayfa',
            'Hakkimizda Sablonu' => 'Hakkinda',
            'Iletisim Sablonu' => 'Iletisim'
        ];

        $componentPath = [
            'header' => 'frontend.layouts.utils.v', //all
            'banner' => 'frontend.layouts.utils.v', //all
            'about' => 'frontend.components.v', //all
            'blog' => 'frontend.components.v', //v1,v3
            'choose' => 'frontend.components.v', //v1,v2
            'client' => 'frontend.components.v', //v1,v2
            'contact' => 'frontend.components.v', //v1,v2
            'fun-fact' => 'frontend.components.v', //v1,v2
            'google-maps' => 'frontend.components.v', //v1
            'services' => 'frontend.components.v', //all
            'process' => 'frontend.components.v', //v3
            'progress' => 'frontend.components.v', //v3
            'pricing' => 'frontend.components.v', //v2
            'portfolio' => 'frontend.components.v', //v2, v3
            'team' => 'frontend.components.v', //all
            'testimonial' => 'frontend.components.v', //v2
            'footer' => 'frontend.layouts.utils.v', //all
        ];

        foreach ($componentPath as $key => $value) {
            Component::firstOrCreate([
                'name' => $key,
                'path' => $value
            ]);
        }

        foreach ($pageMenus as $key => $label) {
            $page = Page::firstOrCreate(
                ['name' => $key],
                ['components' => json_encode([])]
            );
            if (empty($page->components())) {
                $page->update([
                    'components' => json_encode([])
                ]);
            }

            MenuItem::create([
                'menu_id' => $headerMenu->id,
                'page_id' => $page->id,
                'label' => $label,
                'slug' => Str::slug($label),
                'parent_id' => null,
            ]);
            MenuItem::create([
                'menu_id' => $footerMenu->id,
                'page_id' => $page->id,
                'label' => $label,
                'slug' => Str::slug($label),
                'parent_id' => null,
            ]);
        }

        
    }
}
