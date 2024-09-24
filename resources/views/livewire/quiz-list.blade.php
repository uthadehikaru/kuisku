<div id="quiz-list">
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap w-full mb-20">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Daftar Kuis</h1>
        <div class="h-1 w-20 bg-indigo-500 rounded"></div>
      </div>
      <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Temukan berbagai kuis menarik untuk menguji pengetahuan Anda.</p>
    </div>
    <div class="flex flex-wrap -m-4">
      @foreach($quizzes as $quiz)
      <div class="xl:w-1/4 md:w-1/2 p-4">
        <div class="bg-gray-100 p-6 rounded-lg">
          <a href="{{ route('quiz.detail', $quiz->code) }}">
            <img class="h-40 rounded w-full object-contain object-center mb-6" src="{{ $quiz->cover_image ? asset('storage/'.$quiz->cover_image) : asset('no photo.jpg') }}" alt="content">
          </a>
          <a href="{{ route('quiz.detail', $quiz->code) }}">
            <h2 class="text-lg text-primary font-medium title-font mb-4">{{ $quiz->title }}</h2>
            <p class="leading-relaxed text-base">{{ $quiz->description }}</p>
          </a>
        </div>
      </div>
      @endforeach
    </div>
    <div class="mt-4">
      {{ $quizzes->links() }}
    </div>
  </div>
</section>
</div>
