<?php

namespace App\Http\Livewire\Admin\Quizzes;

use App\Models\Article;
use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Livewire\Component;

class QuizzesForm extends Component
{
    public $quiz;

    public $name;
    public $description;
    public $article_id;
    public $articles;

    public $questions = [];

    public $buttonText = 'Create';
    public $edit;

    protected $rules = [
        'name' => 'required',
        'description' => 'nullable',
        'questions' => 'required',
        'questions.*.text' => 'required',
        'questions.*.options' => 'required',
        'questions.*.options.*.text' => 'required',
        'questions.*.options.*.point' => 'required|numeric',
    ];

    protected $messages = [
        'questions.*.text.required' => 'Question text is required.',
        'questions.*.options.required' => 'Each question required minimal one option.',
        'questions.*.options.*.text.required' => 'Option text is required.',
        'questions.*.options.*.point.required' => 'Option point is required.',
    ];

    protected $listeners = ['formRefresh' => '$refresh'];

    public function mount($quiz = null)
    {
        $this->edit = isset($quiz) ? true : false;
        $this->articles = Article::all();
        if (isset($quiz)) {
            $this->quiz = $quiz;
            $this->name = $quiz->name;
            $this->description = $quiz->description;
            $this->article_id = $quiz->article_id;
            $this->buttonText = 'Update';
            $this->populateQuestion($quiz);
        }
    }

    public function populateQuestion($quiz)
    {
        $questions = $quiz->questions;
        foreach ($questions as $question) {
            $data = [
                'text' => $question->text,
                'options' => []
            ];
            $options = $question->options;
            foreach ($options as $option) {
                array_push($data['options'], [
                    'text' => $option->text,
                    'point' => $option->point
                ]);
            }
            array_push($this->questions, $data);
        }
    }

    public function addQuestion()
    {
        array_push($this->questions, [
            'text' => null,
            'options' => [
                [
                    'text' => null,
                    'point' => null
                ]
            ]
        ]);
        $this->emitSelf('formRefresh');
    }

    public function removeQuestion($index)
    {
        unset($this->questions[$index]);
        $this->emitSelf('formRefresh');
    }

    public function addOption($index)
    {
        array_push($this->questions[$index]['options'], [
            'text' => null,
            'point' => null
        ]);
        $this->emitSelf('formRefresh');
    }

    public function removeOption($question_index, $option_index)
    {
        unset($this->questions[$question_index]['options'][$option_index]);
        $this->emitSelf('formRefresh');
    }

    public function submit()
    {
        $data = $this->validate($this->rules);
        if ($this->edit) {
            $this->quiz->update([
                'name' => $data['name'],
                'article_id' => $this->article_id,
                'description' => $this->description
            ]);
            $this->clearQuestionAndOption($this->quiz);
        } else {
            $this->quiz = Quiz::create([
                'name' => $data['name'],
                'article_id' => $this->article_id,
                'description' => $this->description
            ]);
        }
        foreach ($data['questions'] as $question) {
            $question_data = Question::create([
                'quiz_id' => $this->quiz->id,
                'text' => $question['text']
            ]);
            foreach ($question['options'] as $option) {
                Option::create([
                    'question_id' => $question_data->id,
                    'text' => $option['text'],
                    'point' => $option['point']
                ]);
            }
        }

        if ($this->edit) {
            session()->flash('success', 'Quiz successfully updated.');
        } else {
            session()->flash('success', 'Quiz successfully created.');
        }

        return redirect()->route('admin.quizzes.edit', $this->quiz->id);
    }

    public function clearQuestionAndOption($quiz)
    {
        $questions = $quiz->questions;
        foreach ($questions as $question) {
            $question->options()->delete();
        }
        $quiz->questions()->delete();
    }

    public function render()
    {
        return view('livewire.admin.quizzes.quizzes-form');
    }
}
