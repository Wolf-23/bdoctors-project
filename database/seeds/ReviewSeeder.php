<?php

use App\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviews = [
            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'review_text' =>  'Medico Pessimo',
                'vote' => '1',
                'user_id' => '1'
            ],
            [
                'name' => 'Marco',
                'surname' => 'Sanna',
                'review_text' =>  'Non mi sono trovato molto bene con questo medico',
                'vote' => '3',
                'user_id' => '1'
            ],
            [
                'name' => 'Andrea',
                'surname' => 'Rossettini',
                'review_text' =>  'Medico molto disponibile, consigliato!',
                'vote' => '4',
                'user_id' => '1'
            ],
            [
                'name' => 'Giacomo',
                'surname' => 'Carta',
                'review_text' =>  'Medico prepato, consigliato',
                'vote' => '5',
                'user_id' => '1'
            ],
            [
                'name' => 'Claudia',
                'surname' => 'Falchi',
                'review_text' =>  'Medico molto gentile, personale qualificato, molto consigliato|',
                'vote' => '5',
                'user_id' => '2'
            ],
            [
                'name' => 'Marta',
                'surname' => 'Rossi',
                'review_text' =>  'Medico pessimo, tempi di attesa lunghissimi!',
                'vote' => '2',
                'user_id' => '2'
            ],
            [
                'name' => 'Matteo',
                'surname' => 'Sanna',
                'review_text' =>  'Medico bravissimo, peccato per i lunghi tempi di attesa!',
                'vote' => '2',
                'user_id' => '2'
            ],
            [
                'name' => 'Giovanni',
                'surname' => 'Metri',
                'review_text' =>  'Medico super disponibile, consigliato!',
                'vote' => '5',
                'user_id' => '3'
            ],
            [
                'name' => 'Federica',
                'surname' => 'Pagnotta',
                'review_text' =>  'Sono stata a visita da quetso medico e mi sono trovata benissimo!',
                'vote' => '4',
                'user_id' => '3'
            ],
            [
                'name' => 'Gerolamo',
                'surname' => 'Milo',
                'review_text' =>  'Il miglior medico in tutta Milano',
                'vote' => '5',
                'user_id' => '7'
            ],
            [
                'name' => 'William',
                'surname' => 'Rossi',
                'review_text' =>  'Medico molto disponibile, consigliato!',
                'vote' => '5',
                'user_id' => '7'
            ],
            [
                'name' => 'Laura',
                'surname' => 'Destra',
                'review_text' =>  'Medico pessimo, tempi di attesa lunghissimi!',
                'vote' => '5',
                'user_id' => '7'
            ],
            // --------------------------------
            [
                'name' => 'Maria',
                'surname' => 'Robbiati',
                'review_text' =>  'Medico molto competente, personale molto gentile!',
                'vote' => '4',
                'user_id' => '5'
            ],
            [
                'name' => 'Luca',
                'surname' => 'Frasca',
                'review_text' =>  'Studio troppo affollato, troppa attesa.',
                'vote' => '3',
                'user_id' => '5'
            ],
            [
                'name' => 'Biagio',
                'surname' => 'Corsi',
                'review_text' =>  'Visita molto accurata, soddisfatto!',
                'vote' => '4',
                'user_id' => '4'
            ],
            [
                'name' => 'Maria',
                'surname' => 'Luchi',
                'review_text' =>  'Medico Pessimo',
                'vote' => '1',
                'user_id' => '5'
            ],
            [
                'name' => 'Teresa',
                'surname' => 'Paoletti',
                'review_text' =>  'Ottimo studio, medico disponibile!',
                'vote' => '4',
                'user_id' => '4'
            ],
            [
                'name' => 'Dario',
                'surname' => 'Ferrario',
                'review_text' =>  'Medico Pessimo, studio disordinato',
                'vote' => '2',
                'user_id' => '6'
            ],
            [
                'name' => 'Miriam',
                'surname' => 'Rossofuoco',
                'review_text' =>  'Medico Pessimo',
                'vote' => '1',
                'user_id' => '6'
            ],
            [
                'name' => 'Luca',
                'surname' => 'Vinci',
                'review_text' =>  'Ottima esperienza, consigliato!',
                'vote' => '4',
                'user_id' => '3'
            ],
            [
                'name' => 'Angelo',
                'surname' => 'Neri',
                'review_text' =>  'Medico frettoloso!',
                'vote' => '3',
                'user_id' => '6'
            ],
        ];
        foreach ($reviews as $review) {
            $newReview = new Review();
            $newReview->name = $review['name'];
            $newReview->surname = $review['surname'];
            $newReview->review_text = $review['review_text'];
            $newReview->vote = $review['vote'];
            $newReview->user_id = $review['user_id'];
            $newReview->save();
            
        }
    }
}
