<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit;
use Illuminate\Support\Str;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marques = ['Peugeot', 'Renault', 'BMW', 'Toyota', 'Volkswagen'];
        $types = ['Filtre', 'Plaquette', 'Bougie', 'Batterie', 'Courroie'];

        for ($i = 1; $i <= 50; $i++) {
            Produit::create([
                'nom' => $types[array_rand($types)] . ' - Modèle ' . Str::random(4),
                'marque' => $marques[array_rand($marques)],
                'type_piece' => $types[array_rand($types)],
                'prix' => rand(10, 300),
                'stock' => rand(0, 50),
                'image' => 'https://via.placeholder.com/300x200?text=Piece+' . $i,
                'description' => "Pièce détachée de type ". $types[array_rand($types)]. ", compatible avec plusieurs modèles. Qualité certifiée, facile à installer.",
            ]);
        }
    }
}
