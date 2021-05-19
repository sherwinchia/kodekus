<?php

namespace App\Http\Livewire\Browser\Quiz;

use App\Models\Option;
use Livewire\Component;

class QuizForm extends Component
{
    public $quiz, $score, $available_score, $questions;
    public $answers = [];
    public $state = "form";

    protected $rule = [];

    protected $listeners = ['formRefresh' => '$refresh'];

    public function mount($quiz)
    {
        $this->quiz = $quiz;
        $this->questions = $quiz->questions;
        foreach ($this->questions as $question) {
            foreach ($question->options as $option) {
                $this->available_score += $option->point;
            }
        }
    }

    public function submit()
    {
        $this->score = 0;
        foreach ($this->answers as $answer) {
            $option = Option::find($answer);
            $this->score += $option->point;
        }
        $this->state = "submit";
    }

    public function redo()
    {
        $this->answers = array();
        $this->state = 'form';
        $this->emitSelf('formRefresh');
    }

    public function render()
    {
        return view('livewire.browser.quiz.quiz-form');
    }
}
