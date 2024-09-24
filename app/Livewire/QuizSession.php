<?php

namespace App\Livewire;

use App\Models\Quiz;
use App\Models\Score;
use Carbon\Carbon;
use Livewire\Component;

class QuizSession extends Component
{
    public ?Score $score;
    public ?Quiz $quiz;
    public $activeQuestion = null;
    public $questionIndex = 0;
    public $questions = [];
    public $answers = [];
    public $answer = null;
    public $countdown = 0;
    public $end_at = null;

    public function mount()
    {
        $this->score = Score::where('code', session('session_code'))->first();
        if (!$this->score) {
            session()->forget('session_code');
            return redirect('/')->with('error', 'Kuis tidak ditemukan');
        }
        $this->quiz = $this->score->quiz;
        $this->questions = $this->quiz->questions;
        $this->activeQuestion = $this->questions->first();
        $this->end_at = $this->score->start_at->addMinutes($this->quiz->time_limit);
        if($this->end_at < Carbon::now()){
            $this->submitQuiz();
        }
    }

    public function submitAnswer()
    {
        $this->validate([
            'answer' => 'required',
        ]);

        $this->answers[$this->activeQuestion->id] = $this->answer;

        $this->nextQuestion();
    }

    public function submitQuiz()
    {
        $score = 0;
        foreach ($this->answers as $questionId => $answer) {
            $question = $this->quiz->questions()->find($questionId);
            if ($question && $question->correct_answer == $answer) {
                $score++;
            }
        }

        $this->score->update([
            'points' => $score,
            'answers' => $this->answers,
            'end_at' => Carbon::now(),
        ]);

        session()->forget('session_code');

        return redirect()->route('quiz.result', $this->score->code);
    }

    public function render()
    {
        return view('livewire.quiz-session');
    }

    public function timer()
    {
        $this->countdown = $this->end_at->diff(Carbon::now())->format('%H:%I:%S');
        if ($this->countdown <= 0) {
            $this->submitQuiz();
        }
    }

    public function previousQuestion()
    {
        if($this->questionIndex > 0){   
            $this->questionIndex--;
            $this->activeQuestion = $this->questions[$this->questionIndex] ?? null;
        if($this->activeQuestion){
                $this->answer = $this->answers[$this->activeQuestion->id] ?? null;
            }
        }
    }

    public function nextQuestion()
    {
        if($this->questionIndex < count($this->questions)-1){
            $this->questionIndex++;
        }else{
            $this->questionIndex = 0;
        }
        
        $this->activeQuestion = $this->questions[$this->questionIndex] ?? null;
        if($this->activeQuestion){
            $this->answer = $this->answers[$this->activeQuestion->id] ?? null;
        }
    }
}
