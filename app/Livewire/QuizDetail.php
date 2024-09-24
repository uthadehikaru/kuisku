<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use App\Models\Score;
use Illuminate\Support\Str;

class QuizDetail extends Component
{
    public Quiz $quiz;

    public function mount($code)
    {
        $this->quiz = Quiz::withCount('questions')->where('code', $code)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.quiz-detail');
    }

    public function startQuiz()
    {
        if (!auth()->check()) {
            session()->put('url.intended', route('quiz.detail', $this->quiz->code));
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
        }

        if(session()->has('session_code')){
            session()->flash('error', 'Kamu belum menyelesaikan kuis');
            return redirect()->route('quiz.session');
        }

        $score = Score::create([
            'code' => Str::random(10),
            'user_id' => auth()->user()->id,
            'quiz_id' => $this->quiz->id,
            'start_at' => now(),
        ]);

        session()->put('session_code', $score->code);
        return redirect()->route('quiz.session');
    }
}
