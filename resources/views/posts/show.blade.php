<x-layout>

    @include('partials._search')

    

    <a href="../" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                
              
                @unless(!count($post->images)==0)
                  <img class="w-48 mr-6 mb-6" src="{{asset('/images/no-image.png')}}">
                @endunless
                
                @foreach ($post->images as $image)
                <img class="w-48 mr-6 mb-6" src="{{ asset('storage/'.$image->photo) }}">
                @endforeach

                <h3 class="text-2xl mb-2">{{ $post->name}}</h3>


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
            @if (auth()->user()->id == $post->user->id)
            <div class="mt-4 p-2 flex space-x-6">
                <a href="/posts/{{$post->id}}/edit">
                    <i class="fa-solid fa-pencil"></i> Edit
                </a>  
            @endif    
            @if (auth()->user()->id == $post->user->id || auth()->user()->role_id == 2)
                <form method="POST" action="/posts/{{$post->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button> 
                </form>
            </div>
            @endif

            @endauth
            @auth
            <div>
                <form method="POST" action={{route('add_comment', $post->id)}}>
                    @csrf
                    <label for="comment" class="inline-block text-lg mb-2">Comment</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="description"
                        value="" />
                  
                   <button type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600" > submit</button>
                </form>
            </div>
            @endauth


            <div>
                <ul>
                    @unless(count($post->comments)==0)
                    @foreach ($post->comments as $comment)
                    <li>
                        
                        {{$comment->user->name}}
                        
                    </li>
                    <li>
                        {{$comment->description}}
        
                    </li>
                    <li>
                        @auth
                        @if(auth()->user()->id == $comment->user->id)
                        <a>edit</a>
                      
                        @endif
                        @endauth
               
                    </li>    
                    @endforeach
                </ul>      
                @else 
                <p> No comments found<p/>
                @endunless        
            </div>
                </div>
            
           

        </x-card>
    

    </div>

</x-layout>
