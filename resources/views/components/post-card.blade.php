@props(['post'])


<x-card>
    <div class="flex">

            @if(!count($post->images)==0)
          <img
            class="hidden w-48 mr-6 md:block"
            src="{{ asset('storage/'.$post->latestImage->photo)}}" 
            alt=""
        />
            @endif
            @if(count($post->images)==0)
            <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('/images/no-image.png')}}" 
            alt=""
        />
            @endif
  
   

        <div>
            <h3 class="text-2xl">
                <a href={{route("show_post",$post->id)}}>{{$post->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$post->description}}</div>
            <x-post-tags :tagsCsv="$post->tags" />
            
        </div>
    </div>
</x-card>