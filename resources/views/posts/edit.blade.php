<x-layout>

    <x-card class="p-10 max-w-lg mx-auto mt-24" >
                        <header class="text-center">
                            <h2 class="text-2xl font-bold uppercase mb-1">
                                Edit Gig
                            </h2>
                            <p class="mb-4">Edit : {{$post->title}}</p>
                        </header>
    
                        <form method="POST" action={{route("update_post", $post->id)}} enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-6">
                                <label
                                    for="title"
                                    class="inline-block text-lg mb-2"
                                    >Title</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="title"
                                    value="{{$post->title}}"
                                />
                            </div>
    @error('title')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror
                            <div class="mb-6">
                                <label for="description" class="inline-block text-lg mb-2"
                                    >Description</label
                                >
                                <textarea
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="description"
                                    placeholder="Example: Senior Laravel Developer"
                                    value="{{$post->description}}"
                                ></textarea>
                            </div>
    @error('description')
    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror                       
                            <div class="mb-6">
                                <label
                                    for="tags"
                                    class="inline-block text-lg mb-2"
                                    >tags</label
                                >
                                <input
                                    type="text"
                                    class="border border-gray-200 rounded p-2 w-full"
                                    name="tags"
                                    value="{{$post->tags}}"
                                />
                            </div>
    
                            @error('description')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror 

                            <div class="mb-6">
                                <button
                                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                                >
                                    update Post
                                </button>
    
                                <a href="/" class="text-black ml-4"> Back </a>
                            </div>
                        </form>
                    </x-card>
                </x-layout>