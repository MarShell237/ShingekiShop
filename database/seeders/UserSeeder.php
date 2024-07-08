<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ville;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $users = [
        ['user1','697815095','djiofackjason57@gmail.com','1234','marcel.jpg'],
        ['user2','89898989','bounoucicero@gmail.com','1111','cicero.jpg'],
        ['user3','89898989','lucressechouna640@gmail.com','2222','lucresse.jpg'],
        ['user4','89898989','lonkenggrace@gmail.com','3333','grace.jpg'],
        ['user5','89898989','zebazejulie6@gmail.com','4444','julie.jpg']
      ];

      foreach ($users as $key => $user) {
        User::factory()->create([
            "name"=>$user[0],
            "phone"=>$user[1],
            "email"=>$user[2],
            "password"=> Hash::make($user[3]),
            // "nametitan"=>$user[4],
            "image" => $user[4],
            "ville_id" => Ville::all()->random()->id
        ]);
  }
    }
}
