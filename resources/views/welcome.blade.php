@extends('layouts.web')
@section('content')
<section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-12 items-center justify-center flex-col">
        <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero"
            src="{{ asset('kuisku.png') }}">
        <div class="text-center lg:w-2/3 w-full">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Selamat Datang di KuisKu Online</h1>
            <p class="mb-8 leading-relaxed">Uji pengetahuan Anda dengan berbagai kuis menarik dari berbagai topik. Tantang diri Anda, belajar hal baru, dan raih pencapaian tertinggi!</p>
            <div class="flex justify-center">
                <a href="#quiz-list"
                    class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Mulai Kuis</a>
            </div>
        </div>
    </div>
</section>
<!-- begin feature -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-12 mx-auto">
        <h1 class="sm:text-3xl text-2xl font-medium title-font text-center text-gray-900 mb-20">Fitur Unggulan KuisKu
            <br class="hidden sm:block">Pengalaman Kuis Online Terbaik
        </h1>
        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
            <div class="p-4 md:w-1/3 flex">
                <div
                    class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-yellow-100 text-yellow-500 mb-4 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                </div>
                <div class="flex-grow pl-6">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-2">Beragam Topik</h2>
                    <p class="leading-relaxed text-base">Nikmati berbagai macam topik kuis dari pengetahuan umum, sains, sejarah, hingga pop culture. Selalu ada sesuatu yang baru untuk dipelajari!</p>
                    <a class="mt-3 text-yellow-500 inline-flex items-center">Jelajahi Topik
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="p-4 md:w-1/3 flex">
                <div
                    class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-yellow-100 text-yellow-500 mb-4 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                        <circle cx="6" cy="6" r="3"></circle>
                        <circle cx="6" cy="18" r="3"></circle>
                        <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                    </svg>
                </div>
                <div class="flex-grow pl-6">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-2">Peringkat & Pencapaian</h2>
                    <p class="leading-relaxed text-base">Bandingkan skor Anda dengan pemain lain, raih badge prestasi, dan pamerkan pencapaian Anda di profil KuisKu Anda.</p>
                    <a class="mt-3 text-yellow-500 inline-flex items-center">Lihat Peringkat
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="p-4 md:w-1/3 flex">
                <div
                    class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-yellow-100 text-yellow-500 mb-4 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="flex-grow pl-6">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-2">Buat Kuis Sendiri</h2>
                    <p class="leading-relaxed text-base">Jadilah kreator konten! Buat kuis Anda sendiri dan bagikan dengan komunitas KuisKu. Lihat seberapa populer kuis buatan Anda.</p>
                    <a class="mt-3 text-yellow-500 inline-flex items-center">Mulai Membuat
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end feature -->
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
    <a href="{{ route('quiz.list') }}" class="mt-4 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Lihat Semua</a>
  </div>
</section>
@endsection
