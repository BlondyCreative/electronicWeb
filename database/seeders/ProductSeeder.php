<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
Product::updateOrCreate(
        [
        'name' => 'iphone 13 improved battery life, durable design with IP68 water resistance',
        ],
        [
        'price' => 340,
        'image' => 'img/iphon13.png',
        'category' => 'Tech',
        'description' => '6.1-inch Super Retina XDR display, the powerful A15 Bionic chip, a dual 12MP wide/ultra-wide camera system with Sensor-shift OIS, IP68 water resistance.'
    ],
);
Product::updateOrCreate(
        [
        'name' => 'airpods 4 generation, durable design with IP68 water resistance',
        ],
        [
        'price' => 340,
        'image' => 'img/airpod.png',
        'category' => 'Tech',
        'description' => '6.1-inch Super Retina XDR display, the powerful A15 Bionic chip, a dual 12MP wide/ultra-wide camera system with Sensor-shift OIS, IP68 water resistance.'
    ],
);
Product::updateOrCreate(
        [
        'name' => 'iphone 15 256GB Aluminum frame, Ceramic Shield front, color-infused glass back',
        ],
        [
        'price' => 670.99,
        'image' => 'img/iphon15.png',
        'category' => 'Tech',
        'description' => '256GB Aluminum frame, Ceramic Shield front, color-infused glass back'
    ],
);
Product::updateOrCreate(
        [
        'name' => 'iphone 13 Pro durable design with IP68 water resistance',
        ],
        [
        'price' => 340,
        'image' => 'img/iphon13pro.png',
        'category' => 'Tech',
        'description' => '6.1-inch Super Retina XDR display, the powerful A15 Bionic chip, a dual 12MP wide/ultra-wide camera system with Sensor-shift OIS, IP68 water resistance.'
    ],
);
Product::updateOrCreate(
        [
        'name' => 'airpods Max, durable design with IP68 water resistance',
        ],
        [
        'price' => 340,
        'image' => 'img/airpodMax.png',
        'category' => 'Tech',
        'description' => '6.1-inch Super Retina XDR display, the powerful A15 Bionic chip, a dual 12MP wide/ultra-wide camera system with Sensor-shift OIS, IP68 water resistance.'
    ],
);
Product::updateOrCreate(
        [
        'name' => 'iphone 16 Pro improved battery life, durable design with IP68 water resistance',
        ],
        [
        'price' => 340,
        'image' => 'img/iphon16pro.png',
        'category' => 'Tech',
        'description' => '6.1-inch Super Retina XDR display, the powerful A15 Bionic chip, a dual 12MP wide/ultra-wide camera system with Sensor-shift OIS, IP68 water resistance.'
    ],
);

    }

};
