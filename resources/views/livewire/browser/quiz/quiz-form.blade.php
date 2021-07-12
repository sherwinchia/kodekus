<div class="flex flex-col card">
    @if ($state == 'form')
        <div class="card-header">
            <p>{{ $quiz->name }}</p>
        </div>
        <form class="w-12/12 lg:w-8/12 flex-col" wire:submit.prevent="submit">
            @foreach ($questions as $question_index => $question)
                <div class="mb-6">
                    <p class="mb-2 text-xl">{{ $question->text }}</p>
                    @foreach ($question->options as $option_index => $option)
                        <div class="flex mb-2 items-center">
                            <input type="radio" class="form-radio h-5 w-5 text-gray-600" id="{{ $option->id }}"
                                name="{{ $question->id }}" value="{{ $option->id }}"
                                wire:model.defer="answers.{{ $question_index }}">
                            <span class="ml-2">{{ $option->text }}</span><br>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <button class="px-3 py-2 bg-primary rounded-md text-white text-sm font-semibold" type="submit">Cek Hasil</button>
        </form>
    @elseif ($state == 'submit')
        <div class="card-header">
            <p class="mb-2">{{ $quiz->name }}</p>
            <h5 class="text-normal">Total Point: {{ $score }}/{{ $available_score }}</h5>
        </div>
        <div class="w-12/12 lg:w-8/12 flex-col" wire:submit.prevent="submit">
            @foreach ($questions as $question_index => $question)
                <div class="mb-6">
                    <p class="mb-2 text-xl">{{ $question->text }}</p>
                    @foreach ($question->options as $option_index => $option)
                        <div class="flex mb-2 items-center">
                            <input type="radio" class="form-radio h-5 w-5  " id="{{ $option->id }}"
                                name="{{ $question->id }}" value="{{ $option->id }}"
                                wire:model.defer="answers.{{ $question_index }}" disabled>
                            <span
                                class="ml-2 {{ $option->point > 0 ? 'text-green-600' : 'text-gray-600' }}">{{ $option->text }}</span><br>
                        </div>
                    @endforeach
                </div>
            @endforeach
            <button class="px-3 py-2 bg-primary rounded-md text-white text-sm font-semibold" type="button"
                wire:click.prevent="redo()">Ulang
                Quiz</button>
        </div>
    @endif
</div>
