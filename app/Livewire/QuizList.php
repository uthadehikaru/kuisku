<?php

namespace App\Livewire;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithPagination;

class QuizList extends Component
{
    use WithPagination;

    public function render()
    {
        $quizzes = Quiz::public()->latest()->paginate(4)->fragment('quiz-list');
        return view('livewire.quiz-list', compact('quizzes'));
    }
}
