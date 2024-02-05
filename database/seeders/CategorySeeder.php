<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryName = ['Sports',
        'Food',
        'Fashion',
        'Laptop',
        'Smartphone',
        'Kitchen',
        'Shoe',
        'Clothes'];
        $categoryDesc = [
            'Sports' => 'Temukan segala perlengkapan dan peralatan olahraga terbaik untuk mendukung gaya hidup sehat dan aktif Anda. Dari sepatu lari hingga peralatan fitness, kami menyediakan produk berkualitas tinggi untuk membantu Anda mencapai kinerja terbaik dalam setiap latihan Anda.',
            'Food' => 'Jelajahi dunia kuliner dengan koleksi makanan lezat dan minuman yang menyegarkan. Dari bahan-bahan dapur premium hingga makanan siap saji, kami memiliki segala yang Anda butuhkan untuk memuaskan selera kuliner Anda. Rasakan nikmatnya pengalaman belanja makanan secara online di toko kami!',
            'Fashion' => 'Temukan gaya terkini dan tren mode di koleksi pakaian dan aksesori kami. Dari pakaian kasual hingga busana pesta, kami menawarkan berbagai pilihan untuk memenuhi kebutuhan fashion Anda. Lengkapi gaya Anda dengan sepatu dan aksesori terbaru, dan tampil beda setiap saat!',
            'Laptop' => 'Eksplorasi dunia komputasi dengan koleksi laptop dan perangkat keras terkini. Dari laptop ringan untuk mobilitas hingga workstation kuat untuk produktivitas, kami menyediakan berbagai opsi untuk memenuhi kebutuhan Anda. Dapatkan ulasan terpercaya dan penawaran menarik di toko kami!',
            'Smartphone' => 'Dapatkan yang terbaik dari teknologi mobile dengan koleksi smartphone terbaru. Dari fitur canggih hingga desain elegan, kami menyediakan pilihan handphone yang memenuhi kebutuhan komunikasi dan hiburan Anda. Lihat ulasan terbaru dan penawaran eksklusif di toko kami!',
            'Kitchen' => 'Perbarui dapur Anda dengan koleksi perlengkapan dapur terbaik. Dari alat memasak hingga peralatan penyimpanan, kami menyediakan produk berkualitas untuk memudahkan pengalaman memasak Anda. Temukan resep lezat dan tips memasak dari para ahli di toko kami!',
            'Shoe' => 'Dapatkan penampilan yang sempurna dengan koleksi sepatu terbaru. Mulai dari sepatu olahraga yang nyaman hingga sepatu formal yang elegan, kami menawarkan berbagai pilihan untuk setiap gaya. Temukan merek terkemuka dan ulasan lengkap di toko sepatu kami!',
            'Clothes' => 'Tingkatkan gaya Anda dengan koleksi pakaian dan aksesori mode terkini. Dari pakaian sehari-hari hingga pilihan pakaian untuk acara khusus, kami menawarkan berbagai opsi untuk mengekspresikan diri. Lihat tren mode terbaru dan temukan penawaran eksklusif di toko busana kami!'
        ];

        foreach ($categoryName as $name) {
            DB::table('categories')->insert([
                'name' => $name,
                'description' => $categoryDesc[$name]
            ]);
    }
}
}
