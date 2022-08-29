@props(['post'])


<x-card>
    <div class="flex">
 
        <div>
            <h3 class="text-2xl">
                <a href={{route("show_post",$post->id)}}>{{$post->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$post->description}}</div>
            <x-post-tags :tagsCsv="$post->tags" />
            
        </div>
    </div>
</x-card>