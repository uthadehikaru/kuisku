<?php

namespace App\Livewire;

use App\Models\Score;
use Livewire\Component;

class QuizResult extends Component
{
    public Score $score;

    public function mount($code)
    {
        $this->score = Score::where('code', $code)->first();
    }

    public function render()
    {
        return view('livewire.quiz-result');
    }
}
