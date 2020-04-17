<?php

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class add_data_to_categories_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorie::create([
            'nom'=> 'livres',
            'slug'=> 'livres',
        ]);

        Categorie::create([
        'nom'=> 'Meubles',
        'slug'=> 'Meubles',

        ]);


        Categorie::create([
            'nom'=> 'Jeux',
            'slug'=> 'Jeux',
        ]);


        Categorie::create([
            'nom'=> 'Nourriture',
            'slug'=>'nourrirture',
        ]);


        Categorie::create([
            'nom'=> 'high-tech',
            'slug'=>'high-tech',
        ]);
    }
}
