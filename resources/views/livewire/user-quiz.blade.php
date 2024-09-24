<div>
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Kuis Saya</h2>
    </div>
    @if(session('success'))
        <div class="alert alert-success my-2">
            {{ session('success') }}
        </div>
    @endif
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Judul</th>
                <th class="py-2 px-4 border-b">Deskripsi</th>
                <th class="py-2 px-4 border-b">Batas Waktu</th>
                <th class="py-2 px-4 border-b">Tipe</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quizzes as $quiz)
                <tr>
                    <td class="py-2 px-4 border-b"><a class="text-blue-500 font-bold" href="{{ route('quiz.detail', $quiz->code) }}">{{ $quiz->title }}</a></td>
                    <td class="py-2 px-4 border-b">{{ $quiz->description }}</td>
                    <td class="py-2 px-4 border-b">{{ $quiz->time_limit }} menit</td>
                    <td class="py-2 px-4 border-b">{{ $quiz->is_public ? 'Publik' : 'Privat' }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('quiz.form', $quiz->code) }}" class="text-blue-500">Edit</a>
                        <form wire:submit.prevent="delete({{ $quiz->id }})" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kuis ini?');" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="4" class="text-center"><a href="{{ route('quiz.form') }}" class="text-blue-500 p-4">Buat kuis baru</a></td>
                </tr>
        </tbody>
    </table>
    <div class="mt-4">
        {{ $quizzes->links() }}
    </div>
</div>
</div>
