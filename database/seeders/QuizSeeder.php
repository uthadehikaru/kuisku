<?php

namespace Database\Seeders;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $creator = User::factory()->create();

        $quiz = Quiz::create([
            'code' => 'ANIMAL001',
            'title' => 'Mengenal Hewan Mamalia',
            'description' => 'Kuis ini akan menguji pengetahuan Anda tentang berbagai jenis hewan mamalia.',
            'time_limit' => 5,
            'is_public' => true,
            'creator_id' => $creator->id,
        ]);
        $quiz->questions()->createMany([
            [
                'question' => 'Hewan mamalia manakah yang merupakan marsupial?',
                'options' => json_encode(['Singa', 'Kanguru', 'Gajah', 'Paus']),
                'correct_answer' => 1,
                'question_image' => null,
            ],
            [
                'question' => 'Hewan mamalia manakah yang dapat terbang?',
                'options' => json_encode(['Kelelawar', 'Penguin', 'Burung Unta', 'Kucing']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Hewan mamalia terbesar di dunia adalah?',
                'options' => json_encode(['Gajah Afrika', 'Paus Biru', 'Jerapah', 'Badak Putih']),
                'correct_answer' => 1,
                'question_image' => null,
            ],
            [
                'question' => 'Hewan mamalia manakah yang bertelur?',
                'options' => json_encode(['Platypus', 'Koala', 'Beruang', 'Singa Laut']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Hewan mamalia manakah yang hidup di dua alam (air dan darat)?',
                'options' => json_encode(['Berang-berang', 'Harimau', 'Rusa', 'Gorila']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
        ]);

        $plantQuiz = Quiz::create([
            'code' => 'PLANT001',
            'title' => 'Tumbuhan Langka Indonesia',
            'description' => 'Kuis ini akan menguji pengetahuan Anda tentang berbagai jenis tumbuhan langka yang ada di Indonesia.',
            'time_limit' => 5,
            'is_public' => true,
            'creator_id' => $creator->id,
        ]);
        $plantQuiz->questions()->createMany([
            [
                'question' => 'Bunga apakah yang merupakan bunga terbesar di dunia dan ditemukan di Indonesia?',
                'options' => json_encode(['Rafflesia Arnoldii', 'Anggrek Hitam', 'Bunga Bangkai', 'Kantong Semar']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Tumbuhan langka Indonesia yang sering disebut sebagai "pohon seribu guna" adalah?',
                'options' => json_encode(['Cendana', 'Gaharu', 'Ulin', 'Damar']),
                'correct_answer' => 1,
                'question_image' => null,
            ],
            [
                'question' => 'Anggrek apa yang merupakan bunga nasional Indonesia?',
                'options' => json_encode(['Anggrek Bulan', 'Anggrek Hitam', 'Anggrek Macan', 'Anggrek Putih']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Tumbuhan langka Indonesia yang terkenal karena kayunya yang keras dan tahan lama adalah?',
                'options' => json_encode(['Jati', 'Ulin', 'Meranti', 'Mahoni']),
                'correct_answer' => 1,
                'question_image' => null,
            ],
            [
                'question' => 'Tumbuhan karnivora asli Indonesia yang terancam punah adalah?',
                'options' => json_encode(['Kantong Semar', 'Venus Flytrap', 'Sundew', 'Bladderwort']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
        ]);

        $marineQuiz = Quiz::create([
            'code' => 'MARINE001',
            'title' => 'Kehidupan Laut',
            'description' => 'Kuis ini akan menguji pengetahuan Anda tentang berbagai jenis hewan laut dan ekosistemnya.',
            'time_limit' => 5,
            'is_public' => true,
            'creator_id' => $creator->id,
        ]);
        $marineQuiz->questions()->createMany([
            [
                'question' => 'Hewan laut terbesar di dunia adalah?',
                'options' => json_encode(['Paus Biru', 'Hiu Paus', 'Gurita Raksasa', 'Cumi-cumi Colossal']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Ekosistem laut yang sering disebut sebagai "hutan hujan" lautan adalah?',
                'options' => json_encode(['Terumbu Karang', 'Padang Lamun', 'Hutan Mangrove', 'Laut Dalam']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Hewan laut yang memiliki kemampuan kamuflase luar biasa adalah?',
                'options' => json_encode(['Gurita', 'Hiu', 'Paus Pembunuh', 'Lumba-lumba']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Ikan yang dianggap sebagai "fosil hidup" karena telah ada sejak zaman dinosaurus adalah?',
                'options' => json_encode(['Coelacanth', 'Hiu Martil', 'Pari Manta', 'Belut Listrik']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Hewan laut yang menghasilkan cahaya sendiri (bioluminescence) adalah?',
                'options' => json_encode(['Ubur-ubur Kotak', 'Ikan Lantern', 'Cumi-cumi Kunang', 'Semua jawaban benar']),
                'correct_answer' => 3,
                'question_image' => null,
            ],
        ]);

        $spaceQuiz = Quiz::create([
            'code' => 'SPACE001',
            'title' => 'Eksplorasi Angkasa',
            'description' => 'Kuis ini akan menguji pengetahuan Anda tentang angkasa luar, planet-planet, dan fenomena astronomi.',
            'time_limit' => 5,
            'is_public' => true,
            'creator_id' => 1,
        ]);
        $spaceQuiz->questions()->createMany([
            [
                'question' => 'Planet terbesar di tata surya kita adalah?',
                'options' => json_encode(['Jupiter', 'Saturnus', 'Uranus', 'Neptunus']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Fenomena astronomi yang terjadi ketika Bulan berada tepat di antara Bumi dan Matahari disebut?',
                'options' => json_encode(['Gerhana Matahari', 'Gerhana Bulan', 'Supermoon', 'Transit Venus']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Bintang terdekat dengan Bumi selain Matahari adalah?',
                'options' => json_encode(['Proxima Centauri', 'Alpha Centauri A', 'Sirius', 'Betelgeuse']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Galaksi tempat tata surya kita berada disebut?',
                'options' => json_encode(['Bima Sakti', 'Andromeda', 'Triangulum', 'Magellan Besar']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
            [
                'question' => 'Misi luar angkasa NASA yang pertama kali berhasil mendarat di Mars pada tahun 1976 adalah?',
                'options' => json_encode(['Viking', 'Opportunity', 'Curiosity', 'Perseverance']),
                'correct_answer' => 0,
                'question_image' => null,
            ],
        ]);
    }
}
