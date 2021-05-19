<div class="flex-1 flex justify-center overflow-y-hidden">
    <div class="card w-full max-w-2xl">
        <div class="card-header">
            <p>{{ $buttonText }} Quiz</p>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="submit" class="flex-none flex flex-col justify-between">
                <div class="overflow-y-auto">
                    <section>
                        <div class="input-group">
                            <label for="name">Name</label>
                            <input wire:model="name" type="text" id="name">
                            @error('name') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>
                    </section>
                    <section>
                        <div class="input-group">
                            <label for="name">Description</label>
                            <textarea wire:model="description"></textarea>
                            @error('description') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>
                    </section>
                    <section>
                        <div class="input-group">
                            <label for="article_id">Article</label>
                            <select wire:model="article_id">
                                <option value="null">No article selected</option>
                                @foreach ($articles as $article)
                                    <option value="{{ $article->id }}">{{ $article->title }}</option>
                                @endforeach
                            </select>
                            @error('article_id') <span class="error-msg">{{ $message }}</span> @enderror
                        </div>
                    </section>
                </div>

                <div class="mb-4">
                    <h3>Question(s)</h3>
                    @error('questions') <span class="error-msg block mb-4">{{ $message }}</span> @enderror
                    @foreach ($questions as $question_index => $question)
                        <div class="p-4 border border-gray-400 mb-4 rounded-lg">
                            <section class="mb-2">
                                <div class="input-group">
                                    <textarea wire:model.defer="questions.{{ $question_index }}.text"
                                        placeholder="Enter the question here"></textarea>
                                    @error('questions.' . $question_index . '.text') <span
                                        class="error-msg">{{ $message }}</span> @enderror
                                </div>
                            </section>

                            <section>
                                <h4 class="mb-2 pb-2 border-b border-gray-300">Option(s)</h4>
                                @error('questions.' . $question_index . '.options') <span
                                        class="error-msg block mb-4">{{ $message }}</span>
                                @enderror
                                <div class="grid grid-cols-6 gap-x-4 gap-y-1">
                                    @foreach ($question['options'] as $option_index => $option)
                                        <div class="input-group col-span-4">
                                            <label for="option_text">Option</label>
                                            <textarea cols="1" rows="1"
                                                wire:model.defer="questions.{{ $question_index }}.options.{{ $option_index }}.text"
                                                placeholder="Enter the option here"></textarea>
                                        </div>
                                        <div class="input-group col-span-1">
                                            <label for="option_text">Point</label>
                                            <input min="0"
                                                wire:model.defer="questions.{{ $question_index }}.options.{{ $option_index }}.point"
                                                type="number" id="question">
                                        </div>
                                        <div class="col-span-1">
                                            <a class="cursor-pointer flex justify-center align-middle pt-8"
                                                wire:click="removeOption({{ $question_index }}, {{ $option_index }})">
                                                <i class="fas fa-times text-gray-700"></i>
                                            </a>
                                        </div>
                                        <div class="col-span-6 mb-2">
                                            @error('questions.' . $question_index . '.options.' . $option_index .
                                                '.text')
                                            <span class="error-msg block">{{ $message }}</span> @enderror
                                            @error('questions.' . $question_index . '.options.' . $option_index .
                                                '.point')
                                            <span class="error-msg block">{{ $message }}</span> @enderror
                                        </div>
                                    @endforeach
                                </div>
                            </section>
                            <button class="mt-2" type="button" wire:click="addOption({{ $question_index }})">Add
                                Option</button>
                        </div>
                    @endforeach
                    <button type="button" wire:click="addQuestion()">Add Question</button>
                </div>

                <div>
                    {{-- @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded m-2">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ $errors->first() }}</span>
                        </div>
                    @endif --}}
                    <button type="submit" class="">{{ $buttonText }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
