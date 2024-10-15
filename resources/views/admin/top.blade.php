<x-admin-layout>
    <section class="text-gray-600 body-font relative mt-5">
        <div class="container px-5 py-5 mx-auto">
            <div class="flex flex-col text-center w-full mb-3">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Catetories</h1>
            </div>

            <div class="lg:w-1/2 ml-auto">
                <div class="flex flex-wrap -m-2">
                    <div class="p-2 w-full">
                        <button onclick="location.href='{{ route('admin.categories.create') }}'"
                            class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Add
                            category</button>
                    </div>
                </div>
            </div>

            <div class="lg:w-2/3 w-full mx-auto overflow-auto mt-6">
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                ID</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Category name</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Updated at</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Detail</th>
                            <th
                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-4 py-3">{{ $category->id }}</td>
                                <td class="px-4 py-3">{{ $category->name }}</td>
                                <td class="px-4 py-3">{{ $category->updated_at }}</td>
                                <td class="px-4 py-3 text-lg text-gray-900">
                                    <button
                                        onclick="location.href='{{ route('admin.categories.show', ['categoryId' => $category->id]) }}'"
                                        class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                                        Detail
                                    </button>
                                </td>
                                <td class="px-4 py-3 text-lg text-gray-900">
                                    <button
                                        class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-admin-layout>
