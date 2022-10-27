<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
           'name' => 'Наука'
        ]);
        Category::insert([
            'name' => 'Авто'
        ]);
        Category::insert([
            'name' => 'Политика'
        ]);
        Category::insert([
            'name' => 'Образование'
        ]);
        Status::insert([
            'name' => 'Опубликован'
        ]);
        Status::insert([
            'name' => 'В обработке'
        ]);
        Status::insert([
            'name' => 'Создан'
        ]);
        User::insert([
            'login' => 'admin',
            'password' => Hash::make('admin'),
            'name' => 'admin',
            'isAdmin' => 1
        ]);
    }
}
