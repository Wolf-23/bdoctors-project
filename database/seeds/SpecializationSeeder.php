<?php

use App\Specialization;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations = [
        
        'Cardiologia',
        'Ortopedia',
        'Neurologia',
        'Chirurgia',
        'Ematologia',
        'Reumatologia',
        'Oncologia',
        'Pediatria',
        'Radiologia',
        'Dermatologia',
        'Gastroenterologia',
        'Medicina sportiva',
        'Oftalmologia',
        'Ematologia',
        'Reumatologia',
        'Nefrologia',
        'Endocrinologia',
        'Geriatria',
        'Allergologia',
        'Psichiatria',
        'Radioterapia',
        'Urologia',
        ];
        foreach ($specializations as $specialization) {
            $newSpecialization = new Specialization();
            $newSpecialization->name = $specialization;
            $newSpecialization->save();
        }
    }
}
