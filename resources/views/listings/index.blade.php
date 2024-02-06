<x-layout/>

@include('partiles._hero')
@include('partiles._search')

<div
    class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>


    @foreach($listings as $listing)
        <x-posts-card :listing="$listing"/>
    @endforeach

</div>
<div class="mt-6 p-4">
    {{$listings->links()}}
</div>






