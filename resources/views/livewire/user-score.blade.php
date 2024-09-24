<div>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4">Hasil Kuis</h2>
            <div class="overflow-x-auto">
                <table class="table table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Kode</th>
                            <th class="px-4 py-2">Kuis</th>
                            <th class="px-4 py-2">Durasi</th>
                            <th class="px-4 py-2">Skor</th>
                            <th class="px-4 py-2">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scores as $score)
                            <tr>
                                <td class="px-4 py-2">{{ $score->code }}</td>
                                <td class="px-4 py-2">{{ $score->quiz->title }}</td>
                                <td class="px-4 py-2">{{ round($score->start_at->diffInMinutes($score->end_at)) }} menit</td>
                                <td class="px-4 py-2">{{ $score->points }}</td>
                                <td class="px-4 py-2">{{ $score->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $scores->links() }}
        </div>
    </div>
</div>

