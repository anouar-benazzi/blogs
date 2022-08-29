<x-layout>

    @include('partials._search')


    <a href="../" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">


                <h3 class="text-2xl mb-2">{{ $post->titlle }}</h3>


                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        content
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $post->description }}
                    </div>
                </div>
            </div>
            @auth
            <div>
                <form method="POST" action="/posts/{{ $post->id }}">
                    @csrf
                    <label for="comment" class="inline-block text-lg mb-2">Comment</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="description"
                        value="" />
                    <input type="hidden" class="border border-gray-200 rounded p-2 w-full" name="post_id"
                        value="{{ $post->id }}" />
                </form>
            </div>
            @endauth

            <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
                @unless(count($comments)==0)
                 
                @foreach($comments as $comment)
                <x-comment-card :comment="$comment" />
                @endforeach        
                
                @else 
                <p> No comments found<p/>
                @endunless
                </div>
                
                <div class="mt-6 p-4">
                   
                </div>
            
           

        </x-card>
        {{-- <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/listings/{{$listing->id}}/edit">
            <i class="fa-solid fa-pencil"></i> Edit
        </a>  
        
        <form method="POST" action="/listings/{{$listing->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button> 


        </form>
    </x-card> --}}

    </div>

</x-layout>
