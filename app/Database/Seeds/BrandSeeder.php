<?php

namespace App\Database\Seeds;

use App\Models\BrandModel;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $model = new BrandModel();
        $model->insertBatch([
            [
                "name" => "Samsung",
                "description" => "Samsung, South Korean company that is one of the world's largest producers of electronic devices. Samsung specializes in the production of a wide variety of consumer and industry electronics, including appliances, digital media devices, semiconductors, memory chips, and integrated systems.",
                "status" => "published"
            ],
            [
                "name" => "Huwaie",
                "description" => "Huawei Technologies Co., Ltd. is a Chinese multinational technology corporation headquartered in Shenzhen, Guangdong, China. It designs, develops and sells telecommunications equipment, consumer electronics and various smart devices",
                "status" => "published"
            ],
            [
                "name" => "Dell",
                "description" => "Dell description",
                "status" => "published"
            ],
            [
                "name" => "HP (Helwett Packard)",
                "description" => "HP description",
                "status" => "published"
            ],
            [
                "name" => "Lenovo",
                "description" => "Lenovo description",
                "status" => "published"
            ],
            [
                "name" => "POCO",
                "description" => "Poco description",
                "status" => "published"
            ],
            [
                "name" => "Oppo",
                "description" => "Oppo description",
                "status" => "published"
            ],
            [
                "name" => "Micromax",
                "description" => "Micromax description",
                "status" => "published"
            ],
            [
                "name" => "Nokia",
                "description" => "Nokia description",
                "status" => "published"
            ],
            [
                "name" => "Nike",
                "description" => "Nike description",
                "status" => "published"
            ],
        ]);
    }
}
