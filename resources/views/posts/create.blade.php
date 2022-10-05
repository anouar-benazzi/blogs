<x-layout>

<x-card class="p-10 max-w-lg mx-auto mt-24" >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Create a Gig
                        </h2>
                        <p class="mb-4">Post a gig to find a developer</p>
                    </header>

                    <form method="POST" action="../posts" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label
                                class="inline-block text-lg mb-2"
                                >Title</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                value=""
                            />
                        </div>
@error('title')
<p class="text-red-500 text-xs mt-1">{{$message}}</p>
@enderror
                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Description</label
                            >
                            <textarea type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                value="">
                            </textarea>
                        
@error('description')
<p class="text-red-500 text-xs mt-1">{{$message}}</p>
@enderror                       
                        <div class="mb-6">
                            <label
                                class="inline-block text-lg mb-2"
                                >tags</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="tags"
                                value=""
                            />
                        </div>
                        @error('tags')
<p class="text-red-500 text-xs mt-1">{{$message}}</p>
@enderror 
                        
                        <div class="mb-6">
                            <label for="photo" class="inline-block text-lg mb-2">
                                Images
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="photo[]" multiple
                            />
                        </div>
@error('images')
<p class="text-red-500 text-xs mt-1">{{$message}}</p>
@enderror 
                       
                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Create Post
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </x-card>
            </x-layout>