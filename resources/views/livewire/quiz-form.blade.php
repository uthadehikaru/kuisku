<div>
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">{{ $quiz ? 'Edit Kuis' : 'Buat Kuis Baru' }}</h2>
            <a href="{{ route('dashboard') }}" class="btn btn-warning">Kembali</a>
        </div>
        <form wire:submit.prevent="submit">
            <div class="mb-4">
                <label for="title" class="block text-gray-700">Judul Kuis</label>
                <input type="text" id="title" wire:model="title" placeholder="Masukkan Judul Kuis" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Deskripsi</label>
                <textarea id="description" wire:model="description" placeholder="Masukkan Deskripsi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="time_limit" class="block text-gray-700">Batas Waktu (menit)</label>
                <input type="number" id="time_limit" wire:model="time_limit" placeholder="Masukkan Batas Waktu" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @error('time_limit') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="is_public" class="block text-gray-700">Tipe</label>
                <select id="is_public" wire:model="is_public" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="1" {{ $is_public ? 'selected' : '' }}>Publik</option>
                    <option value="0" {{ !$is_public ? 'selected' : '' }}>Privat</option>
                </select>
                @error('is_public') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="cover_image" class="block text-gray-700">Gambar</label>
                <input type="file" id="cover_image" wire:model="cover_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*">
                @error('cover_image') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            @if($quiz && $quiz->cover_image)
                <div class="mb-4">
                    <button wire:click="removeCoverImage" class="text-red-500">Hapus gambar</button>
                    <img src="{{ asset('storage/'.$quiz->cover_image) }}" alt="Gambar Soal" class="max-w-full h-auto rounded-lg">
                    </div>
            @endif
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan Kuis</button>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        @if($quiz)
            <div class="mt-8">
                <h3 class="text-xl font-bold mb-4">Daftar Soal</h3>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Pertanyaan</th>
                            <th class="py-2 px-4 border-b">Pilihan</th>
                            <th class="py-2 px-4 border-b">Jawaban Benar</th>
                            <th class="py-2 px-4 border-b">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quiz->questions as $question)
                            <tr>
                                <td class="py-2 px-4 border-b">
                                    {{ $question->question }}
                                    @if($question->question_image)
                                        <img src="{{ asset('storage/'.$question->question_image) }}" alt="Gambar Soal" class="max-w-full h-auto rounded-lg">
                                        <button wire:click="removeQuestionImage({{ $question->id }})" class="text-red-500">Hapus gambar</button>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b">
                                    @foreach(json_decode($question->options) as $option=>$value)
                                        {{ $option }} : {{ $value }}<br>
                                    @endforeach
                                </td>
                                <td class="py-2 px-4 border-b">{{ $question->correct_answer }}</td>
                                <td class="py-2 px-4 border-b">
                                    <button wire:click="editQuestion({{ $question->id }})" class="text-blue-500">Edit</button>
                                    <button wire:click="deleteQuestion({{ $question->id }})" onclick="return confirm('Apakah Anda yakin ingin menghapus soal ini?')" class="text-red-500 ml-2">Hapus</button>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-8">
            <h3 class="text-xl font-bold mb-4">{{ $editingQuestion ? 'Edit Soal' : 'Tambah Soal Baru' }}</h3>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form wire:submit.prevent="submitQuestion">
                <div class="mb-4">
                    <label for="question_text" class="block text-gray-700">Pertanyaan</label>
                    <textarea id="question_text" wire:model="question_text" placeholder="Masukkan Pertanyaan" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                    @error('question_text') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                @foreach($options as $option=>$value)
                <div class="mb-4">
                    <label for="{{$option}}" class="block text-gray-700">Pilihan {{ $option }}</label>
                    <input type="text" id="{{$option}}" wire:model="options.{{$option}}" placeholder="Masukkan Pilihan {{ $option }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('options.'.$option) <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                @endforeach
                <div class="mb-4">
                    <label for="correct_answer" class="block text-gray-700">Jawaban Benar</label>
                    <select id="correct_answer" wire:model="correct_answer" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Pilih Jawaban Benar</option>
                        @foreach($options as $option=>$value)
                        <option value="{{$option}}">{{$option}}</option>
                        @endforeach
                    </select>
                    @error('correct_answer') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="question_image" class="block text-gray-700">Gambar</label>
                    <input type="file" id="question_image" wire:model="question_image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" accept="image/*">
                    @error('question_image') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed" class="bg-blue-500 text-white px-4 py-2 rounded-md">{{ $editingQuestion ? 'Update Soal' : 'Tambah Soal' }}</button>
                </div>
            </form>
        </div>
</div>
</div>
