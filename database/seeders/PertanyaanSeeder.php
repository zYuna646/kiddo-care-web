<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Perawatan bayi 1-3bulan
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa mengangkat kepala mandiri hingga setinggi 45 derajat?',
            'min' => 1,
            'max' => 3,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa menggerakkan kepala dari kiri/kanan ke tengah?
            ',
            'min' => 1,
            'max' => 3,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa melihat dan menatap wajah anda?
            ',
            'min' => 1,
            'max' => 3,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa mengoceh spontan atau bereaksi dengan mengoceh?
            ',
            'min' => 1,
            'max' => 3,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi suka tertawa keras?
            ',
            'min' => 1,
            'max' => 3,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bereaksi terkejut terhadap suara keras? ',
            'min' => 1,
            'max' => 3,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi membalas tersenyum ketika diajak bicara/ tersenyum?',
            'min' => 1,
            'max' => 3,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi mengenal ibu dengan penglihatan, penciuman,
            pendengaran, kontak?',
            'min' => 1,
            'max' => 3,
        ]);


        //Perawatan bayi usia 3-6bulan
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa berbalik dari telungkup ke telentang?',
            'min' => 3,
            'max' => 6,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa mengangkat kepala secara mandiri hingga tegak 90˚?
            ',
            'min' => 3,
            'max' => 6,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Bayi bayi bisa mempertahankan posisi kepala tetap tegak dan stabil?
            ',
            'min' => 3,
            'max' => 6,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa menggenggam mainan kecil atau mainan bertangkai?
            ',
            'min' => 3,
            'max' => 6,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa meraih benda yang ada dalam jangkauannya?
            ',
            'min' => 3,
            'max' => 6,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa mengamati tangannya sendiri?',
            'min' => 3,
            'max' => 6,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi berusaha memperluas pandangan?',
            'min' => 3,
            'max' => 6,

        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi mengarahkan matanya pada benda-benda kecil?',
            'min' => 3,
            'max' => 6,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi mengeluarkan suara gembira bernada tinggi atau memekik',
            'min' => 3,
            'max' => 6,

        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi tersenyum ketika melihat mainan/ gambar yang menarik saat bermain sendiri?',
            'min' => 3,
            'max' => 6,
        ]);


        //Perawatan bayi usia 6-9bulan
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa duduk secara mandiri?',
            'min' => 6,
            'max' => 9,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Bayi belajar berdiri, kedua kakinya menyangga sebagian berat badan?
            ',
            'min' => 6,
            'max' => 9,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa merangkak meraih mainan atau mendekati seseorang?
            ',
            'min' => 6,
            'max' => 9,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa memindahkan benda dari satu tangan ke tangan lainnya?
            ',
            'min' => 6,
            'max' => 9,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa memungut 2 benda, kedua tangan pegang 2 benda pada saat bersamaan?
            ',
            'min' => 6,
            'max' => 9,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa memungut benda sebesar kacang dengan cara meraup?',
            'min' => 6,
            'max' => 9,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bersuara tanpa arti, mamama, bababa, dadada, tatatata?',
            'min' => 6,
            'max' => 9,

        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi mencari mainan/benda yang dijatuhkan?',
            'min' => 6,
            'max' => 9,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bermain tepuk tangan/ciluk ba',
            'min' => 6,
            'max' => 9,

        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bergembira dengan melempar benda?',
            'min' => 6,
            'max' => 9,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi makan kue sendiri?',
            'min' => 6,
            'max' => 9,
        ]);

        //Perawatan bayi usia 9-12bulan
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa mengangkat badannya ke posisi berdiri?',
            'min' => 9,
            'max' => 12,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Bayi belajar berdiri selama 30 detik atau berpegangan di kursi?
            ',
            'min' => 9,
            'max' => 12,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Bayi dapat berjalan dengan dituntun?
            ',
            'min' => 9,
            'max' => 12,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi mengulurkan lengan/ badan untuk meraih mainan yang diinginkan?
            ',
            'min' => 9,
            'max' => 12,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bisa menggenggam erat pensil?
            ',
            'min' => 9,
            'max' => 12,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi memasukkan benda ke mulut?',
            'min' => 9,
            'max' => 12,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi mengulang menirukan bunyi yang didengar?',
            'min' => 9,
            'max' => 12,

        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi menyebut 2-3 suku kata yang sama tanpa arti?',
            'min' => 9,
            'max' => 12,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi mengeksplorasi sekitar, ingin tahu, ingin menyentuh apa saja?',
            'min' => 9,
            'max' => 12,

        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi bereaksi terhadap suara yang perlahan atau bisikan?',
            'min' => 9,
            'max' => 12,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi senang diajak bermain “CILUKBA”?',
            'min' => 9,
            'max' => 12,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Bayi mengenal anggota keluarga, takut pada orang yang belum dikenal?',
            'min' => 9,
            'max' => 12,
        ]);

        //Perawatan bayi usia 12-18bulan
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa berdiri sendiri tanpa berpegangan?',
            'min' => 12,
            'max' => 18,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa membungkuk memungut mainan kemudian berdiri kembali?
            ',
            'min' => 12,
            'max' => 18,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa berjalan mundur lima langkah?
            ',
            'min' => 12,
            'max' => 18,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa memanggil ayah dengan kata ”papa”, memanggil ibu dengan kata ”mama”?
            ',
            'min' => 12,
            'max' => 18,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menumpuk dua kubus?
            ',
            'min' => 12,
            'max' => 18,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa memasukkan kubus di kotak?',
            'min' => 12,
            'max' => 18,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menunjuk apa yang diinginkan tanpa menangis/merengek, anak bisa mengeluarkan suara yang menyenangkan atau menarik tangan ibu?',
            'min' => 12,
            'max' => 18,

        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa memperlihatkan rasa cemburu / bersaing?',
            'min' => 12,
            'max' => 18,
        ]);

        //Perawatan bayi usia 18-24bulan
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa berdiri sendiri tanpa berpegangan 30 detik? ',
            'min' => 18,
            'max' => 24,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa berjalan tanpa terhuyung-huyung?
            ',
            'min' => 18,
            'max' => 24,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menumpuk 4 buah kubus?
            ',
            'min' => 18,
            'max' => 24,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa memungut benda kecil dengan ibu jari dan jari telunjuk?
            ',
            'min' => 18,
            'max' => 24,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menggelindingkan bola ke arah sasaran?
            ',
            'min' => 18,
            'max' => 24,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menyebut 3 - 6 kata yang mempunyai arti?',
            'min' => 18,
            'max' => 24,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa membantu/menirukan pekerjaan rumah tanggal?',
            'min' => 18,
            'max' => 24,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa memegang cangkir sendiri, belajar makan-minum sendiri? ',
            'min' => 18,
            'max' => 24,
        ]);

        //Perawatan bayi usia 24-36bulan
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa jalan naik tangga sendiri?',
            'min' => 24,
            'max' => 36,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa bermain dan menendang bola kecil?
            ',
            'min' => 24,
            'max' => 36,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mencoret-coret pensil pada kertas?
            ',
            'min' => 24,
            'max' => 36,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa bicara dengan baik, menggunakan 2 kata?
            ',
            'min' => 24,
            'max' => 36,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menunjuk 1 atau lebih bagian tubuhnya ketika diminta?
            ',
            'min' => 24,
            'max' => 36,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa melihat gambar dan dapat menyebut dengan benar nama 2 benda atau lebih?',
            'min' => 24,
            'max' => 36,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa membantu memungut mainannya sendiri atau membantu mengangkat piring jika diminta?',
            'min' => 24,
            'max' => 36,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa makan nasi sendiri tanpa banyak tumpah? ',
            'min' => 24,
            'max' => 36,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa melepas pakaiannya sendiri?',
            'min' => 24,
            'max' => 36,
        ]);

        //Perawatan bayi usia 36-48bulan
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa berdiri 1 kaki 2 detik?',
            'min' => 36,
            'max' => 48,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa melompat kedua kaki diangkat?
            ',
            'min' =>36,
            'max' => 48,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengayuh sepeda roda tiga?
            ',
            'min' => 36,
            'max' => 48,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menggambar garis lurus?
            ',
            'min' => 36,
            'max' => 48,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menumpuk 8 buah kubus?
            ',
            'min' => 36,
            'max' => 48,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengenal 2-4 warna?',
            'min' => 36,
            'max' => 48,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menyebut nama, umur, tempat?',
            'min' => 36,
            'max' => 48,

        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengerti arti kata di atas, di bawah, di depan?',
            'min' => 36,
            'max' => 48,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mendengarkan cerita?',
            'min' => 36,
            'max' => 48,

        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mencuci dan mengeringkan tangan sendiri?',
            'min' => 36,
            'max' => 48,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bermain bersama teman, mengikuti aturan permainan?',
            'min' => 36,
            'max' => 48,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengenakan sepatu sendiri?',
            'min' => 36,
            'max' => 48,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengenakan celana panjang, kemeja, baju?',
            'min' => 36,
            'max' => 48,
        ]);

        //Perawatan bayi usia 48-60bulan
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa berdiri 1 kaki 6 detik',
            'min' => 48,
            'max' => 60,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa melompat-lompat 1 kaki
            ',
            'min' => 48,
            'max' => 60,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menari
            ',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menggambar tanda silang
            ',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menggambar lingkaran
            ',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menggambar orang dengan 3 bagian tubuh',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengancing baju atau pakaian boneka',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menyebut nama lengkap tanpa dibantu',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa senang menyebut kata-kata baru',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa senang bertanya tentang sesuatu ',
            'min' => 48,
            'max' => 60,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menjawab pertanyaan dengan kata-kata yang benar
            ',
            'min' => 48,
            'max' => 60,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa bicara yang mudah dimengerti
            ',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa bisa membandingkan/membedakan sesuatu dari ukuran dan bentuknya
            ',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menyebut angka, menghitung jari
            ',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menyebut nama-nama hari',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa berpakaian sendiri tanpa dibantu',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menggosok gigi tanpa dibantu',
            'min' => 48,
            'max' => 60,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bereaksi tenang dan tidak rewel ketika ditinggal ibu',
            'min' => 48,
            'max' => 60,
        ]);



        //Perawatan bayi usia 60-72bulan
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa berjalan lurus?',
            'min' => 60,
            'max' => 72,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa berdiri dengan 1 kaki selama 11 detik?
            ',
            'min' => 60,
            'max' => 72,
        ]);

        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menggambar dengan 6 bagian, menggambar orang lengkap?
            ',
            'min' => 60,
            'max' => 72,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menangkap bola kecil dengan kedua tangan?
            ',
            'min' => 60,
            'max' => 72,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menggambar segi empat?
            ',
            'min' => 60,
            'max' => 72,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengerti arti lawan kata?',
            'min' => 60,
            'max' => 72,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengerti pembicaraan yang menggunakan 7 kata atau lebih?',
            'min' => 60,
            'max' => 72,

        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa menjawab pertanyaan tentang benda terbuat dari apa dan kegunaannya?',
            'min' => 60,
            'max' => 72,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengenal angka, bisa menghitung angka 5 -10?',
            'min' => 60,
            'max' => 72,

        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengenal warna-warni?',
            'min' => 60,
            'max' => 72,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengungkapkan simpati?',
            'min' => 60,
            'max' => 72,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa mengikuti aturan permainan?',
            'min' => 60,
            'max' => 72,
        ]);
        Pertanyaan::create([
            'pertanyaan' => 'Anak bisa berpakaian sendiri tanpa dibantu?',
            'min' => 60,
            'max' => 72,
        ]);
    }
}
