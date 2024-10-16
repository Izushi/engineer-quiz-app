<x-admin-layout>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Edit category</h1>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <form method="POST" action="{{ route('admin.categories.update', ['categoryId' => $category->id]) }}"
                    class="flex flex-wrap -m-2">
                    @csrf
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="name" class="leading-7 text-sm text-gray-600">Category name</label>
                            <input type="text" id="name" name="name"
                                class="w-full
                                    bg-gray-100
                                    bg-opacity-50
                                    rounded border
                                    focus:border-indigo-500
                                    focus:bg-white focus:ring-2
                                    focus:ring-indigo-200
                                    text-base outline-none
                                    text-gray-700
                                    py-1
                                    px-3
                                    leading-8
                                    transition-colors
                                    duration-200
                                    @error('name')
                                        border-red-500
                                    @else
                                        border-gray-300
                                    @enderror
                                    ease-in-out"
                                value="{{ is_null(old('name')) ? $category->name : old('name') }}">
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="description" class="leading-7 text-sm text-gray-600">Category
                                description</label>
                            <textarea id="description" name="description"
                                class="w-full
                                    bg-gray-100
                                    bg-opacity-50
                                    rounded
                                    border
                                    focus:border-indigo-500
                                    focus:bg-white
                                    focus:ring-2
                                    focus:ring-indigo-200
                                    h-32
                                    text-base
                                    outline-none
                                    text-gray-700
                                    py-1
                                    px-3
                                    resize-none
                                    leading-6
                                    transition-colors
                                    duration-200
                                    @error('description')
                                        border-red-500
                                    @else
                                        border-gray-300
                                    @enderror
                                    ease-in-out">{{ is_null(old('description')) ? $category->description : old('description') }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <button type="submit"
                            class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <pre>{{ print_r(session()->all(), true) }}</pre>
    </section>
</x-admin-layout>
