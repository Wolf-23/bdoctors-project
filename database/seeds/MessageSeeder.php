<?php

use App\Message;
use App\User;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //     'Mi sono trovato veremente bene con questo dottore!',
        //     'Dottore qualificato, consigliato',
        //     'Bravissimo!',
        //     'Gentile e professionale',
        $messages = [
            [
                'name' => 'Mario',
                'surname' => 'Viola',
                'title' => 'Richiesta visita',
                'email' => 'marioviola@gmail.com',
                'message_text' =>  'Salve, posso prenotare una visita medica?',
                'user_id' => '1'
            ],
            [
                'name' => 'Giovanni',
                'surname' => 'Blu',
                'title' => 'Ricetta Medica',
                'email' => 'giovanniblu@gmail.com',
                'message_text' =>  'Salve, mi servirebbe una ricetta per una scatola di Tachipirina',
                'user_id' => '1'
            ],
            // ------------------------------------
            [
                'name' => 'Maria',
                'surname' => 'Rossellini',
                'title' => 'Richiesta visita specialistica',
                'email' => 'mariarossellini@gmail.com',
                'message_text' =>  'Buongiorno, ho molta tosse',
                'user_id' => '2'
            ],
            [
                'name' => 'Giovanna',
                'surname' => 'Velli',
                'title' => 'Ricetta Medica per Antibiotici',
                'email' => 'giovannavelli@gmail.com',
                'message_text' =>  'Salve, avrei bisogno di una somministrazione di antibiotici',
                'user_id' => '2'
            ],
            [
                'name' => 'Annamaria',
                'surname' => 'Merlini',
                'title' => 'Mio figlio ha la tosse',
                'email' => 'merlinianna@gmail.com',
                'message_text' =>  'Salve, posso prenotare una visita medica per mio figlio?',
                'user_id' => '3'
            ],
            [
                'name' => 'Franco',
                'surname' => 'Aranceti',
                'title' => 'Andrologia',
                'email' => 'francuccio@gmail.com',
                'message_text' =>  'Salve, ho bisogno di una visita per problemi genitali',
                'user_id' => '4'
            ],
            [
                'name' => 'Francesca',
                'surname' => 'Claritas',
                'title' => 'Richiesta prescrizione ',
                'email' => 'frafra@gmail.com',
                'message_text' =>  'Salve, avrei bisogno di farmi prescrivere degli psicofarmaci',
                'user_id' => '5'
            ],
            [
                'name' => 'Giulio',
                'surname' => 'Frangei',
                'title' => 'Problema alla spalla',
                'email' => 'giulione@gmail.com',
                'message_text' =>  'Salve, ho un problema alla spalla',
                'user_id' => '5'
            ],
            [
                'name' => 'Giordano',
                'surname' => 'Giordanelli',
                'title' => 'Richiesta visita',
                'email' => 'giordi@gmail.com',
                'message_text' =>  'Salve, posso prenotare una visita medica?',
                'user_id' => '6'
            ],
            [
                'name' => 'Andrea',
                'surname' => 'Martini',
                'title' => 'Visita specialistica',
                'email' => 'andre@gmail.com',
                'message_text' =>  'Buondi! Ho problemi al ginocchio. ',
                'user_id' => '6'
            ],
            [
                'name' => 'Martina',
                'surname' => 'Secca',
                'title' => 'Richiesta Psicofarmaci',
                'email' => 'martinasecca@gmail.com',
                'message_text' =>  'Salve, soffro di attacchi di panico',
                'user_id' => '6'
            ],
            [
                'name' => 'Claudia',
                'surname' => 'Biancucci',
                'title' => 'Aiuto!',
                'email' => 'Cla@gmail.com',
                'message_text' =>  'Salve, ho bisogno di aiuto!',
                'user_id' => '7'
            ],
            [
                'name' => 'Lisa',
                'surname' => 'Lodoni',
                'title' => 'Radiografia',
                'email' => 'lisalodoni@gmail.com',
                'message_text' =>  'Salve, ho un problema al bacino. Mi fa molto male e vorrei fare una radiografia',
                'user_id' => '7'
            ]
        ];
        foreach ($messages as $message) {
            $newMessage = new Message();
            $newMessage->name = $message['name'];
            $newMessage->surname = $message['surname'];
            $newMessage->title = $message['title'];
            $newMessage->email = $message['email'];
            $newMessage->message_text = $message['message_text'];
            $newMessage->user_id = $message['user_id'];
            $newMessage->save();
            
        }
    }
}
