<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Categorie;
use App\Models\Ville;
use App\Models\User;
use App\Models\SuperUser;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $categories = ["Mangas","Figurines","Habits","Accessoires","Sons","Jeux Videos"];

        $villes = ['Dscang,Cameroun','Bafoussam,Cameroun','Yaounde,Cameroun','Douala,Cameroun','Bertoua,Cameroun'];

        $users = [
            ['Marcel J. DJIOFACK','697815095','djiofackjason57@gmail.com','1234'],
            ['cicero','89898989','bounoucicero@gmail.com','cice;'],
            ['CHOUNA Lucresse','89898989','lucressechouna640@gmail.com','lucressePwd'],
            ['LONKENG grace','89898989','lonkenggrace@gmail.com','gracePwd'],
            ['ZEBAZE julie','89898989','zebazejulie6@gmail.com','juliePwd']
        ];

        $super_users = [
            ['Marcel J. DJIOFACK ','Shingeki no Kyojin','djiofackjason57@gmail.com','marcel.jpg','1234'],
            ['Bouonou cicero','Kō no Kyojin','bounoucicero@gmail.com','cicero.jpg','cice'],
            ['CHOUNA Lucresse','Onna-gata no Kyojin','lucressechouna640@gmail.com','lucresse.jpg','lucressePwd'],
            ['LONKENG grace','Agito no Kyojin','lonkenggrace@gmail.com','grace.jpg','gracePwd'],
            ['ZEBAZE julie','Sentsui no Kyojin','zebazejulie6@gmail.com','julie.jpg','juliePwd']
        ];

        // $CategoriesModel = array();

        foreach ($categories as $key => $value) {
            Categorie::factory()->create([
                "name"=> $value
            ]);
        }

        foreach ($villes as $key => $value) {
            Ville::factory()->create([
                "name"=> $value
            ]);
        }

        foreach ($users as $key => $user) {
            User::factory()->create([
                "name"=>$user[0],
                "phone"=>$user[1],
                "email"=>$user[2],
                "password"=> Hash::make($user[3])
            ]);
        }
        
        foreach ($super_users as $key => $super_user) {
            SuperUser::factory()->create([
                "name"=>$super_user[0],
                "nametitan"=>$super_user[1],
                "email"=>$super_user[2],
                "image"=>$super_user[3],
                "password"=> Hash::make($super_user[4])
            ]);
        }

        Product::factory(50)->create();
    }
}
