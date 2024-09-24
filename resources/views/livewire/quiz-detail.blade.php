<div>
<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-col">
        <div class="lg:w-4/6 mx-auto">
            <div class="rounded-lg h-64 overflow-hidden">
                <img alt="Quiz Cover" class="object-contain object-center h-full w-full"
                    src="{{ $quiz->cover_image ? asset('storage/'.$quiz->cover_image) : asset('no photo.jpg') }}">
            </div>
            <div class="flex flex-col sm:flex-row mt-10">
                <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                    <div
                        class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-yellow-100 text-yellow-500">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="flex flex-col items-center text-center justify-center">
                        <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $quiz->title }}</h2>
                        <div class="w-12 h-1 bg-yellow-500 rounded mt-2 mb-4"></div>
                        <p class="text-base">Dibuat oleh: {{ $quiz->creator->name }}</p>
                    </div>
                </div>
                <div
                    class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                    <h3 class="text-2xl font-semibold mb-4">Deskripsi Kuis</h3>
                    <p class="leading-relaxed text-lg mb-4">{{ $quiz->description }}</p>
                    <div class="mb-4">
                        <p class="text-gray-700"><strong>Jumlah Pertanyaan:</strong> {{ $quiz->questions_count }}</p>
                        <p class="text-gray-700"><strong>Waktu:</strong> {{ $quiz->time_limit }} menit</p>
                    </div>
                    <button wire:click="startQuiz" class="btn btn-primary">Mulai Kuis</button>
                </div>
            </div>
        </div>
    </div>
</section>
