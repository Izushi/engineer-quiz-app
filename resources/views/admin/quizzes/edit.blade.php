<x-admin-layout>
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Edit quiz</h1>
            </div>
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <form method="POST"
                    action="{{ route('admin.categories.quizzes.update', ['categoryId' => $category->id, 'quizId' => $quiz->id]) }}"
                    class="flex flex-wrap -m-2">
                    @csrf

                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="question" class="leading-7 text-sm text-gray-600">Question</label>
                            <textarea id="question" name="question"
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
                                    @error('question')
                                        border-red-500
                                    @else
                                        border-gray-300
                                    @enderror
                                    ease-in-out">{{ old('question') ? old('question') : $quiz->question }}</textarea>
                            @error('question')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="p-2 w-full">
                        <div class="relative">
                            <label for="explanation" class="leading-7 text-sm text-gray-600">Explanation</label>
                            <textarea id="explanation" name="explanation"
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
                                    @error('explanation')
                                        border-red-500
                                    @else
                                        border-gray-300
                                    @enderror
                                    ease-in-out">{{ old('explanation') ? old('explanation') : $quiz->explanation }}</textarea>

                            @error('explanation')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    @if ($options->isEmpty())
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="content"
                                        class="leading-7 text-sm text-gray-600">Option{{ $i }}</label>
                                    <input type="text" id="content{{ $i }}"
                                        name="content{{ $i }}"
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
                                            @error('content' . $i)
                                                border-red-500
                                            @else
                                                border-gray-300
                                            @enderror
                                            ease-in-out"
                                        value="{{ old('content' . $i) }}">

                                    @error('content')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="isCorrect{{ $i }}"
                                        class="leading-7 text-sm text-gray-600">Correct or
                                        Incorrect of Option{{ $i }}</label>
                                    <select id="isCorrect{{ $i }}" name="isCorrect{{ $i }}"
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
                                            @error('isCorrect' . $i)
                                                border-red-500
                                            @else
                                                border-gray-300
                                            @enderror
                                            ease-in-out"
                                        value="{{ old('isCorrect' . $i) }}">
                                        <option value="1">Correct</option>
                                        <option value="0">Incorrect</option>
                                    </select>

                                    @error('isCorrect' . $i)
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        @endfor
                    @else
                        @for ($i = 1; $i <= 4; $i++)
                            {{-- Send optionId 1-4 with hidden --}}
                            <input type="hidden" name="optionId{{ $i }}"
                                value="{{ $options[$i - 1]->id }}" />
                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="content"
                                        class="leading-7 text-sm text-gray-600">Option{{ $i }}</label>
                                    <input type="text" id="content{{ $i }}"
                                        name="content{{ $i }}"
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
                                            @error('content' . $i)
                                                border-red-500
                                            @else
                                                border-gray-300
                                            @enderror
                                            ease-in-out"
                                        value="{{ old('content' . $i) ? old('content' . $i) : $options[$i - 1]->content }}">

                                    @error('content')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="isCorrect{{ $i }}"
                                        class="leading-7 text-sm text-gray-600">Correct or
                                        Incorrect of Option{{ $i }}</label>
                                    <select id="isCorrect{{ $i }}" name="isCorrect{{ $i }}"
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
                                            @error('isCorrect' . $i)
                                                border-red-500
                                            @else
                                                border-gray-300
                                            @enderror
                                            ease-in-out"
                                        value="{{ old('isCorrect' . $i) ? old('isCorrect' . $i) : $options[$i - 1]->is_correct }}">
                                        <option @selected($options[$i - 1]->is_correct === 1) value="1">Correct</option>
                                        <option @selected($options[$i - 1]->is_correct === 0) value="0">Incorrect</option>
                                    </select>

                                    @error('isCorrect' . $i)
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>
                        @endfor
                    @endif

                    <div class="p-2 w-full">
                        <button type="submit"
                            class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <pre>{{ print_r(session()->all(), true) }}</pre>
    </section>
</x-admin-layout>
