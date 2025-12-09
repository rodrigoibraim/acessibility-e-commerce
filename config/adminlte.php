<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Admin</b>LTE',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration. Currently, two
    | modes are supported: 'fullscreen' for a fullscreen preloader animation
    | and 'cwrapper' to attach the preloader animation into the content-wrapper
    | element and avoid overlapping it with the sidebars and the top navbar.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => true,
        'mode' => 'fullscreen',
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,
    'disable_darkmode_routes' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Asset Bundling
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Asset Bundling option for the admin panel.
    | Currently, the next modes are supported: 'mix', 'vite' and 'vite_js_only'.
    | When using 'vite_js_only', it's expected that your CSS is imported using
    | JavaScript. Typically, in your application's 'resources/js/app.js' file.
    | If you are not using any of these, leave it as 'false'.
    |
    | For detailed instructions you can look the asset bundling section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'laravel_asset_bundling' => false,
    'laravel_css_path' => 'css/app.css',
    'laravel_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items (topo):
        [
            'type' => 'navbar-search',
            'text' => 'Buscar',
            'topnav_right' => true,
        ],
        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],
        [
            'text' => 'Entrar',
            'url' => '/login',
            'icon' => 'fas fa-sign-in-alt',
            'topnav_right' => true,
        ],
        [
            'text' => 'Carrinho',
            'url' => '/carrinho',
            'icon' => 'fas fa-shopping-cart',
            'topnav_right' => true,
            'label' => 3, // Número de itens no carrinho
            'label_color' => 'warning',
        ],

        // Sidebar items (menu lateral):
        [
            'type' => 'sidebar-menu-search',
            'text' => 'Buscar produtos...',
        ],

        // DASHBOARD ADMIN
        [
            'text' => 'Dashboard',
            'url' => '/admin/dashboard',
            'icon' => 'fas fa-tachometer-alt',
            'can' => 'admin-access',
        ],

        // CATÁLOGO DE PRODUTOS
        ['header' => 'CATÁLOGO'],

        // MODA MASCULINA
        [
            'text' => 'Moda Masculina',
            'icon' => 'fas fa-male',
            'submenu' => [
                [
                    'text' => 'Camisetas',
                    'url' => '/catalogo/masculino/camisetas',
                    'icon' => 'fas fa-tshirt',
                    'submenu' => [
                        [
                            'text' => 'Básicas',
                            'url' => '/catalogo/masculino/camisetas/basicas',
                        ],
                        [
                            'text' => 'Estampadas',
                            'url' => '/catalogo/masculino/camisetas/estampadas',
                        ],
                        [
                            'text' => 'Polo',
                            'url' => '/catalogo/masculino/camisetas/polo',
                        ],
                        [
                            'text' => 'Manga Longa',
                            'url' => '/catalogo/masculino/camisetas/manga-longa',
                        ],
                    ],
                ],
                [
                    'text' => 'Calças',
                    'url' => '/catalogo/masculino/calcas',
                    'icon' => 'fas fa-user-tie',
                    'submenu' => [
                        [
                            'text' => 'Jeans',
                            'url' => '/catalogo/masculino/calcas/jeans',
                        ],
                        [
                            'text' => 'Social',
                            'url' => '/catalogo/masculino/calcas/social',
                        ],
                        [
                            'text' => 'Moletom',
                            'url' => '/catalogo/masculino/calcas/moletom',
                        ],
                        [
                            'text' => 'Cargo',
                            'url' => '/catalogo/masculino/calcas/cargo',
                        ],
                    ],
                ],
                [
                    'text' => 'Calçados',
                    'url' => '/catalogo/masculino/calcados',
                    'icon' => 'fas fa-shoe-prints',
                    'submenu' => [
                        [
                            'text' => 'Tênis',
                            'url' => '/catalogo/masculino/calcados/tenis',
                            'submenu' => [
                                [
                                    'text' => 'Esportivo',
                                    'url' => '/catalogo/masculino/calcados/tenis/esportivo',
                                ],
                                [
                                    'text' => 'Casual',
                                    'url' => '/catalogo/masculino/calcados/tenis/casual',
                                ],
                                [
                                    'text' => 'Corrida',
                                    'url' => '/catalogo/masculino/calcados/tenis/corrida',
                                ],
                            ],
                        ],
                        [
                            'text' => 'Sapatos',
                            'url' => '/catalogo/masculino/calcados/sapatos',
                            'submenu' => [
                                [
                                    'text' => 'Social',
                                    'url' => '/catalogo/masculino/calcados/sapatos/social',
                                ],
                                [
                                    'text' => 'Casual',
                                    'url' => '/catalogo/masculino/calcados/sapatos/casual',
                                ],
                                [
                                    'text' => 'Bota',
                                    'url' => '/catalogo/masculino/calcados/sapatos/bota',
                                ],
                            ],
                        ],
                        [
                            'text' => 'Sandálias',
                            'url' => '/catalogo/masculino/calcados/sandalias',
                        ],
                    ],
                ],
                [
                    'text' => 'Acessórios',
                    'url' => '/catalogo/masculino/acessorios',
                    'icon' => 'fas fa-glasses',
                    'submenu' => [
                        [
                            'text' => 'Relógios',
                            'url' => '/catalogo/masculino/acessorios/relogios',
                        ],
                        [
                            'text' => 'Óculos',
                            'url' => '/catalogo/masculino/acessorios/oculos',
                        ],
                        [
                            'text' => 'Cintos',
                            'url' => '/catalogo/masculino/acessorios/cintos',
                        ],
                        [
                            'text' => 'Bonés',
                            'url' => '/catalogo/masculino/acessorios/bones',
                        ],
                    ],
                ],
                [
                    'text' => 'Roupa Íntima',
                    'url' => '/catalogo/masculino/roupa-intima',
                    'submenu' => [
                        [
                            'text' => 'Cuecas',
                            'url' => '/catalogo/masculino/roupa-intima/cuecas',
                        ],
                        [
                            'text' => 'Meias',
                            'url' => '/catalogo/masculino/roupa-intima/meias',
                        ],
                    ],
                ],
            ],
        ],

        // MODA FEMININA
        [
            'text' => 'Moda Feminina',
            'icon' => 'fas fa-female',
            'submenu' => [
                [
                    'text' => 'Vestidos',
                    'url' => '/catalogo/feminino/vestidos',
                    'icon' => 'fas fa-tshirt',
                    'submenu' => [
                        [
                            'text' => 'Festa',
                            'url' => '/catalogo/feminino/vestidos/festa',
                        ],
                        [
                            'text' => 'Casual',
                            'url' => '/catalogo/feminino/vestidos/casual',
                        ],
                        [
                            'text' => 'Longos',
                            'url' => '/catalogo/feminino/vestidos/longos',
                        ],
                        [
                            'text' => 'Curto',
                            'url' => '/catalogo/feminino/vestidos/curto',
                        ],
                    ],
                ],
                [
                    'text' => 'Blusas',
                    'url' => '/catalogo/feminino/blusas',
                    'submenu' => [
                        [
                            'text' => 'Camisetas',
                            'url' => '/catalogo/feminino/blusas/camisetas',
                        ],
                        [
                            'text' => 'Cropped',
                            'url' => '/catalogo/feminino/blusas/cropped',
                        ],
                        [
                            'text' => 'Blusas Social',
                            'url' => '/catalogo/feminino/blusas/social',
                        ],
                        [
                            'text' => 'Regatas',
                            'url' => '/catalogo/feminino/blusas/regatas',
                        ],
                    ],
                ],
                [
                    'text' => 'Calças e Saias',
                    'url' => '/catalogo/feminino/calcas-saias',
                    'submenu' => [
                        [
                            'text' => 'Calças Jeans',
                            'url' => '/catalogo/feminino/calcas/jeans',
                        ],
                        [
                            'text' => 'Calças Legging',
                            'url' => '/catalogo/feminino/calcas/legging',
                        ],
                        [
                            'text' => 'Saias',
                            'url' => '/catalogo/feminino/saias',
                            'submenu' => [
                                [
                                    'text' => 'Longas',
                                    'url' => '/catalogo/feminino/saias/longas',
                                ],
                                [
                                    'text' => 'Curta',
                                    'url' => '/catalogo/feminino/saias/curtas',
                                ],
                                [
                                    'text' => 'Midi',
                                    'url' => '/catalogo/feminino/saias/midi',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'Calçados',
                    'url' => '/catalogo/feminino/calcados',
                    'icon' => 'fas fa-high-heel',
                    'submenu' => [
                        [
                            'text' => 'Saltos',
                            'url' => '/catalogo/feminino/calcados/saltos',
                            'submenu' => [
                                [
                                    'text' => 'Alto',
                                    'url' => '/catalogo/feminino/calcados/saltos/alto',
                                ],
                                [
                                    'text' => 'Médio',
                                    'url' => '/catalogo/feminino/calcados/saltos/medio',
                                ],
                                [
                                    'text' => 'Anabela',
                                    'url' => '/catalogo/feminino/calcados/saltos/anabela',
                                ],
                            ],
                        ],
                        [
                            'text' => 'Tênis',
                            'url' => '/catalogo/feminino/calcados/tenis',
                        ],
                        [
                            'text' => 'Sandálias',
                            'url' => '/catalogo/feminino/calcados/sandalias',
                        ],
                        [
                            'text' => 'Rasteiras',
                            'url' => '/catalogo/feminino/calcados/rasteiras',
                        ],
                    ],
                ],
                [
                    'text' => 'Acessórios',
                    'url' => '/catalogo/feminino/acessorios',
                    'submenu' => [
                        [
                            'text' => 'Bolsas',
                            'url' => '/catalogo/feminino/acessorios/bolsas',
                            'submenu' => [
                                [
                                    'text' => 'Clutch',
                                    'url' => '/catalogo/feminino/acessorios/bolsas/clutch',
                                ],
                                [
                                    'text' => 'Tiracolo',
                                    'url' => '/catalogo/feminino/acessorios/bolsas/tiracolo',
                                ],
                                [
                                    'text' => 'Mochila',
                                    'url' => '/catalogo/feminino/acessorios/bolsas/mochila',
                                ],
                            ],
                        ],
                        [
                            'text' => 'Joias',
                            'url' => '/catalogo/feminino/acessorios/joias',
                            'submenu' => [
                                [
                                    'text' => 'Colares',
                                    'url' => '/catalogo/feminino/acessorios/joias/colares',
                                ],
                                [
                                    'text' => 'Brinco',
                                    'url' => '/catalogo/feminino/acessorios/joias/brincos',
                                ],
                                [
                                    'text' => 'Pulseiras',
                                    'url' => '/catalogo/feminino/acessorios/joias/pulseiras',
                                ],
                            ],
                        ],
                        [
                            'text' => 'Cintos',
                            'url' => '/catalogo/feminino/acessorios/cintos',
                        ],
                    ],
                ],
                [
                    'text' => 'Roupa Íntima',
                    'url' => '/catalogo/feminino/roupa-intima',
                    'submenu' => [
                        [
                            'text' => 'Sutiãs',
                            'url' => '/catalogo/feminino/roupa-intima/sutias',
                        ],
                        [
                            'text' => 'Calcinhas',
                            'url' => '/catalogo/feminino/roupa-intima/calcinhas',
                        ],
                        [
                            'text' => 'Pijamas',
                            'url' => '/catalogo/feminino/roupa-intima/pijamas',
                        ],
                    ],
                ],
            ],
        ],

        // ELETRÔNICOS
        [
            'text' => 'Eletrônicos',
            'icon' => 'fas fa-laptop',
            'submenu' => [
                [
                    'text' => 'Smartphones',
                    'url' => '/catalogo/eletronicos/smartphones',
                    'icon' => 'fas fa-mobile-alt',
                    'submenu' => [
                        [
                            'text' => 'Android',
                            'url' => '/catalogo/eletronicos/smartphones/android',
                        ],
                        [
                            'text' => 'iPhone',
                            'url' => '/catalogo/eletronicos/smartphones/iphone',
                        ],
                    ],
                ],
                [
                    'text' => 'Computadores',
                    'url' => '/catalogo/eletronicos/computadores',
                    'submenu' => [
                        [
                            'text' => 'Notebooks',
                            'url' => '/catalogo/eletronicos/computadores/notebooks',
                        ],
                        [
                            'text' => 'Desktops',
                            'url' => '/catalogo/eletronicos/computadores/desktops',
                        ],
                        [
                            'text' => 'Acessórios',
                            'url' => '/catalogo/eletronicos/computadores/acessorios',
                            'submenu' => [
                                [
                                    'text' => 'Mouse',
                                    'url' => '/catalogo/eletronicos/computadores/acessorios/mouse',
                                ],
                                [
                                    'text' => 'Teclado',
                                    'url' => '/catalogo/eletronicos/computadores/acessorios/teclado',
                                ],
                                [
                                    'text' => 'Monitor',
                                    'url' => '/catalogo/eletronicos/computadores/acessorios/monitor',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'Áudio',
                    'url' => '/catalogo/eletronicos/audio',
                    'submenu' => [
                        [
                            'text' => 'Fones de Ouvido',
                            'url' => '/catalogo/eletronicos/audio/fones',
                        ],
                        [
                            'text' => 'Caixas de Som',
                            'url' => '/catalogo/eletronicos/audio/caixas-som',
                        ],
                    ],
                ],
            ],
        ],

        // CASA E DECORAÇÃO
        [
            'text' => 'Casa & Decoração',
            'icon' => 'fas fa-home',
            'submenu' => [
                [
                    'text' => 'Móveis',
                    'url' => '/catalogo/casa/moveis',
                    'submenu' => [
                        [
                            'text' => 'Sala',
                            'url' => '/catalogo/casa/moveis/sala',
                        ],
                        [
                            'text' => 'Quarto',
                            'url' => '/catalogo/casa/moveis/quarto',
                        ],
                        [
                            'text' => 'Cozinha',
                            'url' => '/catalogo/casa/moveis/cozinha',
                        ],
                    ],
                ],
                [
                    'text' => 'Decoração',
                    'url' => '/catalogo/casa/decoracao',
                    'submenu' => [
                        [
                            'text' => 'Quadros',
                            'url' => '/catalogo/casa/decoracao/quadros',
                        ],
                        [
                            'text' => 'Vasos',
                            'url' => '/catalogo/casa/decoracao/vasos',
                        ],
                        [
                            'text' => 'Cortinas',
                            'url' => '/catalogo/casa/decoracao/cortinas',
                        ],
                    ],
                ],
                [
                    'text' => 'Cama, Mesa e Banho',
                    'url' => '/catalogo/cama-mesa-banho',
                    'submenu' => [
                        [
                            'text' => 'Lençóis',
                            'url' => '/catalogo/cama-mesa-banho/lencóis',
                        ],
                        [
                            'text' => 'Toalhas',
                            'url' => '/catalogo/cama-mesa-banho/toalhas',
                        ],
                        [
                            'text' => 'Edredons',
                            'url' => '/catalogo/cama-mesa-banho/edredons',
                        ],
                    ],
                ],
            ],
        ],

        // ESPORTE E LAZER
        [
            'text' => 'Esporte & Lazer',
            'icon' => 'fas fa-running',
            'submenu' => [
                [
                    'text' => 'Fitness',
                    'url' => '/catalogo/esporte/fitness',
                    'submenu' => [
                        [
                            'text' => 'Roupas',
                            'url' => '/catalogo/esporte/fitness/roupas',
                        ],
                        [
                            'text' => 'Acessórios',
                            'url' => '/catalogo/esporte/fitness/acessorios',
                        ],
                        [
                            'text' => 'Equipamentos',
                            'url' => '/catalogo/esporte/fitness/equipamentos',
                        ],
                    ],
                ],
                [
                    'text' => 'Acampamento',
                    'url' => '/catalogo/esporte/acampamento',
                ],
                [
                    'text' => 'Ciclismo',
                    'url' => '/catalogo/esporte/ciclismo',
                ],
            ],
        ],

        // OFERTAS E DESTAQUES
        ['header' => 'OFERTAS ESPECIAIS'],
        [
            'text' => 'Promoções',
            'url' => '/promocoes',
            'icon' => 'fas fa-fire',
            'label' => 'HOT',
            'label_color' => 'danger',
        ],
        [
            'text' => 'Novidades',
            'url' => '/novidades',
            'icon' => 'fas fa-star',
            'label' => 'NEW',
            'label_color' => 'success',
        ],
        [
            'text' => 'Mais Vendidos',
            'url' => '/mais-vendidos',
            'icon' => 'fas fa-trophy',
            'label' => 'TOP',
            'label_color' => 'warning',
        ],

        // GERENCIAMENTO (para admin)
        ['header' => 'GERENCIAMENTO'],
        [
            'text' => 'Pedidos',
            'url' => '/admin/pedidos',
            'icon' => 'fas fa-shopping-bag',
            'can' => 'admin-access',
            'label' => 15, // Pedidos pendentes
            'label_color' => 'info',
        ],
        [
            'text' => 'Produtos',
            'url' => '/admin/produtos',
            'icon' => 'fas fa-boxes',
            'can' => 'admin-access',
        ],
        [
            'text' => 'Estoque',
            'url' => '/admin/estoque',
            'icon' => 'fas fa-warehouse',
            'can' => 'admin-access',
        ],
        [
            'text' => 'Clientes',
            'url' => '/admin/clientes',
            'icon' => 'fas fa-users',
            'can' => 'admin-access',
        ],
        [
            'text' => 'Relatórios',
            'url' => '/admin/relatorios',
            'icon' => 'fas fa-chart-bar',
            'can' => 'admin-access',
        ],

        // MINHA CONTA
        ['header' => 'MINHA CONTA'],
        [
            'text' => 'Meus Pedidos',
            'url' => '/minha-conta/pedidos',
            'icon' => 'fas fa-clipboard-list',
        ],
        [
            'text' => 'Meus Favoritos',
            'url' => '/minha-conta/favoritos',
            'icon' => 'fas fa-heart',
        ],
        [
            'text' => 'Meus Dados',
            'url' => '/minha-conta/dados',
            'icon' => 'fas fa-user-cog',
        ],
        [
            'text' => 'Endereços',
            'url' => '/minha-conta/enderecos',
            'icon' => 'fas fa-map-marker-alt',
        ],

        // SUPORTE
        ['header' => 'SUPORTE'],
        [
            'text' => 'Central de Ajuda',
            'url' => '/ajuda',
            'icon' => 'fas fa-question-circle',
        ],
        [
            'text' => 'Trocas e Devoluções',
            'url' => '/trocas-devolucoes',
            'icon' => 'fas fa-exchange-alt',
        ],
        [
            'text' => 'Fale Conosco',
            'url' => '/contato',
            'icon' => 'fas fa-envelope',
        ],
        [
            'text' => 'Sobre Nós',
            'url' => '/sobre',
            'icon' => 'fas fa-info-circle',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
