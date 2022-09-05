<x-layout>
    <x-card class="p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Update My Profile
            </h1>
        </header>

<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <div class="row" style="height: 600px; ">
        <div class="col">
            <div class="container">
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                alt="Maxwell Admin">
                                        </div>
                                        <h5 class="user-name"> {{auth()->user()->name}}</h5>
                                        <h6 class="user-email">{{auth()->user()->email}}</h6>
                                    </div>
                                    <div class="about">
                                        <h5>About</h5>
                                        <p>I'm {{auth()->user()->name}} I
                                            enjoy creating user-centric, delightful
                                            and
                                            human experiences.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row gutters">
                                    <form method="POST" action={{route("updateProfile", auth()->user()->id)}} enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="mb-6">
                                            <label for="name" class="inline-block text-lg mb-2">
                                                Name
                                            </label>
                                            <input
                                                type="text"
                                                class="border border-gray-200 rounded p-2 w-full"
                                                name="name" value="{{old('name')}}"
                                            />
                                            @Error('name')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                
                                        <div class="mb-6">
                                            <label for="email" class="inline-block text-lg mb-2"
                                                >Email</label
                                            >
                                            <input
                                                type="email"
                                                class="border border-gray-200 rounded p-2 w-full"
                                                name="email" value="{{old('email')}}"
                                            />
                                
                                            @Error('email')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
                                
                                        </div>

                                        <div class="mb-6">
                                            <label
                                                for="password"
                                                class="inline-block text-lg mb-2"
                                            >
                                               Old Password
                                            </label>
                                            <input
                                                type="password"
                                                class="border border-gray-200 rounded p-2 w-full"
                                                name="OldPassword" value="{{old('OldPassword')}}"
                                            />
                                            @Error('OldPassword')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
                                        </div>
                                
                                        <div class="mb-6">
                                            <label
                                                for="password"
                                                class="inline-block text-lg mb-2"
                                            >
                                                Password
                                            </label>
                                            <input
                                                type="password"
                                                class="border border-gray-200 rounded p-2 w-full"
                                                name="password" value="{{old('password')}}"
                                            />
                                            @Error('Password')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
                                        </div>

                                
                                
                                        <div class="mb-6">
                                            <label
                                                for="password2"
                                                class="inline-block text-lg mb-2"
                                            >
                                                Confirm Password
                                            </label>
                                            <input
                                                type="password"
                                                class="border border-gray-200 rounded p-2 w-full"
                                                name="password_confirmation" value="{{old('password_confirmation')}}"
                                            />
                                            @Error('password_confirmation')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
                                        </div>

                                        </div>
                                        <div class="mb-6">
                                            <button
                                                type="submit"
                                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                                            >
                                                Update
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
        </div>
    </div>




</body>

</html>
    
</x-card>
    
</x-layout>