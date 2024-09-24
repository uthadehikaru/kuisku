<div>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4">Hasil Kuis</h2>
            <p class="text-lg mb-6">Skor Anda: {{ $score->points }}</p>
            <p class="text-lg mb-6">Waktu Mulai: {{ $score->start_at->format('H:i:s') }}</p>
            <p class="text-lg mb-6">Waktu Selesai: {{ $score->end_at->format('H:i:s') }}</p>
            <p class="text-lg mb-6">Waktu Pengerjaan: {{ $score->end_at->diff($score->start_at)->format('%H:%I:%S') }}</p>
            <a href="{{ url('dashboard') }}" class="btn btn-primary">Lihat Hasil Lainnya</a>
        </div>
    </div>
</div>
