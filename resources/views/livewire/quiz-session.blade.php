<div>
    <div class="container mx-auto px-4 py-8">
        @if(session()->has('error'))
            <div class="alert alert-error">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-4xl font-bold">Kuis {{ $quiz->name }}</h1>
            <p class="text-lg">Kuis ini akan berlangsung selama {{ $quiz->time_limit }} menit.</p>
            <p class="text-lg" wire:poll="timer">{{ $countdown }}</p>
        </div>
        <form wire:submit.prevent="submitAnswer" class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4">Pertanyaan Kuis {{ $questionIndex + 1 }} dari {{ count($questions) }}</h2>
            <p class="text-lg mb-4">terjawab {{ count($answers) }}</p>
            @if($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Gambar Soal -->
            @if($activeQuestion->question_image)
                <div class="my-6">
                    <img src="{{ asset('storage/'.$activeQuestion->question_image) }}" alt="Gambar Soal" class="max-w-full h-auto rounded-lg">
                </div>
            @endif
            
            <!-- Teks Soal -->
            <p class="text-lg mb-6">{{ $activeQuestion->question }}</p>
            
            <!-- Pilihan Jawaban -->
            <div class="space-y-4">
                @foreach(json_decode($activeQuestion->options) as $id => $option)
                    <div class="flex items-center p-3 border rounded-lg hover:bg-gray-100">
                        <input type="radio" id="option{{ $id }}" wire:model="answer" name="answer" value="{{ $id }}" {{ $answer == $id ? 'checked' : '' }} class="mr-3">
                        <label for="option{{ $id }}" class="flex-grow cursor-pointer">{{ $option }}</label>
                    </div>
                @endforeach
            </div>
            
            <!-- Tombol Submit -->
            <div class="mt-8 flex gap-4 justify-center">
                @if($questionIndex > 0)
                <button wire:click="previousQuestion" type="button" class="btn btn-warning">
                    Sebelumnya
                </button>
                @endif
                <button type="submit" class="btn btn-primary">
                    Submit Jawaban
                </button>
                @if($questionIndex < count($questions) - 1)
                <button wire:click="nextQuestion" type="button" class="btn btn-success">
                    Selanjutnya
                </button>
                @else
                <button type="button" wire:click="submitQuiz" class="btn btn-success">
                    Selesai
                </button>
                @endif
            </div>
        </form>
    </div>
</div>
