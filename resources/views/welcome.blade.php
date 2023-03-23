<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-200 p-4">
    <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl">
        <h1 class="font-bold text-5xl text-center mb-8">Laravel & Tailwind</h1>

        <div class="mb-6">
            @if(empty($post))
            <form class="flex flex-col space-y-4" method="POST" action="{{ route('store') }}">
                @csrf
                @else
                <form class="flex flex-col space-y-4" method="POST" action="{{ route('post.update') }}">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" id="id" name="id" value="{{ $post->id }}">

                    @endif


                    <input type="text" name="title" placeholder="Enter title"
                        value="{{ old('title', $post->title ?? '') }}" class="py-3 px-4 bg-gray-100 rounded-xl">

                    <textarea name="description" placeholder="Enter description"
                        class="py-3 px-4 bg-gray-100 rounded-xl">{{ old('description',$post->description ?? '') }}</textarea>

                    @if(empty($post))
                    <input class="btn my-2 w-28 py-4 px-8 bg-green-500 rounded-xl" type="submit" value="Save"
                        name="submit" />
                    @else
                    <input class="btn my-2 w-28 py-4 px-8 bg-green-500 rounded-xl" type="submit" value="Update"
                        name="submit" />
                    @endif

                </form>
        </div>
        <hr>

        <div class="mt-2">
            @foreach($posts as $post)
            <div @class([ 'py-4 flex items-center border-b border-gray-300 px-3' , $post->isDone ? 'bg-green-200': ''
                ])
                >
                <div class="flex-1 pr-8">
                    <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
                    <p class="text-gray-500">{{ $post->description }}</p>
                </div>

                <div class="flex space-x-3">

                    <a href="{{ route('edit', ['id' => $post->id]) }}">
                        <button class="py-2 px-2 bg-green-500 text-white rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                        </button>
                    </a>


                    <a href="{{ route('delete', ['id' => $post->id]) }}"
                        onclick="return confirm('Are you sure to delete?')">
                        <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </a>


                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>

</html>