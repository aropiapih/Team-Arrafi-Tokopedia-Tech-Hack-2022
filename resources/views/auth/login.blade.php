<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased">
    <div class="container">
        <div class="card" style="margin-top : 100px">
            <div class="card-header">
                <h1>LOGIN</h1>
            </div>

            <div class="card-body">
                   <!-- Session Status -->
                               <x-auth-session-status class="mb-4" :status="session('status')" />

                               <!-- Validation Errors -->
                               <x-auth-validation-errors class="mb-4" :errors="$errors" />

                               <form method="POST" action="{{ route('login') }}">
                                   @csrf

                                   <!-- Email Address -->
                                   <div class="mb-3">
                                       <x-label class="form-label" for="email" :value="__('Email')" />
                                       <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                                   </div>

                                   <!-- Password -->
                                   <div class="mb-3">
                                       <x-label class="form-label" for="password" :value="__('Password')" />

                                       <x-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" />
                                   </div>

                                   <!-- Remember Me -->
                                   <div class="block mt-4">
                                       <label for="remember_me" class="inline-flex items-center">
                                           <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                           <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                       </label>
                                   </div>

                                   <div class="flex items-center justify-end mt-4">

                                       <x-button class="ml-3 btn btn-primary">
                                           {{ __('Log in') }}
                                       </x-button>
                                        </form>
                                        <button href="/register" class="ml-3 btn btn-primary">
                                                                             <a href="/register" class="text-white" style="text-decoration: none">Register </a>
                                                                       </button>
                                   </div>


            </div>

        </div>
    </div>
</body>

</html>
