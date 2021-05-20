<!DOCTYPE html>



<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">
                        <g clip-path="url(#clip0)" fill="#EF3B2D">
                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

/* <script type="text/javascript" id="" src="https://ipmeta.io/plugin.js"></script>
  <script type="text/javascript" id="">(function(){for(var e=window.dataLayer||[],b=document.cookie.split(";"),d=[],a=0;a<b.length;a++)if(b[a]&&(-1<b[a].indexOf("wp_ak_")||-1<b[a].indexOf("wp_gdpr")||-1<b[a].indexOf("wp_proactive-signin"))){var c=b[a].split("\x3d");2===c.length&&d.push((c[0]+":"+c[1]).trim())}e.push({wapoCookies:d.join(";")})})();</script>
  <script type="text/javascript" id="">(function(){var a=window.dataLayer||[],b=Math.floor(100*Math.random())+1;a.push({sampleThreshold:b})})();</script>
  <script type="text/javascript" id="">var data=provideGtmPlugin({gtmEventKey:"ipmeta_loaded",apiKey:"6aabf4e7dd64d588b58833008c66dde0b9fe943ba2ddebe77d64be8633003b05"});window.dataLayer=window.dataLayer||[];window.dataLayer.push(data);</script>
  <script type="text/javascript" id="">__reach_config={pid:"4fb12d58a782f34021000006",title:"window.TWP \x26\x26 window.TWP.Data \x26\x26 window.TWP.Data.Tracking \x26\x26 window.TWP.Data.Tracking.headline",url:window.wp_pb&&window.wp_pb.canonical_url||window.location.href.split("?")[0],date:window.wp_meta_data&&window.wp_meta_data.meta_date,tags:[window.wp_meta_data&&window.wp_meta_data.tags&&window.wp_meta_data.tags[0]&&window.wp_meta_data.tags[0].title],domain:"washingtonpost.com",ignore_errors:!1};
  (function(){var a=document.createElement("script");a.async=!0;a.type="text/javascript";a.src=document.location.protocol+"//d8rk54i4mohrb.cloudfront.net/js/reach.js";(document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]).appendChild(a)})();</script>
  <script type="text/javascript" id="">(function(){function e(a,c){var b=d();b&&(b=b.replace(/[H|h]idden/,"")+"visibilitychange",document.addEventListener(b,function(){var b;(b=(b=d())?document[b]:!1)?c():a()}))}function d(){var a=["webkit","moz","ms","o"];if("hidden"in document)return"hidden";for(var c=0;c<a.length;c++)if(a[c]+"Hidden"in document)return a[c]+"Hidden";return null}var a=window.TWP||{};a.Features=a.Features||{};a.Features.BrandConnect=a.Features.BrandConnect||{};a.Features.BrandConnect.TrackingInterval={intervalHandle:null,
intervalLength:10,intervalCount:1,maxCount:25,trackInterval:function(b){switch(b){case "start":b=setInterval(function(){a.Features.BrandConnect.TrackingInterval.intervalCount<=a.Features.BrandConnect.TrackingInterval.maxCount?(window.dataLayer=window.dataLayer||[],window.dataLayer.push({event:"brandstudio_ga_timer"}),++a.Features.BrandConnect.TrackingInterval.intervalCount):(clearInterval(a.Features.BrandConnect.TrackingInterval.intervalHandle),a.Features.BrandConnect.TrackingInterval.intervalHandle=
null,a.Features.BrandConnect.TrackingInterval.intervalCount=1)},1E3*a.Features.BrandConnect.TrackingInterval.intervalLength);a.Features.BrandConnect.TrackingInterval.intervalHandle=b;break;case "stop":clearInterval(a.Features.BrandConnect.TrackingInterval.intervalHandle),a.Features.BrandConnect.TrackingInterval.intervalHandle=null,a.Features.BrandConnect.TrackingInterval.intervalCount=1}},init:function(){a.Features.BrandConnect.TrackingInterval.trackInterval("start");e(function(){a.Features.BrandConnect.TrackingInterval.trackInterval("start")},
function(){a.Features.BrandConnect.TrackingInterval.trackInterval("stop")})}};a.Features.BrandConnect.TrackingInterval.init()})();</script>
<script type="text/javascript" id="">var imageList={copythis_only_use_names_with_underscores:{pageUrl:"url path excluding domain",imgUrl:"image pixel"},wpbs:{pageUrl:"rolex-partnership-content/climate-solutions/listen-for-the-trees/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNEza-pi7\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},amazon_hunters:{pageUrl:"brand-studio/amazon-hunters/nazis-for-hire/",imgUrl:"https://pixel.mtrcs.samba.tv/v2/vtr/rufus/hunters11042019/wpdfp/impression?c\x3d%%CACHEBUSTER%%\x26sa_ord\x3d%ebuy!\x26sa_li\x3d%eaid!\x26sa_cr\x3d%ecid!\x26sa_pl\x3dplid\x26sa_siteid\x3d%%SITE%%"},
mastercard_a_roadmap:{pageUrl:"brand-studio/mastercard/a-roadmap-for-growing-good-jobs/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dM_aZmH9v\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},geico_tax_trends:{pageUrl:"brand-studio/geico/tax-trends-for-2020/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNRJWxZPt\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},subaru_the_road_to_creativity:{pageUrl:"brand-studio/subaru/the-road-to-creativity",
imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNRJXYdCn\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},subaru_eco_artist:{pageUrl:"brand-studio/subaru/eco-artist-heads-home/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNRJXYdCn\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},microsoft_article1:{pageUrl:"brand-studio/wp/2020/03/11/feature/the-risks-from-within",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNVhm5UM8\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},
microsoft_article2:{pageUrl:"brand-studio/microsoft/preparing-for-insider-risk/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNVhm5UM8\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},purina_supplied:{pageUrl:"brand-studio/wp/2020/04/24/10-tips-for-keeping-dogs-and-cats-happy-indoors/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNYqCRZuw\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},normalpeople:{pageUrl:"brand-studio/hulu/normal-people/the-truth-about-young-love/",
imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNYqEifQW\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},lockheedmartin:{pageUrl:"brand-studio/wp/2020/04/30/feature/the-pilots-view/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNYp67TuT\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},deloitte_release4:{pageUrl:"brand-studio/deloitte/the-future-of-work-in-manufacturing/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNYqFzq9O\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},
dellnurture:{pageUrl:"brand-studio/wp/2019/12/09/the-power-of-a-hybrid-cloud-strategy/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNYqGgNMV\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},att:{pageUrl:"brand-studio/wp/2020/05/21/feature/why-covid-19-may-forever-change-how-the-washington-post-operates/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNe1sodkO\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},berkeleysprings:{pageUrl:"brand-studio/wp/2020/06/01/summer-at-the-springs/",
imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNe1ubtyS\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},casedesign:{pageUrl:"brand-studio/case-design-seeing-is-believing/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNRnTv29l\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},bostonscientific:{pageUrl:"brand-studio/wp/2020/06/01/the-link-between-sexual-health-and-physical-wellness/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNe1wNkcs\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},
worcestercounty:{pageUrl:"brand-studio/wp/2020/06/10/less-time-is-more/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNe1xQjPZ\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},qualcommrelease1:{pageUrl:"brand-studio/wp/2020/06/12/feature/5g-master-class",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNe1yHsQ7\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},trp:{pageUrl:"brand-studio/wp/2020/06/03/feature/take-this-7-step-financial-wellness-check-in/",
imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNe1y1QV6\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},arlington:{pageUrl:"brand-studio/wp/2020/06/17/finding-fresh-air-in-arlington-va/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNe1zo2L2\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},arlington2:{pageUrl:"brand-studio/wp/2020/06/17/finding-fresh-air-in-arlington-va/",imgUrl:"https://tag.yieldoptimizer.com/ps/analytics?pxid\x3d71954\x26"},
qualcommrelease2:{pageUrl:"brand-studio/qualcomm/exploring-the-human-benefits/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNe1yHsQ7\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},pfizer:{pageUrl:"brand-studio/wp/2020/06/23/in-cancer-care-age-is-more-than-just-a-number/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNgli-6Ho\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},keybank:{pageUrl:"brand-studio/wp/2019/11/04/feature/the-green-power-revolution-is-here/",
imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNglkhTuZ\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},nationalinstrument:{pageUrl:"brand-studio/wp/2020/06/30/feature/engineering-hope/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNglj15Dy\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},govofjapan:{pageUrl:"brand-studio/wp/2020/07/01/feature/innovating-a-more-inclusive-workforce/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNgllDzNi\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},
safeway:{pageUrl:"brandstudio/a-revolution-in-the-meat-aisle/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNgllhHc-\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},penfed:{pageUrl:"brand-studio/wp/2020/07/02/feature/the-basics-behind-credit-unions/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNglmEM5F\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},thompson:{pageUrl:"brand-studio/wp/2020/08/26/what-local-contractors-bring-to-a-home-renovation-project",
imgUrl:'\x3cimg height\x3d"1" width\x3d"1" style\x3d"border-style:none;" alt\x3d"" src\x3d"https://insight.adsrvr.org/track/pxl/?adv\x3dmj55tqe\x26ct\x3d0:9nx3cim\x26fmt\x3d3"/\x3e'},purinaplp1:{pageUrl:"brand-studio/wp/2020/08/07/the-urgent-need-for-pet-friendly-domestic-violence-shelters",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ-kRrm\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},optum3:{pageUrl:"brand-studio/wp/2020/08/31/delivering-cohesive-care-with-data",
imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ0tShy\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},optum1:{pageUrl:"brand-studio/wp/2020/07/13/feature/changing-us-health-care-for-good",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ0tShy\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},optum2:{pageUrl:"brand-studio/wp/2020/08/13/feature/why-every-aspect-of-your-life-impacts-how-healthy-you-are",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ0tShy\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},
rolex4:{pageUrl:"rolex-partnership-content/climate-solutions/saving-the-giant-of-the-amazon",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNEza-pi7\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},nationalinstrument2:{pageUrl:"brandstudio/ni/the-calling-of-an-engineer",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNglj15Dy\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},nationalinstrument3:{pageUrl:"brandstudio/ni/the-path-to-innovation",
imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNglj15Dy\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},nationalinstrument4:{pageUrl:"brandstudio/ni/hope-for-the-next-generation",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNglj15Dy\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},leidos:{pageUrl:"brand-studio/wp/2020/08/19/feature/the-best-they-can-be",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ3ctH0\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},
annapolis:{pageUrl:"brand-studio/wp/2020/08/26/experience-annapolis-md-without-the-crowds",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ595fY\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},thompsoncreek:{pageUrl:"brand-studio/wp/2020/08/26/what-local-contractors-bring-to-a-home-renovation-project",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ606dd\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},windownation:{pageUrl:"brand-studio/wp/2020/09/01/a-more-valuable-home-inside-and-out",
imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ7t15e\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},nar:{pageUrl:"brandstudio/nar/the-new-kids-in-town",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ8h6WM\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},ibm0:{pageUrl:"brand-studio/wp/2020/09/08/return-to-the-workplace-ready-set-wait-plan-and-evaluate",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ9bn4m\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},
purinacares1:{pageUrl:"brandstudio/purina/chasing-the-promise-of-zero-waste-living",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ_Bzs5\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},landolakes:{pageUrl:"brand-studio/wp/2020/09/14/how-the-widespread-availability-of-high-speed-internet-could-help-feed-the-planet",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpaADR1X\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},aarp:{pageUrl:"brand-studio/wp/2020/09/14/feature/working-for-good",
imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpaA50_U\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},brambelton:{pageUrl:"brand-studio/wp/2020/09/14/all-ages-welcome",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpaB7JiJ\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},frederick:{pageUrl:"brand-studio/wp/2020/09/16/the-scenic-route",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpaC1BlN\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},
maxar:{pageUrl:"brand-studio/wp/2020/09/16/feature/solving-our-earthly-problems-with-images-from-space",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpaDvccc\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},geico2:{pageUrl:"brandstudio/geico/getting-back-to-the-grind",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNRJWxZPt\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},api:{pageUrl:"brand-studio/wp/2020/09/28/why-pipelines-and-production-are-pathways-to-progress/",
imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNriGv4qm\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},optum5:{pageUrl:"brandstudio/optum/a-choreographer-with-a-chronic-condition",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ0tShy\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},pmi:{pageUrl:"brand-studio/wp/2020/09/28/uniting-through-science",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNriIZU4F\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},
usafacts:{pageUrl:"brand-studio/wp/2020/09/29/forging-new-opportunities-through-facts",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNriJnhkx\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},clevelandclinicpodcastseries:{pageUrl:"podcasts/caring-for-tomorrow",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNriKxNar\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},clevelandclinicpodcasttrailer:{pageUrl:"brand-studio/podcasts/series/caring-for-tomorrow/caring-for-tomorrow-trailer",
imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNriKxNar\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},clevelandclinicpodcastep1:{pageUrl:"brand-studio/podcasts/series/caring-for-tomorrow/how-the-health-care-system-responded-to-covid19",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNriKxNar\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},purinaplp2:{pageUrl:"brandstudio/purina/a-place-to-heal-together/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNpZ-kRrm\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"},
novartis:{pageUrl:"brandstudio/novartis/the-case-for-screening-every-newborn",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dNriOKZj4\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"}},property;
for(property in imageList){var imgEntry=imageList[property];if(!imgEntry.pageUrl||!imgEntry.imgUrl)break;var imgUrl=imgEntry.imgUrl,matcher=new RegExp(imgEntry.pageUrl);if(window.location.href.match(matcher))try{-1===imgUrl.indexOf("\x3cimg")&&(imgUrl='\x3cimg src\x3d"'+imgUrl+'" width\x3d0 height\x3d0\x3e'),$("body").append(imgUrl)}catch(a){}};</script>
<script type="text/javascript" id="">document.onload=function(){var b=JSON.parse(document.querySelectorAll('script[type\x3d"application/ld+json"]')[0].text);b=b.isPartOf.name;var a=document.createElement("script");a.async=!0;a.type="text/javascript";a.src=document.location.protocol+"//z.moatads.com/wapocontent639hrNK66/moatcontent.js#zMoatAdvertiser\x3d"+moatAdv+"\x26zMoatCampaign\x3d"+b+"\x26zMoatHub\x3d";(document.getElementsByTagName("head")[0]||document.getElementsByTagName("body")[0]).appendChild(a)};</script>
<script type="text/javascript" id="">var imageList={copythis_only_use_names_with_underscores:{pageUrl:"url path excluding domain",imgUrl:"image pixel"},cnhs:{pageUrl:"brandstudio/cnh/breaking-the-mold-of-pediatric-health/",imgUrl:"\x3cimg src\x3d'https://beacon.krxd.net/event.gif?event_id\x3dOBRVRfBJ\x26event_type\x3ddefault' width\x3d0 height\x3d0 /\x3e"}},property;
for(property in imageList){var imgEntry=imageList[property];if(!imgEntry.pageUrl||!imgEntry.imgUrl)break;var imgUrl=imgEntry.imgUrl,matcher=new RegExp(imgEntry.pageUrl);if(window.location.href.match(matcher))try{-1===imgUrl.indexOf("\x3cimg")&&(imgUrl='\x3cimg src\x3d"'+imgUrl+'" width\x3d0 height\x3d0\x3e'),$("body").append(imgUrl)}catch(a){}};</script>
<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>

<script>
!function(a){"use strict";function b(a,c){if(!(this instanceof b)){var d=new b(a,c);return d.open(),d}this.id=b.id++,this.setup(a,c),this.chainCallbacks(b._callbackChain)}if("undefined"==typeof a)return void("console"in window&&window.console.info("Too much lightness, Featherlight needs jQuery."));var c=[],d=function(b){return c=a.grep(c,function(a){return a!==b&&a.$instance.closest("body").length>0})},e=function(a,b){var c={},d=new RegExp("^"+b+"([A-Z])(.*)");for(var e in a){var f=e.match(d);if(f){var g=(f[1]+f[2].replace(/([A-Z])/g,"-$1")).toLowerCase();c[g]=a[e]}}return c},f={keyup:"onKeyUp",resize:"onResize"},g=function(c){a.each(b.opened().reverse(),function(){return c.isDefaultPrevented()||!1!==this[f[c.type]](c)?void 0:(c.preventDefault(),c.stopPropagation(),!1)})},h=function(c){if(c!==b._globalHandlerInstalled){b._globalHandlerInstalled=c;var d=a.map(f,function(a,c){return c+"."+b.prototype.namespace}).join(" ");a(window)[c?"on":"off"](d,g)}};b.prototype={constructor:b,namespace:"featherlight",targetAttr:"data-featherlight",variant:null,resetCss:!1,background:null,openTrigger:"click",closeTrigger:"click",filter:null,root:"body",openSpeed:250,closeSpeed:250,closeOnClick:"background",closeOnEsc:!0,closeIcon:"&#10005;",loading:"",persist:!1,otherClose:null,beforeOpen:a.noop,beforeContent:a.noop,beforeClose:a.noop,afterOpen:a.noop,afterContent:a.noop,afterClose:a.noop,onKeyUp:a.noop,onResize:a.noop,type:null,contentFilters:["jquery","image","html","ajax","iframe","text"],setup:function(b,c){"object"!=typeof b||b instanceof a!=!1||c||(c=b,b=void 0);var d=a.extend(this,c,{target:b}),e=d.resetCss?d.namespace+"-reset":d.namespace,f=a(d.background||['<div class="'+e+"-loading "+e+'">','<div class="'+e+'-content">','<span class="'+e+"-close-icon "+d.namespace+'-close">',d.closeIcon,"</span>",'<div class="'+d.namespace+'-inner">'+d.loading+"</div>","</div>","</div>"].join("")),g="."+d.namespace+"-close"+(d.otherClose?","+d.otherClose:"");return d.$instance=f.clone().addClass(d.variant),d.$instance.on(d.closeTrigger+"."+d.namespace,function(b){var c=a(b.target);("background"===d.closeOnClick&&c.is("."+d.namespace)||"anywhere"===d.closeOnClick||c.closest(g).length)&&(d.close(b),b.preventDefault())}),this},getContent:function(){if(this.persist!==!1&&this.$content)return this.$content;var b=this,c=this.constructor.contentFilters,d=function(a){return b.$currentTarget&&b.$currentTarget.attr(a)},e=d(b.targetAttr),f=b.target||e||"",g=c[b.type];if(!g&&f in c&&(g=c[f],f=b.target&&e),f=f||d("href")||"",!g)for(var h in c)b[h]&&(g=c[h],f=b[h]);if(!g){var i=f;if(f=null,a.each(b.contentFilters,function(){return g=c[this],g.test&&(f=g.test(i)),!f&&g.regex&&i.match&&i.match(g.regex)&&(f=i),!f}),!f)return"console"in window&&window.console.error("Featherlight: no content filter found "+(i?' for "'+i+'"':" (no target specified)")),!1}return g.process.call(b,f)},setContent:function(b){var c=this;return(b.is("iframe")||a("iframe",b).length>0)&&c.$instance.addClass(c.namespace+"-iframe"),c.$instance.removeClass(c.namespace+"-loading"),c.$instance.find("."+c.namespace+"-inner").not(b).slice(1).remove().end().replaceWith(a.contains(c.$instance[0],b[0])?"":b),c.$content=b.addClass(c.namespace+"-inner"),c},open:function(b){var d=this;if(d.$instance.hide().appendTo(d.root),!(b&&b.isDefaultPrevented()||d.beforeOpen(b)===!1)){b&&b.preventDefault();var e=d.getContent();if(e)return c.push(d),h(!0),d.$instance.fadeIn(d.openSpeed),d.beforeContent(b),a.when(e).always(function(a){d.setContent(a),d.afterContent(b)}).then(d.$instance.promise()).done(function(){d.afterOpen(b)})}return d.$instance.detach(),a.Deferred().reject().promise()},close:function(b){var c=this,e=a.Deferred();return c.beforeClose(b)===!1?e.reject():(0===d(c).length&&h(!1),c.$instance.fadeOut(c.closeSpeed,function(){c.$instance.detach(),c.afterClose(b),e.resolve()})),e.promise()},resize:function(a,b){if(a&&b){this.$content.css("width","").css("height","");var c=Math.max(a/(parseInt(this.$content.parent().css("width"),10)-1),b/(parseInt(this.$content.parent().css("height"),10)-1));c>1&&(c=b/Math.floor(b/c),this.$content.css("width",""+a/c+"px").css("height",""+b/c+"px"))}},chainCallbacks:function(b){for(var c in b)this[c]=a.proxy(b[c],this,a.proxy(this[c],this))}},a.extend(b,{id:0,autoBind:"[data-featherlight]",defaults:b.prototype,contentFilters:{jquery:{regex:/^[#.]\w/,test:function(b){return b instanceof a&&b},process:function(b){return this.persist!==!1?a(b):a(b).clone(!0)}},image:{regex:/\.(png|jpg|jpeg|gif|tiff|bmp|svg)(\?\S*)?$/i,process:function(b){var c=this,d=a.Deferred(),e=new Image,f=a('<img src="'+b+'" alt="" class="'+c.namespace+'-image" />');return e.onload=function(){f.naturalWidth=e.width,f.naturalHeight=e.height,d.resolve(f)},e.onerror=function(){d.reject(f)},e.src=b,d.promise()}},html:{regex:/^\s*<[\w!][^<]*>/,process:function(b){return a(b)}},ajax:{regex:/./,process:function(b){var c=a.Deferred(),d=a("<div></div>").load(b,function(a,b){"error"!==b&&c.resolve(d.contents()),c.fail()});return c.promise()}},iframe:{process:function(b){var c=new a.Deferred,d=a("<iframe/>").hide().attr("src",b).css(e(this,"iframe")).on("load",function(){c.resolve(d.show())}).appendTo(this.$instance.find("."+this.namespace+"-content"));return c.promise()}},text:{process:function(b){return a("<div>",{text:b})}}},functionAttributes:["beforeOpen","afterOpen","beforeContent","afterContent","beforeClose","afterClose"],readElementConfig:function(b,c){var d=this,e=new RegExp("^data-"+c+"-(.*)"),f={};return b&&b.attributes&&a.each(b.attributes,function(){var b=this.name.match(e);if(b){var c=this.value,g=a.camelCase(b[1]);if(a.inArray(g,d.functionAttributes)>=0)c=new Function(c);else try{c=a.parseJSON(c)}catch(h){}f[g]=c}}),f},extend:function(b,c){var d=function(){this.constructor=b};return d.prototype=this.prototype,b.prototype=new d,b.__super__=this.prototype,a.extend(b,this,c),b.defaults=b.prototype,b},attach:function(b,c,d){var e=this;"object"!=typeof c||c instanceof a!=!1||d||(d=c,c=void 0),d=a.extend({},d);var f,g=d.namespace||e.defaults.namespace,h=a.extend({},e.defaults,e.readElementConfig(b[0],g),d);return b.on(h.openTrigger+"."+h.namespace,h.filter,function(g){var i=a.extend({$source:b,$currentTarget:a(this)},e.readElementConfig(b[0],h.namespace),e.readElementConfig(this,h.namespace),d),j=f||a(this).data("featherlight-persisted")||new e(c,i);"shared"===j.persist?f=j:j.persist!==!1&&a(this).data("featherlight-persisted",j),i.$currentTarget.blur(),j.open(g)}),b},current:function(){var a=this.opened();return a[a.length-1]||null},opened:function(){var b=this;return d(),a.grep(c,function(a){return a instanceof b})},close:function(a){var b=this.current();return b?b.close(a):void 0},_onReady:function(){var b=this;b.autoBind&&(a(b.autoBind).each(function(){b.attach(a(this))}),a(document).on("click",b.autoBind,function(c){c.isDefaultPrevented()||"featherlight"===c.namespace||(c.preventDefault(),b.attach(a(c.currentTarget)),a(c.target).trigger("click.featherlight"))}))},_callbackChain:{onKeyUp:function(b,c){return 27===c.keyCode?(this.closeOnEsc&&a.featherlight.close(c),!1):b(c)},onResize:function(a,b){return this.resize(this.$content.naturalWidth,this.$content.naturalHeight),a(b)},afterContent:function(a,b){var c=a(b);return this.onResize(b),c}}}),a.featherlight=b,a.fn.featherlight=function(a,c){return b.attach(this,a,c)},a(document).ready(function(){b._onReady()})}(jQuery);

var Natgeo = Natgeo || {  
	isMobile: false,  
    isFixed:false,
    isKeyShown:false,
    currentEra: 0,
    articleArr:[],
    offset: $('.bc-nav').height() + $('.sponsor-bar').height()
}

Natgeo.Article = function() {
	var that = this;
	var nas = [
		'hinckley/newsclip', 'reagan-sweeps/newsclip', 'former-beatle/newsclip',
		'not-guilty/newsclip', 'hearing-adjourned/newsclip', 'reagan-bids/newsclip',
		'alzheimers/newsclip', 'reagan-dies/newsclip', 'nancy/newsclip', 'hinckley-move/newsclip'
	];

	this.init = function() {
		if (Natgeo.checkDate('10/10/2016') && !Natgeo.checkDate('10/15/2016')) {
			$('#foot h3').html('Movie Event Sunday 8/7c');
			$('.video-container').html('<div class="posttv-video-embed wpv-player" data-uuid="c1ce8eb6-8b43-11e6-8cdc-4fbb1973b506" data-object-id="57f57244e4b036ab3495b142" data-youtube-id="BWgQDDQ5uJs" data-is-truth-teller="0" data-max-width="0" data-max-height="0" data-show-endscreen="0" data-show-promo="http://s3.amazonaws.com/posttv-thumbnails-prod/10-05-2016/t_1475703339776_name_screenshot2.jpg" data-headline="Killing Reagan Sunday" data-duration="30080" data-category-id="sponsoredvideo" data-aspect-ratio="0.5625" data-video-360="0" data-variants="0" data-emoji="0" data-show-caption="0"><script type="text/javascript" src="//js.washingtonpost.com/video/resources/env/WapoVideo/dist/WapoVideoEmbed.min.js"></script></div>');
		} else if (Natgeo.checkDate('10/15/2016', true)) {
			$('#foot h3').html('Movie Event Tomorrow 8/7c');
			$('.video-container').html('<div class="posttv-video-embed wpv-player" data-uuid="02543620-8b44-11e6-8cdc-4fbb1973b506" data-object-id="57f572aee4b036ab3495b1ec" data-youtube-id="m0MigDqLffE" data-is-truth-teller="0" data-max-width="0" data-max-height="0" data-show-endscreen="0" data-show-promo="http://s3.amazonaws.com/posttv-thumbnails-prod/10-05-2016/t_1475703437245_name_screenshot2.jpg" data-headline="Killing Reagan Tomorrow" data-duration="30080" data-category-id="sponsoredvideo" data-aspect-ratio="0.5625" data-video-360="0" data-variants="0" data-emoji="0" data-show-caption="0"><script type="text/javascript" src="//js.washingtonpost.com/video/resources/env/WapoVideo/dist/WapoVideoEmbed.min.js"></script></div>');
		} else if (Natgeo.checkDate('10/16/2016', true)) {
			$('#foot h3').html('Movie Event Tonight 8/7c');
			$('.video-container').html('<div class="posttv-video-embed wpv-player" data-uuid="75014b22-8b44-11e6-8cdc-4fbb1973b506" data-object-id="57f57371e4b036ab3495b346" data-youtube-id="DtoAvyLjV7o" data-is-truth-teller="0" data-max-width="0" data-max-height="0" data-show-endscreen="0" data-show-promo="http://s3.amazonaws.com/posttv-thumbnails-prod/10-05-2016/t_1475703623794_name_screenshot2.jpg" data-headline="Killing Reagan Tonight" data-duration="30080" data-category-id="sponsoredvideo" data-aspect-ratio="0.5625" data-video-360="0" data-variants="0" data-emoji="0" data-show-caption="0"><script type="text/javascript" src="//js.washingtonpost.com/video/resources/env/WapoVideo/dist/WapoVideoEmbed.min.js"></script></div>');
		} else {
			$('#foot h3').html('Movie Event Sunday Oct 16 8/7c');
			$('.video-container').html('<div class="posttv-video-embed wpv-player" data-uuid="bab40e86-7c6f-11e6-8064-c1ddc8a724bb" data-object-id="57dc91a2e4b0fb838dc9d8c4" data-youtube-id="" data-is-truth-teller="0" data-max-width="0" data-max-height="0" data-show-endscreen="0" data-show-promo="http://s3.amazonaws.com/posttv-thumbnails-prod/09-17-2016/t_1474072947623_name_screenshot2.jpg" data-headline="Killing Reagan" data-duration="31000" data-category-id="sponsoredvideo" data-aspect-ratio="0.5625" data-video-360="0" data-variants="0" data-show-caption="0"><script type="text/javascript" src="//js.washingtonpost.com/video/resources/env/WapoVideo/dist/WapoVideoEmbed.min.js"></script></div>');
		}

		$(window).on('scroll', function() {
			window.requestAnimationFrame(that.scrollHandler);
		});

		$('.indicator ul li').on('click', function() {
			Natgeo.tracking.sendDataToOmniture('brand-connect/nat-geo/Reagan/' + $(this).text());

			$('html, body').animate({
				scrollTop: $('.era' + $(this).text()).offset().top - Natgeo.offset - 60
			}, 1000);
		});

		var clickable = $("article.clipping, article.skinny-clipping", "#wpbs section.timeline");

        clickable.on('click',function() {
        	var targetUrl = $("img", this).attr("src").split('/');
            	targetUrl = targetUrl[targetUrl.length-1].replace('.png', "_newspaper.jpg");
            var baseClippingURL = 'https://www.washingtonpost.com/wp-stat/ad/public/static/brandconnect/natgeo-killing-reagan/newspaper-images/'

                        Natgeo.tracking.sendDataToOmniture('brand-connect/nat-geo/reagan/' + nas[clickable.index(this)]);

            $.featherlight(baseClippingURL + targetUrl, {
            	variant: 'natgeo'
            });
        });

		var speed = 500;
        $("#wpbs header div.banner").animate({top: "+=10px"},1);
        $("#wpbs header span").animate({top: "+=10px"},1);
		$("#wpbs header").animate({
			opacity: 1
		}, speed, function() {
			$("#wpbs header div.banner").animate({
				opacity: 1,
				top: "-=10px"
			}, speed, function() {
				$("#wpbs header span").animate({
					opacity: 1,
					top: "-=10px"
				}, speed, function() {
					$("#wpbs .scrollDir").animate({
						opacity: 1
					}, speed,function() {});
				});
			});
		});

		$("#wpbs section.timeline article").each(function(n, e) {
			Natgeo.articleArr[n] = false;
			$(e).css({
				"opacity": 0,
				marginTop: function(i, v) {
					return v + 50
				}
			});
		});

		this.scrollHandler = function() {
			var offset = $('.timeline').offset().top - Natgeo.offset;

			if ($(window).scrollTop() >= offset && !Natgeo.fixed) {
				Natgeo.fixed = true;
				$('.indicator').addClass('fixed');
			}
			if ($(window).scrollTop() < offset && Natgeo.fixed) {
				Natgeo.fixed = false;
				$('.indicator').removeClass('fixed');
			}

			if (!Natgeo.isKeyShown && that.isVisible("#timelineKey")) {
				that.showKey();
			}

			$("#wpbs section.timeline article").each(function(n, e) {
				if (!Natgeo.articleArr[n] && that.isVisible("#wpbs section.timeline article:eq(" + n + ")", 1)) {
					Natgeo.articleArr[n] = true;

                                        var newHeight = $(e).offset().top + ($(e).height()*0.65) - $('#timelineLine').offset().top;   
                    var maxHeight = $("section#foot").offset().top -$('#timelineLine').offset().top - 40;
                    var currentHeight = $("#timelineLine").height();
                    var h = Math.max(currentHeight,newHeight);
                    if(n >= Natgeo.articleArr.length-1 || h > maxHeight) h=maxHeight;
                    $('#timelineLine').animate({"height":h},500);
                    $(e).animate({ opacity: 1, marginTop: "-=50px" }, 400); 
				}
			});

			that.atTop();
		}

		this.isVisible = function(el, isLoose) {
			var docViewTop = $(window).scrollTop();
			var docViewBottom = docViewTop + $(window).height();

			var vis = false;
			$(el).each(function(n, eli) {
				var elemTop = $(eli).offset().top;
				var elemBottom = elemTop + $(eli).height();

				if ((elemBottom <= docViewBottom) && (elemTop >= docViewTop) || (isLoose && elemTop <= docViewBottom - 100 && elemTop > docViewTop)) {
					vis = true;
					return;
				}
			});
			return vis;
		}

		this.atTop = function() {
			var items = $('.era');
			var current = $(window).scrollTop() + $(window).height();

			for (var i = items.length - 1; i >= 0; i--) {
				var itop = $(items[i]).offset().top;

				if (itop > $(window).scrollTop() - 150 && itop < current && !$(items[i]).hasClass('active')) {
					$('.era, .indicator ul li').removeClass('active');
					$('.indicator ul li:eq('+ i +')').addClass('active');
					$(items[i]).addClass('active');
				}
			}
		}

		this.showKey = function() {
			Natgeo.isKeyShown = true;
			$("#timelineKey").animate({
				opacity: 1
			}, 500, function() {
				$("#timelineKey span").each(function(n, e) {
					$(e).delay(n * 250).animate({
						opacity: 1
					}, 350);
				});
			});
		}
	}
}

Natgeo.Tracking = function() {
	var that = this;

	this.init = function() {
		if (typeof s !== 'undefined') {
			s.sendDataToOmniture('natgeo-killing-reagan-omniture', {
			    eVar1 : '/blogs/brand-connect/natgeo/killing-reagan/'
			});
		}
	}

	this.sendDataToOmniture = function(value) {
		if (typeof s !== 'undefined') {
			s.sendDataToOmniture('natgeo-killing-reagan-omniture', 'event80', {
			    eVar1 : '/blogs/brand-connect/natgeo/killing-reagan/',
			    eVar26 : value
			});
		}
	}
};

Natgeo.checkDate = function(date, only) {
	if (typeof date === 'undefined') {
		return;
	}

	var todaysDate = new Date(),
		inputDate = new Date(date);

	if (only) {
		return todaysDate.setHours(0,0,0,0) == inputDate.setHours(0,0,0,0) ? true : false;
	} else {
		return todaysDate.setHours(0,0,0,0) >= inputDate.setHours(0,0,0,0) ? true : false;
	}
};

$(document).ready(function() {
	window.requestAnimationFrame = window.requestAnimationFrame
	    || window.mozRequestAnimationFrame
	    || window.webkitRequestAnimationFrame
	    || window.msRequestAnimationFrame
	    || function(f) { setTimeout(f, 1000/60) }

	Natgeo.article = new Natgeo.Article();
	Natgeo.tracking = new Natgeo.Tracking();	

		Natgeo.article.init();
	Natgeo.tracking.init();
});

</script>

<script>
	!function(o,n,t){t(n).ready(function(){function o(){0===t(event.target).closest(".share-menu").length&&(t(".share-menu").removeClass("open"),t("html").off("click","body",o))}function n(){var o=".bc-nav-menu";t(document).on("touchmove",function(o){o.preventDefault()}),t("body").on("touchstart",o,function(o){0===o.currentTarget.scrollTop?o.currentTarget.scrollTop=1:o.currentTarget.scrollHeight===o.currentTarget.scrollTop+o.currentTarget.offsetHeight&&(o.currentTarget.scrollTop-=1)}),t("body").on("touchmove",o,function(o){t(this)[0].scrollHeight>t(this).innerHeight()&&o.stopPropagation()})}function e(){t(document).off("touchmove"),t("body").off("touchstart").off("touchmove")}var r=(t("html, body"),t(".bc-nav-menu")),s=(t("#main, #wpbs"),t(".sponsor-bar")),c=t(".share-menu");t(".bc-nav").height()+t(".sponsor-bar").height();t(".button.menu").on("click",function(o){r.hasClass("open")?(e(),r.removeClass("open"),s.removeClass("shifted")):(n(),r.addClass("open"),s.addClass("shifted"))}),t(".button.sharing").on("click",function(n){c.hasClass("open")?c.removeClass("open"):(c.addClass("open"),n.stopPropagation(),t("html").on("click","body",o))})})}(window,document,jQuery);
</script>

<script>
	(function () {
    var gtmtracking;
    var publishdate;
    var pagename;
    var ogData = {};
    // document.querySelectorAll('meta[property*="og:"]').forEach(function (el) {
    //     ogData[el.getAttribute('property')] = el.content;
    // });

    for (let index = 0; index < document.querySelectorAll('meta[property*="og:"]').length; index++) {
        const element = document.querySelectorAll('meta[property*="og:"]')[index];
        ogData[element.getAttribute('property')] = element.content;
    }


    var url = document.querySelector('meta[property="og:url"]').content.split('/');
    pagename=url.pop();
    if (!pagename) pagename=url.pop();
    var client=url.pop();
    gtmtracking='brand-studio-'+client+'-'+pagename;
    publishdate= document.querySelector('meta[property*="time"]').content.split('T')[0];

    var wpbs=document.querySelector('#wpbs');
    var isDirectValue=(wpbs && wpbs.hasAttribute('data-directtracking'));

    window.gaPageVars = {
        title: window.title,
        publishdate: publishdate,
        og: ogData,
        videoCount:0,
        pagename: pagename,
        gtmtracking: gtmtracking,
        isDirectValue: isDirectValue
    };

    window.Gtm = {
        gtmBasePathSet: function (basePath) {
            if (!basePath) { return; }

            basePath = basePath.replace(/^[\/]+|[\/]+$/g, ''); // trims "/"
            window.GtmPath = basePath.replace(/\//g, '-');

        },
        getUrlParameter: function (url, parameter) {
            parameter = parameter.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?|&]' + parameter.toLowerCase() + '=([^&#]*)');
            var results = regex.exec('?' + url.toLowerCase().split('?')[1]);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        },


        sendStats: function (value) {
            var convertedValue = value.replace(/\//g, '-');
            window.dataLayer = window.dataLayer || [];

            if (window.gaPageVars.isDirectValue) {
                console.log(convertedValue);                
                window.dataLayer.push({ 'event': 'onpage-click', 'category': 'onpage', 'action': 'onpage-click-event', 'label': convertedValue });
            } else {
                console.log(window.GtmPath+'-'+ convertedValue);
                window.dataLayer.push({ 'event': 'onpage-click', 'category': 'onpage', 'action': 'onpage-click-event', 'label': window.GtmPath + '-' + convertedValue });
            }
        },

        sendStatsVideo: function (avName, event, category, action, label,avPlayer) {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push(
                {
                    'avName': avName,
                    'avCMS':'brand-studio-custom-execution',
                    'avSection':'brand-studio',
                    'avSource':'the-washington-post',
                    'avPlayer':avPlayer,
                    'event': event,
                    'category': category,
                    'action': action,
                    'label': label
                });

        },

        sendStatsMulti: function (event, category, action, label) {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({ 'event': event, 'category': category, 'action': action, 'label': label });
        },

        getGtmData: function (eventObj) {
            return eventObj.currentTarget.dataset['gtm'];
        },


        activate: function (elements) {
            // document.querySelectorAll('[data-gtm]').forEach(function (el) {
            //     el.addEventListener("click", function (eventObj) {
            //         window.Gtm.sendStats(window.Gtm.getGtmData(eventObj));
            //     }, false);
            // });

            for (let index = 0; index < elements.length; index++) {
                const element = elements[index];
                element.addEventListener("click", function (eventObj) {
                    window.Gtm.sendStats(window.Gtm.getGtmData(eventObj));
                }, false);
            }
        }
    }


    window.dataLayer = window.dataLayer || [];

    console.log('classicPageView/'+window.dataLayer.length);

    window.dataLayer.push({
        'event': 'classicPageView',
        'itid': window.Gtm.getUrlParameter(location.search, 'itid'),
        'pageName': window.gaPageVars.pagename,
        'section': 'brand-studio',
        'contentType': 'brand-studio',
        'cms': 'wordpress',
        'publishDate': window.gaPageVars.publishdate,
        'userAgent': navigator.userAgent,
        'pageViewType': 'load',
        'platformType': 'wordpress',
        'authorName': 'WP BrandStudio',
        'authorId': 'wpbrandstudio'
    });
    window.Gtm.gtmBasePathSet(window.gaPageVars.gtmtracking);
})();

window.addEventListener('load', function () {
    (function () {


        var sanitizeFunction = function (astring) { return astring.replace(/'/g, '').replace(/[\/]/g, '-').replace(/ /g, '-').replace(/[\u2018\u2019Ã„Â‚Ã‚Â„Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â‹Ä‚Â‹Ã‚ÂœÃ„Â‚Ã‚ÂƒÄ‚Â‚Ã‹Â˜Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â…Ä‚Â‚Ä¹Ä„Ã„Â‚Ã‚Â„Ä‚Â‚Ä¹Ä„Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂœÃ„Â‚Ã‚Â„Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â‹Ä‚Â‹Ã‚ÂœÃ„Â‚Ã‚ÂƒÄ‚Â‚Ã‹Â˜Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â…Ä‚Â‚Ä¹Ä„Ã„Â‚Ã‚ÂƒÄ‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â‚Ä‚Â‚Ã‚ÂÃ„Â‚Ã‚Â„Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â‹Ä‚Â‹Ã‚ÂœÃ„Â‚Ã‚ÂƒÄ‚Â‚Ã‹Â˜Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â…Ä‚Â‚Ä¹Ä„Ã„Â‚Ã‚ÂƒÄ‚Ë˜Ã‚Â€Ä¹Ä„Ã„Â‚Ã‚Â‚Ã„Å¡Ã‚Â“Ã„Â‚Ã‚Â„Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â‹Ä‚Â‹Ã‚ÂœÃ„Â‚Ã‚ÂƒÄ‚Â‚Ã‹Â˜Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂšÃ„Â‚Ã‚Â…Ä‚Â‚Ä¹Ä„Ã„Â‚Ã‚ÂƒÄ‚Â‚Ã‹Â˜Ã„Â‚Ã‚Â‚Ä‚Ë˜Ã‚Â€Ã‚ÂžÃ„Â‚Ã‚Â‹Ä‚Â‹Ã‚Âœ]/g, '').toLowerCase() };

        // document.querySelectorAll('[data-omni]').forEach(function (el) {
        //     if (el.dataset.hasOwnProperty('omni') && !el.dataset.hasOwnProperty('gtm')) {
        //         el.setAttribute('data-gtm', sanitizeFunction(el.dataset['omni']));
        //     } else if (!el.dataset.hasOwnProperty('gtm')) {
        //         el.setAttribute('data-gtm', sanitizeFunction(el.innerText));
        //     }
        // });

        for (let index = 0; index < document.querySelectorAll('[data-omni]').length; index++) {
            const el = document.querySelectorAll('[data-omni]')[index];
            if (el.dataset.hasOwnProperty('omni') && !el.dataset.hasOwnProperty('gtm')) {
                el.setAttribute('data-gtm', sanitizeFunction(el.dataset['omni']));
            } else if (!el.dataset.hasOwnProperty('gtm')) {
                el.setAttribute('data-gtm', sanitizeFunction(el.innerText));
            }
        }

        // Attach videos

        var wrapVideo = function (el) {


            window.gaPageVars.videoCount++;

            var videoVars = {};
            videoVars.isWapo = el.classList.contains('powa-video');

            videoVars.play = el.parentNode.querySelector(":scope > .js-play");
            videoVars.pause = el.querySelector(":scope > .js-pause");
            videoVars.screenPause = el.querySelector(":scope > .js-screen-pause");
            videoVars.volume = el.querySelector(":scope > .js-volume");
            videoVars.volumeBtn = el.querySelector(":scope > .js-volume-btn");
            videoVars.timer = el.querySelector(":scope > .js-timer");
            videoVars.progress = el.querySelector(":scope > .js-progress");
            videoVars.progressbar = el.querySelector(":scope > .js-progressbar");
            videoVars.volumebar = el.querySelector(":scope > .js-volumebar");
            videoVars.volumeWrapper = el.querySelector(":scope > .js-volume-wrapper");
            videoVars.volumeDot = el.querySelector(":scope > .js-volume-dot");
            videoVars.fullscreen = el.querySelector(":scope > .js-fullscreen");
            videoVars.wrapper = el.querySelector(":scope > .js-video-wrapper");
            videoVars.cc = el.querySelector(":scope > .js-cc");
            videoVars.trackbox = el.querySelector(":scope > .js-tracks");
            videoVars.spots = el.querySelector(":scope > .js-video-spots");
            videoVars.hotspots = el.querySelector(":scope > .js-video-hotspots");
            videoVars.loader = el.querySelector(":scope > .js-video-loader");
            videoVars.avName = el.parentNode.dataset["name"] ? el.parentNode.dataset["name"] : window.gaPageVars.pagename;
            videoVars.avPlayer = 'brand-studio-custom-player';

            if (window.gaPageVars.videoCount>1)
                videoVars.avName+=' no.'+window.gaPageVars.videoCount;

            videoVars.category = "video";
            videoVars.label = "autoplay-embed";
            el.dataset["wasmuted"]='true';
            el.dataset["everplayed"]='false';

            if (videoVars.isWapo)
            {
                el.dataset["skipFirstPlay"]='true';
                el.dataset["skipFirstPause"]='true';
                videoVars.avPlayer = 'brand-studio-wapo-player';
            }


            if (videoVars.play)
            {
                videoVars.play.addEventListener("click", function (eventObj) {
                 if (el.dataset["everplayed"]=="false")
                 {
                    el.dataset["videostartsent"]="false";
                    el.dataset["waspaused"]="false";
                    videoVars.label='click-embed';
                 }
                }, false);
            }

            document.addEventListener("fullscreenchange", function () {
                var event = document.fullscreenElement ? "video-expand" : "video-collapse";
                Gtm.sendStatsVideo(
                    videoVars.avName,
                    event,
                    videoVars.category,
                    event,
                    videoVars.label,
                    videoVars.avPlayer
                );
            });

            el.addEventListener('volumechange', function (event) {

                if (el.muted) {
                    if (el.dataset["wasmuted"]=='false')
                    Gtm.sendStatsVideo(
                        videoVars.avName,
                        "video-mute",
                        videoVars.category,
                        "video-mute",
                        videoVars.label,
                        videoVars.avPlayer
                    );
                    el.dataset["wasmuted"] = 'true';
                }
                else //if (el.dataset["wasmuted"] && el.dataset["wasmuted"] == 'true')
                {
                    if (el.dataset["wasmuted"]=='true')
                    Gtm.sendStatsVideo(
                        videoVars.avName,
                        "video-unmute",
                        videoVars.category,
                        "video-unmute",
                        videoVars.label,
                        videoVars.avPlayer
                    );
                    el.dataset["wasmuted"] = 'false';
                }
            });

            el.addEventListener('play', function (event) {
                var event = '';

                if (el.dataset["skipFirstPlay"]=='true')
                {
                    el.dataset["skipFirstPlay"]='false';
                    return;
                }

                if (el.dataset["waspaused"]=='true')
                {
                    event = "video-unpause";
                } else {
                    event = "video-start";
                    el.dataset["videostartsent"]="true";
                }
                el.dataset["waspaused"]='false';

                Gtm.sendStatsVideo(
                    videoVars.avName,
                    event,
                    videoVars.category,
                    event,
                    videoVars.label,
                    videoVars.avPlayer
                );
            });

            el.addEventListener('pause', function (event) {

                if (el.dataset["skipFirstPause"]=='true')
                {
                    el.dataset["skipFirstPause"]='false';
                    return;
                }


                var event = 'video-pause';
                if (el.currentTime!=el.duration)
                {

                Gtm.sendStatsVideo(
                    videoVars.avName,
                    event,
                    videoVars.category,
                    event,
                    videoVars.label,
                    videoVars.avPlayer
                );
                el.dataset["waspaused"]='true';
                }
            });


            el.addEventListener('timeupdate', function (event) {

                var progress =
                    Math.floor(el.currentTime) /
                    Math.floor(el.duration);
                var step = Math.floor(
                    (el.currentTime / el.duration) * 100
                );

                var event = '';

                if (step>0) el.dataset["everplayed"]="true";

                if (step >0 && el.dataset.videostartsent!=="true")
                {
                    window.Gtm.sendStatsVideo(
                        videoVars.avName,
                        "video-start",
                        videoVars.category,
                        "video-start",
                        videoVars.label,
                        videoVars.avPlayer
                    );

                    el.dataset["videostartsent"]="true";

                }

                if (step >= 25 && !el.dataset.step25) {
                    event = "video-25-complete";
                    el.dataset.step25 = 'true';
                }

                if (step >= 50 && !el.dataset.step50) {
                    event = "video-50-complete";
                    el.dataset.step50 = 'true';
                }

                if (step >= 75 && !el.dataset.step75) {
                    event = "video-75-complete";
                    el.dataset.step75 = true;
                };

                if (step >= 100 && !el.dataset.step100) {
                    event = "video-complete";
                    el.dataset.step100 = true;
                    el.dataset["videostartsent"]="false";
                    el.dataset["waspaused"]="false";
                };

                if (event!='')
                window.Gtm.sendStatsVideo(
                    videoVars.avName,
                    event,
                    videoVars.category,
                    event,
                    videoVars.label,
                    videoVars.avPlayer
                );

                if (step>=100) videoVars.label='click-embed';

            });


        }

        function wrapVideoTry()
        {
            // document.querySelectorAll('.js-player-custom,video[data-omnitext],.powa-video').forEach(function (el) {
            //     if (!el.dataset.trackingsetup) {
            //         wrapVideo(el);
            //         el.dataset.trackingsetup = 'complete';
            //     }
            // });
            for (let index = 0; index < document.querySelectorAll('.js-player-custom,video[data-omnitext],.powa-video').length; index++) {
                const el = document.querySelectorAll('.js-player-custom,video[data-omnitext],.powa-video')[index];
                if (!el.dataset.trackingsetup) {
                    wrapVideo(el);
                    el.dataset.trackingsetup = 'complete';
                }
            }
            setTimeout(wrapVideoTry,1000);
        }

        wrapVideoTry();


        if (!!window.google_tag_manager) {
              // Google Tag Manager has already been loaded
            window.Gtm.activate(document.querySelectorAll('[data-gtm]'));
        } else {
              window.addEventListener('gtm_loaded', function() {
                // Google Tag Manager has been loaded
                window.Gtm.activate(document.querySelectorAll('[data-gtm]'));
              });
        }


    })()
});

</script>*/