<?php

namespace App\Livewire;

use App\Models\Score;
use Livewire\Component;
use Livewire\WithPagination;

class UserScore extends Component
{
    use WithPagination;
    
    public function render()
    {
        $scores = Score::where('user_id', auth()->user()->id)->paginate(10);
        return view('livewire.user-score', compact('scores'));
    }
}
