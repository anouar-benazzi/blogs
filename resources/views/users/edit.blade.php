<x-layout>
    <x-card class="p-10">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Update User
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
                                        <h5 class="user-name"> {{$user->name}}</h5>
                                        <h6 class="user-email">{{$user->email}}</h6>
                                    </div>
                                    <div class="about">
                                        <h5>About</h5>
                                        <p>I'm {{$user->name}} I
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
                                    <form method="POST" action={{route("updateUser", $user->id)}} enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

              
                                        </div>

                                        <div class="mb-6">
                                            <label
                                                for="role_id"
                                                class="inline-block text-lg mb-2"
                                            >
                                                role ID
                                            </label>
                                            <input
                                                type="text"
                                                class="border border-gray-200 rounded p-2 w-full"
                                                name="role_id" value="{{old('role_id')}}"
                                            />
                                            @Error('role_id')
                                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                            @enderror
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