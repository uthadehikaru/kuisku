<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Quiz;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class QuizForm extends Component
{
    use WithFileUploads;
    
    public $quiz;
    public $title;
    public $description;
    public $cover_image;
    public $time_limit;
    public $is_public = 1;
    public $question_text;
    public $question_image;
    public $editingQuestion = false;
    public $editingQuestionId;
    public $options = [];
    public $correct_answer;

    public function mount($code=null)
    {
        $this->quiz = Quiz::where('creator_id', auth()->user()->id)->where('code', $code)->first();
        if( $this->quiz )
        {
            $this->title = $this->quiz->title;
            $this->description = $this->quiz->description;
            $this->time_limit = $this->quiz->time_limit;
            $this->is_public = $this->quiz->is_public;
        }
        $this->options = [
            'a' => '',
            'b' => '',
            'c' => '',
            'd' => '',
            'e' => '',
        ];
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'time_limit' => 'required|integer|min:1',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if( $this->quiz )
        {
            $quiz = $this->quiz;
        }
        else
        {
            $quiz = new Quiz();
            $quiz->code = Str::random(10);
        }
        $quiz->creator_id = auth()->user()->id;
        $quiz->title = $this->title;
        $quiz->description = $this->description;
        $quiz->time_limit = $this->time_limit;
        $quiz->is_public = $this->is_public;
        if( $this->cover_image )
        {
            $imagePath = $this->cover_image->store('quiz', 'public');
            $quiz->cover_image = $imagePath;
        }
        $quiz->save();  

        session()->flash('success', 'Kuis berhasil disimpan');
    }

    public function removeCoverImage()
    {
        $this->quiz->cover_image = null;
        $this->quiz->save();
    }

    public function submitQuestion()
    {
        $this->validate([
            'question_text' => 'required|string',
            'options' => 'required|array',
            'options.*' => 'required|string',
            'correct_answer' => 'required|string',  
            'question_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($this->editingQuestion)
        {
            $question = Question::find($this->editingQuestionId);
            $question->question = $this->question_text;
            $question->options = json_encode($this->options);
            $question->correct_answer = $this->correct_answer;
            if( $this->question_image )
            {
                $imagePath = $this->question_image->store('quiz', 'public');
                $question->question_image = $imagePath;
            }
            $question->save();
            session()->flash('success', 'Soal berhasil diubah');
        }
        else
        {
            $question = new Question();
            $question->quiz_id = $this->quiz->id;
            $question->question = $this->question_text;
            $question->options = json_encode($this->options);
            $question->correct_answer = $this->correct_answer;
            if( $this->question_image )
            {
                $imagePath = $this->question_image->store('quiz', 'public');
                $question->question_image = $imagePath;
            }
            $question->save();
            session()->flash('success', 'Soal berhasil ditambahkan');
        }

        $this->quiz->refresh();

        $this->options = [
            'a' => '',
            'b' => '',
            'c' => '',
            'd' => '',
            'e' => '',
        ];
        $this->reset(['question_text', 'correct_answer', 'question_image']);
    }

    public function editQuestion($id)
    {
        $this->editingQuestion = true;
        $this->editingQuestionId = $id;
        $question = Question::find($id);
        $this->question_text = $question->question;
        $this->options = json_decode($question->options, true);
        $this->correct_answer = $question->correct_answer;
        if( $question->question_image )
        {
            $this->question_image = $question->question_image;
        }
    }

    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        $question->delete();
        $this->editingQuestion = false;
        $this->editingQuestionId = null;
        $this->options = [
            'a' => '',
            'b' => '',
            'c' => '',
            'd' => '',
            'e' => '',
        ];
        $this->reset(['question_text', 'correct_answer', 'question_image']);

        session()->flash('success', 'Soal berhasil dihapus');
    }

    public function render()
    {
        return view('livewire.quiz-form');
    }

    public function removeQuestionImage($id)
    {
        $question = Question::find($id);
        $question->question_image = null;
        $question->save();
        $this->question_image = null;
        session()->flash('success', 'Gambar soal berhasil dihapus');
    }
}
