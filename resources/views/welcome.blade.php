<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rice Project</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>

            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html {
                line-height: 1.15;
                -webkit-text-size-adjust: 100%
            }
            
            body {
                margin: 0
            }
            
            a {
                background-color: transparent
            }
            
            [hidden] {
                display: none
            }
            
            html {
                font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
                line-height: 1.5
            }
            
            *,
            :after,
            :before {
                box-sizing: border-box;
                border: 0 solid #e2e8f0
            }
            
            a {
                color: inherit;
                text-decoration: inherit
            }
            
            svg,
            video {
                display: block;
                vertical-align: middle
            }
            
            video {
                max-width: 100%;
                height: auto
            }
            
            .bg-white {
                --bg-opacity: 1;
                background-color: #fff;
                background-color: rgba(255, 255, 255, var(--bg-opacity))
            }
            
            .bg-gray-100 {
                --bg-opacity: 1;
                background-color: #f7fafc;
                background-color: rgba(247, 250, 252, var(--bg-opacity))
            }
            
            .border-gray-200 {
                --border-opacity: 1;
                border-color: #edf2f7;
                border-color: rgba(237, 242, 247, var(--border-opacity))
            }
            
            .border-t {
                border-top-width: 1px
            }
            
            .flex {
                display: flex
            }
            
            .grid {
                display: grid
            }
            
            .hidden {
                display: none
            }
            
            .items-center {
                align-items: center
            }
            
            .justify-center {
                justify-content: center
            }
            
            .font-semibold {
                font-weight: 600
            }
            
            .h-5 {
                height: 1.25rem
            }
            
            .h-8 {
                height: 2rem
            }
            
            .h-16 {
                height: 4rem
            }
            
            .text-sm {
                font-size: .875rem
            }
            
            .text-lg {
                font-size: 1.125rem
            }
            
            .leading-7 {
                line-height: 1.75rem
            }
            
            .mx-auto {
                margin-left: auto;
                margin-right: auto
            }
            
            .ml-1 {
                margin-left: .25rem
            }
            
            .mt-2 {
                margin-top: .5rem
            }
            
            .mr-2 {
                margin-right: .5rem
            }
            
            .ml-2 {
                margin-left: .5rem
            }
            
            .mt-4 {
                margin-top: 1rem
            }
            
            .ml-4 {
                margin-left: 1rem
            }
            
            .mt-8 {
                margin-top: 2rem
            }
            
            .ml-12 {
                margin-left: 3rem
            }
            
            .-mt-px {
                margin-top: -1px
            }
            
            .max-w-6xl {
                max-width: 72rem
            }
            
            .min-h-screen {
                min-height: 100vh
            }
            
            .overflow-hidden {
                overflow: hidden
            }
            
            .p-6 {
                padding: 1.5rem
            }
            
            .py-4 {
                padding-top: 1rem;
                padding-bottom: 1rem
            }
            
            .px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }
            
            .pt-8 {
                padding-top: 2rem
            }
            
            .fixed {
                position: fixed
            }
            
            .relative {
                position: relative
            }
            
            .top-0 {
                top: 0
            }
            
            .right-0 {
                right: 0
            }
            
            .shadow {
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
            }
            
            .text-center {
                text-align: center
            }
            
            .text-gray-200 {
                --text-opacity: 1;
                color: #edf2f7;
                color: rgba(237, 242, 247, var(--text-opacity))
            }
            
            .text-gray-300 {
                --text-opacity: 1;
                color: #e2e8f0;
                color: rgba(226, 232, 240, var(--text-opacity))
            }
            
            .text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }
            
            .text-gray-500 {
                --text-opacity: 1;
                color: #a0aec0;
                color: rgba(160, 174, 192, var(--text-opacity))
            }
            
            .text-gray-600 {
                --text-opacity: 1;
                color: #718096;
                color: rgba(113, 128, 150, var(--text-opacity))
            }
            
            .text-gray-700 {
                --text-opacity: 1;
                color: #4a5568;
                color: rgba(74, 85, 104, var(--text-opacity))
            }
            
            .text-gray-900 {
                --text-opacity: 1;
                color: #1a202c;
                color: rgba(26, 32, 44, var(--text-opacity))
            }
            
            .underline {
                text-decoration: underline
            }
            
            .antialiased {
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale
            }
            
            .w-5 {
                width: 1.25rem
            }
            
            .w-8 {
                width: 2rem
            }
            
            .w-auto {
                width: auto
            }
            
            .grid-cols-1 {
                grid-template-columns: repeat(1, minmax(0, 1fr))
            }
            
            @media (min-width:640px) {
                .sm\:rounded-lg {
                    border-radius: .5rem
                }
            
                .sm\:block {
                    display: block
                }
            
                .sm\:items-center {
                    align-items: center
                }
            
                .sm\:justify-start {
                    justify-content: flex-start
                }
            
                .sm\:justify-between {
                    justify-content: space-between
                }
            
                .sm\:h-20 {
                    height: 5rem
                }
            
                .sm\:ml-0 {
                    margin-left: 0
                }
            
                .sm\:px-6 {
                    padding-left: 1.5rem;
                    padding-right: 1.5rem
                }
            
                .sm\:pt-0 {
                    padding-top: 0
                }
            
                .sm\:text-left {
                    text-align: left
                }
            
                .sm\:text-right {
                    text-align: right
                }
            }
            
            @media (min-width:768px) {
                .md\:border-t-0 {
                    border-top-width: 0
                }
            
                .md\:border-l {
                    border-left-width: 1px
                }
            
                .md\:grid-cols-2 {
                    grid-template-columns: repeat(2, minmax(0, 1fr))
                }
            }
            
            @media (min-width:1024px) {
                .lg\:px-8 {
                    padding-left: 2rem;
                    padding-right: 2rem
                }
            }
            
            @media (prefers-color-scheme:dark) {
                .dark\:bg-gray-800 {
                    --bg-opacity: 1;
                    background-color: #2d3748;
                    background-color: rgba(45, 55, 72, var(--bg-opacity))
                }
            
                .dark\:bg-gray-900 {
                    --bg-opacity: 1;
                    background-color: #1a202c;
                    background-color: rgba(26, 32, 44, var(--bg-opacity))
                }
            
                .dark\:border-gray-700 {
                    --border-opacity: 1;
                    border-color: #4a5568;
                    border-color: rgba(74, 85, 104, var(--border-opacity))
                }
            
                .dark\:text-white {
                    --text-opacity: 1;
                    color: #fff;
                    color: rgba(255, 255, 255, var(--text-opacity))
                }
            
                .dark\:text-gray-400 {
                    --text-opacity: 1;
                    color: #cbd5e0;
                    color: rgba(203, 213, 224, var(--text-opacity))
                }
            
                .dark\:text-gray-500 {
                    --tw-text-opacity: 1;
                    color: #6b7280;
                    color: rgba(107, 114, 128, var(--tw-text-opacity))
                }
            }
            
            </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    {{-- <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">
                        <g clip-path="url(#clip0)" fill="#EF3B2D">
                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>
                        </g>
                    </svg> --}}

                    <?xml version="1.0" ?>
                    <svg width="100px" height="100px" viewBox="0 0 100 100" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Icon"><path d="M58.074,27.236c-0.69,1.124 -1.318,2.286 -1.933,3.455c-0.048,-0.116 -0.097,-0.227 -0.145,-0.331c-0.065,-0.14 -0.165,-0.364 -0.287,-0.577c-0.001,-0.053 -0.006,-0.107 -0.016,-0.161c-0.729,-4.007 -2.676,-7.121 -5.543,-9.988c-0.963,-0.962 -2.086,-2.108 -3.343,-2.682c-1.929,-0.882 -4.388,-1.247 -6.504,-1.247c-0.531,-0 -0.966,0.415 -0.998,0.938c-0.412,0.797 -0.588,1.749 -0.727,2.605c-0.942,5.806 4.497,10.89 9.874,11.965c1.914,0.383 3.726,-0.176 5.606,-0.262c0.049,0.097 0.1,0.201 0.124,0.251c0.163,0.353 0.354,0.808 0.463,1.273c0.079,0.333 0.136,0.672 0.031,0.952c-0.013,0.035 -0.024,0.071 -0.033,0.107c-0.306,0.565 -0.619,1.127 -0.944,1.681c-0.048,0.072 -0.09,0.143 -0.126,0.214c-0.246,0.415 -0.5,0.825 -0.764,1.229c-2.76,4.229 -5.458,8.411 -8.012,12.643c-0.307,-0.343 -0.622,-0.736 -0.867,-1.14c-0.2,-0.33 -0.368,-0.658 -0.368,-0.97c0,-0.108 -0.017,-0.212 -0.049,-0.309c-0.008,-0.041 -0.018,-0.08 -0.031,-0.119c0.033,-0.098 0.05,-0.204 0.05,-0.313c0,-2.288 -0.037,-4.814 -0.62,-7.104c-0.626,-2.462 -1.868,-4.655 -4.251,-6.096c-1.482,-0.896 -3.4,-1.573 -5.129,-1.741c-0.149,-0.015 -1.441,0.021 -1.73,0.03c-0.266,-0.121 -0.581,-0.126 -0.862,0.015c-0.321,0.16 -0.518,0.47 -0.549,0.803c-0.049,0.156 -0.061,0.325 -0.027,0.496c1.065,5.324 3.315,8.762 7.467,12.284c0.625,0.529 1.814,1.695 2.92,2.352c0.308,0.183 0.615,0.328 0.909,0.427c0.109,0.423 0.303,0.859 0.56,1.281c0.425,0.702 1.016,1.379 1.51,1.892c-2.124,3.593 -4.137,7.234 -5.988,10.981c-0.202,-0.495 -0.399,-0.994 -0.587,-1.495c-0.051,-0.136 -0.125,-0.469 -0.224,-0.763c2.517,-3.029 2.444,-6.569 0.973,-9.777c-1.454,-3.174 -4.317,-6.006 -7.264,-7.579c-0.149,-0.18 -0.36,-0.309 -0.607,-0.35c-0.545,-0.091 -1.06,0.277 -1.151,0.822l-0.011,0.063c-0.002,0.014 -0.005,0.028 -0.007,0.042c-0.848,5.114 -1.415,10.405 2.073,14.807c0.529,0.668 1.444,1.6 2.433,2.241c0.584,0.378 1.198,0.651 1.785,0.76c0.049,0.179 0.102,0.369 0.128,0.436c0.404,1.079 0.849,2.147 1.3,3.202c-1.52,3.243 -2.914,6.571 -4.15,10.024c-0.286,0.801 -0.573,1.591 -0.854,2.374c-0.283,-0.723 -0.6,-1.437 -0.862,-2.126c0.163,-1.507 0.431,-2.847 0.557,-4.137c0.217,-2.235 0.036,-4.332 -1.588,-6.798c-0.536,-0.815 -1.266,-1.532 -1.953,-2.219c-0.837,-0.837 -1.747,-1.62 -2.749,-2.255c-0.647,-0.41 -1.797,-1.367 -2.823,-1.907c-0.596,-0.314 -1.172,-0.491 -1.641,-0.491c-0.396,-0 -0.739,0.231 -0.901,0.565c-0.231,0.183 -0.379,0.466 -0.379,0.784c0,1.066 -0.274,2.136 -0.221,3.238c0.217,4.554 1.863,8.716 5.435,11.648c0.752,0.616 1.651,1.008 2.552,1.386c0.655,0.274 1.313,0.536 1.867,0.949c0.264,0.669 0.579,1.36 0.854,2.058c0.317,0.804 0.588,1.617 0.588,2.419c-0,0.119 0.02,0.232 0.058,0.338c-1.216,3.642 -2.18,7.265 -2.433,11.317c-0.035,0.55 0.384,1.026 0.935,1.06c0.551,0.035 1.026,-0.385 1.061,-0.935c0.299,-4.784 1.639,-8.946 3.187,-13.282c0.841,-1.044 1.741,-1.973 2.869,-2.665c0.142,0.12 0.319,0.2 0.516,0.225c7.254,0.914 14.855,-1.905 18.934,-8.17c0.301,-0.463 0.17,-1.083 -0.293,-1.384c-0.119,-0.077 -0.248,-0.126 -0.38,-0.148c-0.064,-0.029 -0.132,-0.052 -0.203,-0.068c-6.893,-1.499 -14.991,0.896 -18.536,7.267c-0.028,0.01 -0.055,0.022 -0.082,0.034c-0.47,0.22 -0.909,0.469 -1.323,0.745c1.273,-3.46 2.705,-6.796 4.266,-10.048c0.053,-0.034 0.104,-0.074 0.152,-0.12c1.273,-1.22 2.889,-1.983 4.468,-2.752c0.078,0.104 0.177,0.195 0.296,0.264c5.182,3.048 11.901,0.332 15.718,-3.648c1.357,-1.414 2.326,-3.35 3.541,-4.903c0.054,-0.069 0.097,-0.142 0.13,-0.219c0.095,-0.09 0.173,-0.201 0.228,-0.328c0.217,-0.508 -0.018,-1.096 -0.525,-1.313c-5.441,-2.332 -13.251,-0.666 -17.117,3.78c-0.613,0.705 -1.572,1.75 -2.153,2.846c-0.261,0.492 -0.446,0.996 -0.527,1.494c-0.785,0.389 -1.584,0.771 -2.36,1.19c1.684,-3.253 3.488,-6.434 5.375,-9.583c1.655,-1.767 3.515,-3.6 5.629,-4.804c0.288,0.163 0.653,0.287 0.838,0.38c1.581,0.791 2.921,0.954 4.676,1.087c3.85,0.29 7.81,0.17 11.414,-1.342c1.202,-0.504 2.954,-1.24 3.983,-2.229c0.147,-0.067 0.28,-0.17 0.383,-0.309c0.332,-0.441 0.242,-1.069 -0.2,-1.4c-4.806,-3.605 -11.244,-3.507 -16.721,-1.272c-1.377,0.561 -2.746,1.222 -3.924,2.138c-0.224,0.174 -0.598,0.425 -0.854,0.7c-0.098,0.105 -0.182,0.214 -0.252,0.325c-0.447,0.241 -0.885,0.508 -1.312,0.795c1.537,-2.431 3.112,-4.859 4.707,-7.303c0.255,-0.391 0.501,-0.787 0.739,-1.187c0.055,-0.069 0.1,-0.145 0.136,-0.229l0.006,-0.01c0.043,-0.04 0.206,-0.19 0.314,-0.267c0.313,-0.225 0.654,-0.427 0.852,-0.581c1.14,-0.88 2.106,-1.589 3.508,-2.005c0.172,-0.051 0.443,-0.111 0.713,-0.137c0.034,-0.004 0.074,-0.005 0.116,-0.006c0.101,0.054 0.211,0.091 0.325,0.108c0.125,0.104 0.279,0.197 0.461,0.268c0.343,0.133 0.854,0.2 1.051,0.239c1.305,0.261 2.649,0.201 3.972,0.201c3.588,-0 6.535,-0.777 9.845,-2.045c1.747,-0.669 3.57,-1.308 4.988,-2.569c0.412,-0.366 0.449,-0.999 0.083,-1.411c-0.094,-0.106 -0.206,-0.187 -0.327,-0.243c-5.75,-3.276 -11.779,-2.045 -17.33,1.14c-0.631,0.362 -1.21,0.923 -1.772,1.479c-0.306,0.303 -0.603,0.608 -0.916,0.837c-0.053,-0.004 -0.107,-0.007 -0.163,-0.009c-0.557,-0.017 -1.238,0.119 -1.614,0.231c-0.735,0.217 -1.372,0.498 -1.97,0.833c0.722,-1.38 1.448,-2.757 2.262,-4.082c7.637,-1.259 13.869,-5.119 16.16,-13.057c0.634,-2.198 0.375,-4.117 0.454,-6.313c0.006,-0.163 -0.028,-0.318 -0.092,-0.456c0.01,-0.058 0.016,-0.117 0.015,-0.178c-0.002,-0.551 -0.452,-0.998 -1.004,-0.996c-2.615,0.011 -5.641,0.133 -8.445,0.819c-2.954,0.722 -5.658,2.071 -7.479,4.482c-1.242,1.644 -1.854,3.684 -2.057,5.845c-0.28,2.973 0.216,6.18 0.759,8.784Zm-5.192,40.773c-3.221,4.022 -8.225,6.115 -13.332,6.206c2.585,-0.805 5.05,-1.893 7.476,-3.189c0.243,-0.131 0.335,-0.434 0.205,-0.677c-0.13,-0.244 -0.434,-0.335 -0.677,-0.205c-2.632,1.407 -5.312,2.564 -8.148,3.368c3.13,-4.485 9.089,-6.254 14.476,-5.503Zm-31.694,-8.836c-0.077,0.745 -0.208,1.495 -0.172,2.262c0.19,3.98 1.585,7.636 4.707,10.198c0.602,0.493 1.334,0.785 2.056,1.087c0.132,0.055 0.263,0.11 0.393,0.167c-1.505,-3.047 -3.484,-5.926 -5.367,-8.726c-0.154,-0.229 -0.093,-0.54 0.136,-0.694c0.229,-0.154 0.54,-0.093 0.694,0.136c1.89,2.81 3.872,5.701 5.391,8.755c0.101,-0.667 0.196,-1.308 0.257,-1.938c0.176,-1.808 0.047,-3.509 -1.267,-5.504c-0.463,-0.703 -1.104,-1.311 -1.697,-1.905c-0.734,-0.734 -1.528,-1.423 -2.406,-1.98c-0.538,-0.341 -1.433,-1.077 -2.305,-1.61c-0.144,-0.088 -0.285,-0.174 -0.42,-0.248Zm39.73,-6.504c-4.599,-1.343 -10.554,0.147 -13.626,3.681c-0.453,0.521 -1.134,1.244 -1.64,2.034c2.396,-1.077 5.025,-1.651 7.566,-2.276c0.268,-0.066 0.539,0.098 0.605,0.366c0.066,0.268 -0.098,0.539 -0.366,0.605c-2.844,0.7 -5.809,1.318 -8.403,2.711c-0.008,0.099 -0.005,0.197 0.011,0.293c4.353,2.35 9.843,-0.137 13.016,-3.446c1.092,-1.138 1.915,-2.633 2.837,-3.968Zm-30.306,-7.914c-0.634,4.125 -0.904,8.313 1.893,11.843c0.425,0.536 1.157,1.289 1.952,1.804c0.172,0.112 0.346,0.215 0.518,0.297c-0.419,-1.618 -0.523,-3.312 -0.979,-4.924c-0.389,-1.374 -1.234,-2.566 -1.891,-3.818c-0.128,-0.244 -0.034,-0.547 0.211,-0.675c0.244,-0.128 0.547,-0.034 0.675,0.211c0.688,1.312 1.56,2.569 1.967,4.01c0.412,1.454 0.535,2.977 0.864,4.449c1.498,-2.239 1.323,-4.774 0.264,-7.084c-1.126,-2.457 -3.22,-4.677 -5.474,-6.113Zm39.916,-1.526c-4.091,-2.397 -9.23,-2.086 -13.654,-0.282c-0.659,0.269 -1.317,0.56 -1.948,0.9c2.947,-0.658 6.111,-0.945 9.03,-0.831c0.276,0.01 0.491,0.243 0.48,0.519c-0.011,0.275 -0.243,0.491 -0.519,0.48c-3.171,-0.124 -6.64,0.24 -9.779,1.049c1.06,0.408 2.049,0.497 3.272,0.589c3.537,0.267 7.18,0.198 10.491,-1.191c0.755,-0.317 1.803,-0.706 2.627,-1.233Zm-29.029,0.762c-0.053,-1.398 -0.186,-2.818 -0.525,-4.152c-0.499,-1.96 -1.451,-3.73 -3.348,-4.877c-1.231,-0.745 -2.819,-1.314 -4.258,-1.46c-0.038,0.003 -0.396,0.024 -0.802,0.036c1.051,4.235 3.074,7.118 6.559,10.073c0.407,0.345 1.067,0.987 1.78,1.549c-1.032,-2.719 -3.026,-5.067 -4.798,-7.306c-0.172,-0.217 -0.135,-0.531 0.082,-0.703c0.216,-0.171 0.531,-0.134 0.702,0.082c1.654,2.091 3.48,4.284 4.608,6.758Zm37.399,-15.06c-4.671,-1.987 -9.491,-0.747 -13.967,1.821c-0.198,0.114 -0.387,0.256 -0.571,0.413c2.699,-0.464 5.388,-1.327 7.951,-2.153c0.263,-0.084 0.545,0.06 0.63,0.323c0.084,0.263 -0.06,0.545 -0.323,0.629c-2.595,0.837 -5.318,1.704 -8.052,2.179c0.703,0.027 1.41,0.002 2.111,0.002c3.329,-0 6.059,-0.737 9.13,-1.913c1.038,-0.397 2.118,-0.762 3.091,-1.301Zm-46.64,3.027l0.023,0.043c-0.007,-0.015 -0.015,-0.029 -0.023,-0.043Zm8.739,-14.239c-0.266,0.569 -0.348,1.249 -0.445,1.849c-0.378,2.333 0.575,4.495 2.133,6.192c1.623,1.768 3.908,3.042 6.16,3.492c0.891,0.178 1.756,0.102 2.618,-0.007c0.343,-0.044 0.685,-0.093 1.028,-0.139c-3.482,-1.489 -6.106,-4.134 -8.581,-7.042c-0.179,-0.21 -0.154,-0.526 0.057,-0.705c0.21,-0.178 0.526,-0.153 0.704,0.057c2.482,2.915 5.101,5.577 8.673,6.959c-0.836,-2.835 -2.437,-5.155 -4.608,-7.327c-0.804,-0.803 -1.711,-1.798 -2.76,-2.277c-1.475,-0.674 -3.307,-0.986 -4.979,-1.052Zm33.37,-8.404c-2.24,0.035 -4.721,0.185 -7.041,0.752c-2.5,0.612 -4.817,1.704 -6.358,3.745c-1.023,1.355 -1.495,3.046 -1.662,4.827c-0.186,1.981 0.005,4.072 0.315,5.991c0.774,-2.377 2.403,-4.385 4.307,-6.235c2.421,-2.353 5.285,-4.45 7.239,-6.795c0.177,-0.212 0.492,-0.24 0.704,-0.064c0.212,0.177 0.241,0.493 0.064,0.705c-1.974,2.368 -4.863,4.493 -7.31,6.871c-2.106,2.047 -3.888,4.281 -4.362,7.072c6.478,-1.261 11.766,-4.654 13.738,-11.489c0.542,-1.878 0.341,-3.537 0.366,-5.38Z"/></g></svg>
                    <h2>ENHANCING RICE FARMER RESILIENCY AND PRODUCTIVITY UNDER STRESS PRONE AREAS IN BICOL REGION</h2>
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
                    {{-- <div class="text-center text-sm text-gray-500 sm:text-left">
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
                    </div> --}}

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Agency: Department of Agriculture Regional Office 5
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
