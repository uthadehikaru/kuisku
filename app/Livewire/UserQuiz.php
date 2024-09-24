<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Quiz;

class UserQuiz extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $quiz = Quiz::find($id);
        $quiz->delete();

        return redirect()->route('dashboard')->with('success', 'Kuis berhasil dihapus');
    }

    public function render()
    {
        $quizzes = Quiz::where('creator_id', auth()->user()->id)->paginate(10);
        return view('livewire.user-quiz', compact('quizzes'));
    }
}
