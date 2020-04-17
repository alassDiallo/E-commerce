<?php

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker\Factory::create();
        for($i=0;$i<5;$i++){
            Produit::create([
                'titre'=> $fake->sentence(4),
                'slug'=>$fake->slug,
                'sousTitre'=>$fake->sentence(10),
                'description'=>$fake->text,
                'prix'=>$fake->numberBetween(100,300)*100,
                'image'=>'https://via.placeholder.com/200x250',
            ])->categories()->attach([
                rand(1,4),
                rand(1,4)
            ]);
        }
    }
}
