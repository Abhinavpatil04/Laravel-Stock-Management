<?php

use App\Models\Asset;
use App\Models\Team;
use Illuminate\Database\Seeder;

/**
 * Class AssetsTableSeeder
 */
class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $books = [
            'To Kill a Mockingbird',
            'The Little Prince',
            'Siddhartha',
            'Candide',
            'The Girl with the Dragon Tattoo',
        ];

        $author = [
            'Harper Lee',
            'Antoine de Saint-Exupery',
            'Herman Hesse',
            'Voltaire',
            'Stieg Larsson',
        ];

        $publication = [
            'Hardcover – Deckle Edge',
            'Hardcover – Bargain Price',
            'Hardcover - Hilda Rosner',
            'Hardcover - Simon & Brown',
            'Hardcover – Deckle Edge',
        ];

        $cost = [
            '2063.19',
            '1182.27',
            '2225.00',
            '863.58',
            '2889.62',
        ];
    }
}
