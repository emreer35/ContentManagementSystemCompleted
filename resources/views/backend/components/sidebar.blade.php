 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Dashboard</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('backend/images/avatar/' . Auth::user()->avatar) }}"
                     class="img-circle elevation-2 brand-image img-circle elevation-2"
                     style="opacity: .9; border: 2px solid rgba(255,255,255,0.7);" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ Str::title(Auth::user()->first_name) }}
                     {{ Str::title(Auth::user()->last_name) }}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">


                 @if (Auth::check() && Auth::user()->role === 'admin')
                     <li class="nav-item {{ request()->routeIs(['user.index', 'user.create']) ? 'menu-open' : '' }} ">
                         <a href="#" class="nav-link {{request()->routeIs(['user.index', 'user.create']) ? 'active' : ''}}">
                             <i class="nav-icon fas fa-users"></i>
                             <p>
                                 Kullanıcı Yönetimi
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item ">
                                 <a href="{{ route('user.index') }}"
                                     class="!ps-6 nav-link {{ request()->routeIs('user.index') ? 'active' : '' }} ">
                                     <i class="text-sm far fa-circle nav-icon"></i>
                                     <p class="text-sm">Kullanici Listesi</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('user.create') }}"
                                     class="!ps-6 nav-link {{ request()->routeIs('user.create') ? 'active' : '' }}">
                                     <i class="text-sm far fa-circle nav-icon"></i>
                                     <p class="text-sm">Kullanıcı Oluştur</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                     <li class="nav-item {{ request()->routeIs(['web.settings', 'seo', 'navbar', 'footer', 'social.medias']) ? 'menu-open' : '' }} ">
                         <a href="#" class="nav-link {{request()->routeIs(['web.settings', 'seo', 'navbar', 'footer', 'social.medias']) ? 'active' : ''}}">
                             <i class="nav-icon fas fa-cog"></i>
                             <p>
                                 Sistem Ayarlari
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item ">
                                 <a href="{{ route('web.settings') }}"
                                     class="!ps-6 nav-link {{ request()->routeIs('web.settings') ? 'active' : '' }} ">
                                     <i class="text-sm far fa-circle nav-icon"></i>
                                     <p class="text-sm">Web Ayarlari</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('seo') }}"
                                     class="!ps-6 nav-link {{ request()->routeIs('seo') ? 'active' : '' }}">
                                     <i class="text-sm far fa-circle nav-icon"></i>
                                     <p class="text-sm">SEO Ayarlari</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('navbar') }}"
                                     class="!ps-6 nav-link {{ request()->routeIs('navbar') ? 'active' : '' }}">
                                     <i class="text-sm far fa-circle nav-icon"></i>
                                     <p class="text-sm">Navbar Ayarlari</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('footer') }}"
                                     class="!ps-6 nav-link {{ request()->routeIs('footer') ? 'active' : '' }}">
                                     <i class="text-sm far fa-circle nav-icon"></i>
                                     <p class="text-sm">Footer Ayarlari</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('social.medias') }}"
                                     class="!ps-6 nav-link {{ request()->routeIs('social.medias') ? 'active' : '' }}">
                                     <i class="text-sm far fa-circle nav-icon"></i>
                                     <p class="text-sm">Sosyal Media Ayarlari</p>
                                 </a>
                             </li>
                            </ul>
                     </li>
                 @endif
                 <li class="nav-item">
                     <a href="{{ route('profile.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-edit"></i>
                         <p>
                             Update Profile
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                         class="nav-link cursor-pointer">
                         <i class="fas fa-power-off nav-icon"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                         @csrf
                         @method('delete')
                     </form>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->

     </div>
     <!-- /.sidebar -->
 </aside>


 {{-- <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light elevation-2 position-fixed">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link bg-gradient-primary d-flex align-items-center">
         <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-2" style="opacity: .9; border: 2px solid rgba(255,255,255,0.7);">
         <span class="brand-text font-weight-light text-white ml-1">Dashboard</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center border-bottom">
             <div class="image">
                 <img src="{{ asset('backend/images/avatar/' . Auth::user()->avatar) }}" class="img-circle elevation-2"
                     style="border: 2px solid #4080ff; padding: 1px;" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block text-dark font-weight-medium">
                     {{ Str::title(Auth::user()->first_name) }}
                     {{ Str::title(Auth::user()->last_name) }}
                     <small class="d-block text-muted font-weight-normal">{{ Auth::user()->role }}</small>
                 </a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline mb-3">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control border-0 bg-light" type="search" placeholder="Arama..." aria-label="Search"
                     style="border-radius: 4px 0 0 4px;">
                 <div class="input-group-append">
                     <button class="btn btn-primary">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                 data-accordion="false">

                 <li class="nav-header text-uppercase text-muted font-weight-bold">Menü</li>

                 @if (Auth::check() && Auth::user()->role === 'admin')
                     <li class="nav-item {{ request()->routeIs(['user.index', 'user.create']) ? 'menu-open' : '' }}">
                         <a href="#"
                             class="nav-link {{ request()->routeIs(['user.index', 'user.create']) ? 'active' : '' }}">
                             <i class="nav-icon fas fa-users text-primary"></i>
                             <p>
                                 Kullanıcı Yönetimi
                                 <i class="right fas fa-angle-left"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="{{ route('user.index') }}"
                                     class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
                                     <i class="text-sm far fa-circle nav-icon text-primary"></i>
                                     <p class="text-sm">Kullanici Listesi</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('user.create') }}"
                                     class="nav-link {{ request()->routeIs('user.create') ? 'active' : '' }}">
                                     <i class="text-sm far fa-circle nav-icon text-primary"></i>
                                     <p class="text-sm">Kullanıcı Oluştur</p>
                                 </a>
                             </li>
                         </ul>
                     </li>
                 @endif

                 <li class="nav-item">
                     <a href="{{ route('profile.index') }}"
                         class="nav-link {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-edit text-info"></i>
                         <p>Profil Güncelle</p>
                     </a>
                 </li>

                 <li class="nav-header text-uppercase text-muted font-weight-bold">Hesap</li>

                 <li class="nav-item">
                     <a onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                         class="nav-link cursor-pointer">
                         <i class="fas fa-sign-out-alt nav-icon text-danger"></i>
                         <p>Çıkış Yap</p>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                         @csrf
                         @method('delete')
                     </form>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->

         <!-- Version -->
         <div class="text-center text-muted mt-5">
             <small>v1.0.0</small>
         </div>
     </div>
     <!-- /.sidebar -->
 </aside>

 <!-- Add this CSS for styling -->
 <style>
     /* Light sidebar styling */
     .sidebar-light {
         background-color: #ffffff;
         border-right: 1px solid rgba(0, 0, 0, 0.05);
     }

     /* Brand logo */
     .brand-link {
         padding: .8rem 1rem;
         transition: all 0.2s;
     }

     .bg-gradient-primary {
         background: linear-gradient(90deg, #4080ff, #0062cc);
     }

     /* User panel */
     .user-panel {
         border-bottom-color: rgba(0, 0, 0, 0.05) !important;
     }

     /* Menu styling */
     .nav-header {
         padding: .5rem 1rem .5rem;
         font-size: 0.75rem;
         letter-spacing: 0.5px;
         color: #6c757d !important;
     }

     .sidebar .nav-link {
         color: #495057;
         border-radius: 5px;
         margin: 2px 4px;
         transition: all 0.2s;
     }

     .sidebar .nav-link:hover {
         background-color: rgba(64, 128, 255, 0.06);
         color: #4080ff;
     }

     .sidebar .nav-link.active {
         background-color: #4080ff;
         color: white;
         box-shadow: 0 2px 6px rgba(64, 128, 255, 0.3);
     }

     .sidebar .nav-link.active i {
         color: white !important;
     }

     .sidebar .nav-treeview .nav-link {
         margin-left: 10px;
         padding-left: 20px;
     }

     .sidebar .nav-treeview .nav-link.active {
         background-color: rgba(64, 128, 255, 0.1);
         color: #4080ff;
         box-shadow: none;
     }

     .sidebar .nav-treeview .nav-link.active i {
         color: #4080ff !important;
     }

     /* Search form */
     .form-control {
         box-shadow: none !important;
     }

     .form-control:focus {
         border-color: #4080ff;
     }

     .bg-light {
         background-color: #f8f9fa !important;
     }

     /* Button */
     .btn-primary {
         background-color: #4080ff;
         border-color: #4080ff;
     }

     .btn-primary:hover {
         background-color: #3070ef;
         border-color: #3070ef;
     }

     /* Responsive */
     @media (max-width: 992px) {
         .main-sidebar {
             transform: translateX(-250px);
             transition: transform 0.3s ease;
             z-index: 1040;
         }

         .sidebar-open .main-sidebar {
             transform: translateX(0);
         }

         .sidebar-overlay {
             position: fixed;
             top: 0;
             left: 0;
             right: 0;
             bottom: 0;
             background-color: rgba(0, 0, 0, 0.5);
             z-index: 1030;
             display: none;
         }

         .sidebar-open .sidebar-overlay {
             display: block;
         }
     }

     /* Toggle button */
     .sidebar-toggle {
         position: fixed;
         top: 1rem;
         left: 1rem;
         z-index: 1050;
         display: none;
         width: 38px;
         height: 38px;
         border-radius: 5px;
         background-color: #4080ff;
         color: white;
         border: none;
         box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
         justify-content: center;
         align-items: center;
     }

     @media (max-width: 992px) {
         .sidebar-toggle {
             display: flex;
         }
     }
 </style> --}}
