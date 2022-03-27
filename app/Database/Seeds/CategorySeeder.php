<?php

namespace App\Database\Seeds;

use App\Models\CategoryModel;
use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $model = new CategoryModel();

        $first = $model->insert([
            "name" => "Electronic Devices",
            "code" => "electronic-devices",
            "description" => "electronic devices",
            "status" => "published",
            "parent_category_id" => NULL
        ]);


        $first_first = $model->insert([
            "name" => "Smart Phones",
            "code" => "smart-phones",
            "description" => "Smart Phones",
            "status" => "published",
            "parent_category_id" => $first
        ]);


        $model->insertBatch([
            [
                "name" => "Samsung Mobiles",
                "code" => "samsung-mobiles",
                "description" => "samsung mobiles",
                "status" => "published",
                "parent_category_id" => $first_first
            ],
            [
                "name" => "Redmi Mobiles",
                "code" => "redmi-mobiles",
                "description" => "redmi mobiles",
                "status" => "published",
                "parent_category_id" => $first_first
            ],
            [
                "name" => "Nokia Mobiles",
                "code" => "nokia-mobiles",
                "description" => "nokias",
                "status" => "published",
                "parent_category_id" => $first_first
            ],
            [
                "name" => "OPPO Mobiles",
                "code" => "oppo-mobiles",
                "description" => "oppo mobiles",
                "status" => "published",
                "parent_category_id" => $first_first
            ]
        ]);


        $first_second = $model->insert([
            "name" => "Tablets",
            "code" => "tablets",
            "description" => "tablets",
            "status" => "published",
            "parent_category_id" => $first
        ]);

        $model->insertBatch([
            [
                "name" => "Lenovo Tablets",
                "code" => "lenovo-tablets",
                "description" => "lenovo tablets",
                "status" => "published",
                "parent_category_id" => $first_second
            ],
            [
                "name" => "Apple Tablets",
                "code" => "apple-tablets",
                "description" => "apple tablets",
                "status" => "published",
                "parent_category_id" => $first_second
            ],
            [
                "name" => "Wacom Graphic Tablets",
                "code" => "wacom-graphic-tablets",
                "description" => "wacom graphic tablets",
                "status" => "published",
                "parent_category_id" => $first_second
            ],
        ]);

        $first_third = $model->insert([
            "name" => "Laptops",
            "code" => "laptops",
            "description" => "laptops",
            "status" => "published",
            "parent_category_id" => $first
        ]);

        $model->insertBatch([
            [
                "name" => "Gaming Laptops",
                "code" => "gaming-laptops",
                "description" => "gaming laptops",
                "status" => "published",
                "parent_category_id" => $first_third
            ],
            [
                "name" => "Macbooks",
                "code" => "macbooks",
                "description" => "macbooks",
                "status" => "published",
                "parent_category_id" => $first_third
            ],
        ]);

        $first_fourth = $model->insert([
            "name" => "Desktops",
            "code" => "desktops",
            "description" => "desktops",
            "status" => "published",
            "parent_category_id" => $first
        ]);

        $model->insertBatch([
            [
                "name" => "Gaming Desktops",
                "code" => "gaming-desktops",
                "description" => "gaming desktops",
                "status" => "published",
                "parent_category_id" => $first_fourth
            ],

        ]);

        $first_fifth = $model->insert([
            "name" => "Cameras",
            "code" => "cameras",
            "description" => "cameras",
            "status" => "published",
            "parent_category_id" => $first
        ]);

        $model->insertBatch([
            [
                "name" => "Audio/ Video Camera",
                "code" => "audio-video-cameras",
                "description" => "audio video Cameras",
                "status" => "published",
                "parent_category_id" => $first_fifth
            ],
            [
                "name" => "DSLR Cameras",
                "code" => "dslr-cameras",
                "description" => "dslr cameras",
                "status" => "published",
                "parent_category_id" => $first_fifth
            ],
        ]);

//--------------------------------------------------------------------------------------------------------

        $second = $model->insert([
            "name" => "Women Fashion",
            "code" => "women-fashion",
            "description" => "Women Fashion description",
            "status" => "published",
            "parent_category_id" => NULL
        ]);

        $second__first = $model->insert([
            "name" => "Women Clothing",
            "code" => "women-clothing",
            "description" => "women clothing",
            "status" => "published",
            "parent_category_id" => $second
        ]);

        $model->insertBatch([
            [
                "name" => "Tops & TShirts",
                "code" => "tops-and-tshirts",
                "description" => "tops and t-shirts",
                "status" => "published",
                "parent_category_id" => $second__first
            ],
            [
                "name" => "Women Jeans",
                "code" => "women-jeans",
                "description" => "women jeans",
                "status" => "published",
                "parent_category_id" => $second__first
            ],
            [
                "name" => "Women Shorts",
                "code" => "women-shorts",
                "description" => "shorts",
                "status" => "published",
                "parent_category_id" => $second__first
            ],
        ]);

        $second__second = $model->insert([
            "name" => "Women bags",
            "code" => "women-bags",
            "description" => "women bags",
            "status" => "published",
            "parent_category_id" => $second
        ]);

        $model->insertBatch([
            [
                "name" => "Backpacks",
                "code" => "backpacks",
                "description" => "backpacks",
                "status" => "published",
                "parent_category_id" => $second__second
            ],
            [
                "name" => "Crossbody Bags",
                "code" => "crossbody-bags",
                "description" => "crossbody bags",
                "status" => "published",
                "parent_category_id" => $second__second
            ],
            [
                "name" => "Wallet & Card Holders",
                "code" => "wallet-and-card-holders",
                "description" => "wallet & card holders",
                "status" => "published",
                "parent_category_id" => $second__second
            ],
        ]);

        $second__third = $model->insert([
            "name" => "Women Accessories",
            "code" => "women-accessories",
            "description" => "women accessories",
            "status" => "published",
            "parent_category_id" => $second
        ]);

        $model->insertBatch([
            [
                "name" => "Belts",
                "code" => "belts",
                "description" => "belts",
                "status" => "published",
                "parent_category_id" => $second__third
            ],
            [
                "name" => "Gloves",
                "code" => "gloves",
                "description" => "globes",
                "status" => "published",
                "parent_category_id" => $second__third
            ],
            [
                "name" => "Socks & Tights",
                "code" => "socks-and-tights",
                "description" => "socks  and tights",
                "status" => "published",
                "parent_category_id" => $second__third
            ],
        ]);

//--------------------------------------------------------------------------------------------------------

        $third = $model->insert([
            "name" => "Men's Fashion",
            "code" => "mens-fashion",
            "description" => "mens fashions",
            "status" => "published",
            "parent_category_id" => NULL
        ]);

        $third__first = $model->insert([
            "name" => "Mens Clothing",
            "code" => "mens-clothing",
            "description" => "Mens clothing",
            "status" => "published",
            "parent_category_id" => $third
        ]);

        $model->insertBatch([
            [
                "name" => "Causal Jackets",
                "code" => "causal-jackets",
                "description" => "causal jackets",
                "status" => "published",
                "parent_category_id" => $third__first
            ],
            [
                "name" => "Polo shirts",
                "code" => "polo-shirts",
                "description" => "polo shirts",
                "status" => "published",
                "parent_category_id" => $third__first
            ],
            [
                "name" => "Jackets & Coats",
                "code" => "jackets-and-coats",
                "description" => "jackets & coats",
                "status" => "published",
                "parent_category_id" => $third__first
            ],
        ]);

        $third__second = $model->insert([
            "name" => "Mens Shoes",
            "code" => "mens-shoes",
            "description" => "mens shoes",
            "status" => "published",
            "parent_category_id" => $third
        ]);

        $model->insertBatch([
            [
                "name" => "Sneakers",
                "code" => "sneakers",
                "description" => "Sneakers",
                "status" => "published",
                "parent_category_id" => $third__second
            ],
            [
                "name" => "Boots",
                "code" => "boots",
                "description" => "Boots",
                "status" => "published",
                "parent_category_id" => $third__second
            ],
            [
                "name" => "Formal Shoes",
                "code" => "formal-shoes",
                "description" => "Formal Shoes",
                "status" => "published",
                "parent_category_id" => $third__second
            ],
        ]);

        $third__third = $model->insert([
            "name" => "Mens Underwear",
            "code" => "mens-underwear",
            "description" => "mens underwear",
            "status" => "published",
            "parent_category_id" => $third
        ]);

        $model->insertBatch([
            [
                "name" => "Briefs",
                "code" => "briefs",
                "description" => "briefs",
                "status" => "published",
                "parent_category_id" => $third__third
            ],
            [
                "name" => "Vests",
                "code" => "vests",
                "description" => "vests",
                "status" => "published",
                "parent_category_id" => $third__third
            ],
        ]);

//--------------------------------------------------------------------------------------------------------

        $fourth = $model->insert([
            "name" => "Groceries & Pets",
            "code" => "groceries-and-pets",
            "description" => "groceries & pets",
            "status" => "published",
            "parent_category_id" => NULL
        ]);

        $fourth__first = $model->insert([
            "name" => "Beverages",
            "code" => "beverages",
            "description" => "beverages",
            "status" => "published",
            "parent_category_id" => $fourth
        ]);

        $model->insertBatch([
            [
                "name" => "Coffee",
                "code" => "coffee",
                "description" => "Coffee",
                "status" => "published",
                "parent_category_id" => $fourth__first
            ],
            [
                "name" => "Tea",
                "code" => "tea",
                "description" => "Tea",
                "status" => "published",
                "parent_category_id" => $fourth__first
            ],
            [
                "name" => "Juices",
                "code" => "juices",
                "description" => "Juices",
                "status" => "published",
                "parent_category_id" => $fourth__first
            ],
        ]);

        $fourth__second = $model->insert([
            "name" => "Breakfast, Chocos & Snacks",
            "code" => "breakfast-chocos-and-snacks",
            "description" => "Breakfast, Chocos & Snacks",
            "status" => "published",
            "parent_category_id" => $fourth
        ]);

        $model->insertBatch([
            [
                "name" => "Sneakers",
                "code" => "sneakers",
                "description" => "sneakers",
                "status" => "published",
                "parent_category_id" => $fourth__second
            ],
            [
                "name" => "Chocolate",
                "code" => "chocolate",
                "description" => "Chocolate",
                "status" => "published",
                "parent_category_id" => $fourth__second
            ],
            [
                "name" => "Chips & Crisps",
                "code" => "chips-and-crisps",
                "description" => "Chips & Crisps",
                "status" => "published",
                "parent_category_id" => $fourth__second
            ],
        ]);

        $fourth__third = $model->insert([
            "name" => "Cooking Ingredients",
            "code" => "cooking-ingredients",
            "description" => "cooking ingredients",
            "status" => "published",
            "parent_category_id" => $fourth
        ]);

        $model->insertBatch([
            [
                "name" => "Oil & Ghee",
                "code" => "oil-and-ghee",
                "description" => "Oil & Ghee",
                "status" => "published",
                "parent_category_id" => $fourth__third
            ],
            [
                "name" => "Herbs & Spices",
                "code" => "herbs-and-spices",
                "description" => "Herbs & Spices",
                "status" => "published",
                "parent_category_id" => $fourth__third
            ],
            [
                "name" => "Seasoning",
                "code" => "seasoning",
                "description" => "Seasoning",
                "status" => "published",
                "parent_category_id" => $fourth__third
            ]
        ]);

        $fourth__fourth = $model->insert([
            "name" => "Laundry & Households",
            "code" => "laundry-and-households",
            "description" => "Laundry & Households",
            "status" => "published",
            "parent_category_id" => $fourth
        ]);

        $model->insertBatch([
            [
                "name" => "Cleaning",
                "code" => "cleaning",
                "description" => "Cleaning",
                "status" => "published",
                "parent_category_id" => $fourth__fourth
            ],
            [
                "name" => "Washing",
                "code" => "washing",
                "description" => "Washing",
                "status" => "published",
                "parent_category_id" => $fourth__fourth
            ],
            [
                "name" => "Laundry",
                "code" => "laundry",
                "description" => "Laundry",
                "status" => "published",
                "parent_category_id" => $fourth__fourth
            ]
        ]);



    }
}
