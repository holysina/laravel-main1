@foreach($listing as $icon)

    <x-layout/>
    <div
        class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
    >
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">

                edit : {{$icon->title}}
            </h2>
            <p class="mb-4"></p>
        </header>

        <form method="POST" action="{{url("/listing/$icon->id")}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label
                    for="company"
                    class="inline-block text-lg mb-2"

                >Company Name</label
                >

                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company"
                    PLACEHOLDER="{{$icon->company}}"
                    value="{{$icon->company}}"
                />
                @error('company')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                >Job Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="{{$icon->title}}"
                    value="{{$icon->title}}"
                />

                @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label
                    for="location"
                    class="inline-block text-lg mb-2"
                >Job Location</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    placeholder="{{$icon->location}}"
                    value="{{$icon->location}}"

                />
                @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                >Contact Email</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    placeholder="{{$icon->email}}"
                    value="{{$icon->email}}"
                />

                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label
                    for="website"
                    class="inline-block text-lg mb-2"
                >
                    URL
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="url"
                    placeholder="{{$icon->url}}"
                    value="{{$icon->url}}"
                />

                @error('url')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tag"
                    placeholder="{{$icon->tag}}"
                    value="{{$icon->tag}}"
                />

                @error('tag')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
            </div>

            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                    Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"

                    name="image"
                />
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{$icon->image ? asset('storage/'.$icon->image) :
                    asset('images/cbr.jpeg')}}"
                    alt="">
                @error('image')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"

                >{{$icon->description}}</textarea>

                @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>@enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Create Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
@endforeach
