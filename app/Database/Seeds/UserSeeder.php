<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = new UserModel();
        $model->insertBatch([
            [
                "name" => "Sandip Chaudhary",
                "email" => "sandip@gmail.com",
                "phone_number" => "7899654125",
                "address" => "roskilde",
                "role" => "admin",
                "password" => password_hash("12345678", PASSWORD_DEFAULT),
                "status" => "Active"
            ],
            [
                "name" => "Pankaj Chaudhary",
                "email" => "pankaj@mail.com",
                "phone_number" => "7899654125",
                "address" => "roskilde",
                "role" => "editor",
                "password" => password_hash("12345678", PASSWORD_DEFAULT),
                "status" => "Active"
            ],
            [
                "name" => "Bhim Chaudhary",
                "email" => "bhim@mail.com",
                "phone_number" => "7899654125",
                "address" => "roskilde",
                "role" => "user",
                "password" => password_hash("12345678", PASSWORD_DEFAULT),
                "status" => "Active"
            ]
        ]);
    }
}
