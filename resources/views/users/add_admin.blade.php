<x-layout>
<x-card class=" p-10  max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Add admin
        </h2>
    </header>

    <form method="post" action='/SuperAdmin/admins'>
        @csrf
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
            <input
            type="hidden"
            class="border border-gray-200 rounded p-2 w-full"
            name="role_id" value= 2
        />
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
            >
                Add
            </button>
        </div>

    </form>
</x-card>
</x-layout>    