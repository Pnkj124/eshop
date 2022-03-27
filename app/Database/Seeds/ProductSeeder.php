<?php

namespace App\Database\Seeds;

use App\Models\ProductModel;
use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $model = new ProductModel();
        $model->insertBatch([
            [
                "title" => "Samsung Galaxy S21 Ultra",
                "code" => "samsung-galaxy-s21-ultra",
                "short_description" => "The highest resolution photos and video on a smartphone",
                "long_description" => "Samsung Electronics Co., Ltd. unveiled the Galaxy S21 Ultra, a flagship that pushes the boundaries of what a smartphone can do. The S21 Ultra pulls out all the stops for those who want Samsung’s best-of-the-best with our most advanced pro-grade camera system and our brightest, most intelligent display. It takes productivity and creativity up a notch by bringing the popular S Pen experience to the Galaxy S series for the first time.",
                "price" => 155000,
                "quantity" => 35,
                "image" => "samsung.jpg",
                "category_id" => 3,
                "brand_id" => 3,
                "publish_status" => "published",
            ],
            [
                "title" => "Mountain Rain Jacket",
                "code" => "mountain-rain-jacket",
                "short_description" => "A Lightweight Rain Jacket for Wet Weather Rides.",
                "long_description" => "A Lightweight Rain Jacket for Wet Weather Rides.",
                "price" => 29550,
                "quantity" => 30,
                "image" => "jacket.jpg",
                "category_id" => 34,
                "brand_id" => 5,
                "publish_status" => "published",
            ],
            [
                "title" => "Galaxy Buds Pro",
                "code" => "galaxy-buds-pro",
                "short_description" => "Introducing the New Galaxy Buds Pro",
                "long_description" => "Introducing the New Galaxy Buds Pro",
                "price" => 250,
                "quantity" => 20,
                "image" => "buds.jpg",
                "category_id" => 1,
                "brand_id" => 5,
                "publish_status" => "published",
            ],
            [
                "title" => "AUE60 Crystal 4K UHD",
                "code" => "aue60-crystal-4k-uhd",
                "short_description" => "4K UHD TV goes beyond regular FHD with 4x more pixels, offering your eyes the sharp and crisp images they deserve. Now you can see even the small details in the scene.",
                "long_description" => "4K UHD TV goes beyond regular FHD with 4x more pixels, offering your eyes the sharp and crisp images they deserve. Now you can see even the small details in the scene.",
                "price" => 32000,
                "quantity" => 30,
                "image" => "tv.jpg",
                "category_id" => 14,
                "brand_id" => 6,
                "publish_status" => "published",
            ],
            [
                "title" => "Ultraboost DNA Black Python Shoes",
                "code" => "ultraboost-dna-black-python-shoes",
                "short_description" => "Responsive shoes snakeskin acc.",
                "long_description" => "Black pythons are sleek, cool and a little bit dangerous. Channel the exotic beauty of the Australian snake and make it yours in these adidas Ultraboost DNA Black Python Shoes. The stretchy knit upper features snakeskin-inspired details. Energy-returning cushioning keeps you comfortable when you're on the move.",
                "price" => 32000,
                "quantity" => 30,
                "image" => "shoe.jpg",
                "category_id" => 37,
                "brand_id" => 10,
                "publish_status" => "published",
            ],
            [
                "title" => "Razer 15.6",
                "code" => "razer-15",
                "short_description" => "Designed for gaming, the Razer 15.6\" Blade 15 Gaming Laptop combines mobility with performance. Graphics are handled by the dedicated NVIDIA GeForce GTX 1660 Ti graphics card with VRAM.     ",
                "long_description" => "Designed for gaming, the Razer 15.6\" Blade 15 Gaming Laptop combines mobility with performance. Graphics are handled by the dedicated NVIDIA GeForce GTX 1660 Ti graphics card with VRAM. It also features a 10th Gen 2.6 GHz Intel Core i7-10750H six-core processor and 16GB of 2933 MHz of DDR4 RAM. Its 256GB NVME PCIe M.2 SSD allows for fast boot times. For online multiplayer features, the Razer Blade 15 can utilize Wi-Fi 6 (802.11ax) or a wired Gigabit Ethernet connection. It also supports wireless accessories via Bluetooth 5.1 technology. The Razer Blade 15 features a precision-crafted aluminum chassis.    The 15.6\" display features a FHD 1920 x 1080 resolution and are individually factory calibrated, providing 100% of the sRGB color space. The bezels are thin, measuring in at about 4.9mm. The screen also has a matte finish to reduce glare in brightly-lit environments. The keyboard is backlit and supports Razer Chroma single-zone RGB lighting. Other features included Thunderbolt 3, USB Type-C, USB Type-A, and a 3.5mm audio jack. Windows 10 Home is the installed operating system.",
                "price" => 325000,
                "quantity" => 30,
                "image" => "razer.jpg",
                "category_id" => 12,
                "brand_id" => 8,
                "publish_status" => "published",
            ],
        ]);
    }
}
