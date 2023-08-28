<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create([
            'name' => 'Produit 1',
            'price' => 19.99,
            'img' => 'chemin/vers/image1.jpg',
            ]);

        Item::create([
            'name' => 'Produit 2',
            'price' => 49.99,
            'img' => 'chemin/vers/image2.jpg',
            ]);

        Item::create([
            'name' => 'Produit 3',
            'price' => 74.99,
            'img' => 'chemin/vers/image3.jpg',
            ]);

        Item::create([
            'name' => 'Produit 4',
            'price' => 99.99,
            'img' => 'chemin/vers/image4.jpg',
            ]);
    }

}
