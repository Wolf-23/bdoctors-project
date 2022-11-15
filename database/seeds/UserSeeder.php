<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            [
                'name' => 'Girolamo',
                'surname' => 'De Prisco',
                'slug' =>  '', 
                'email' =>  'girolamo@gmail.com',
                'password'  => Hash::make('testtest'),
                'address' => 'via Veneto, 3',
                'cv' => '',
                'profile_pic' => '',
                'phone' => '32499975312',
                'services' => 'Visita Specialistica'
            ],
            [
                'name' => 'Sandra',
                'surname' => 'Iannone',
                'slug' =>  '',
                'email' => 'sandra@gmail.com',
                'password'  => Hash::make('testtest'),
                'address' => 'via Roma, 1',
                'cv' => '',
                'profile_pic' => '',
                'phone' => '3332499973',
                'services' => 'Visita Specialistica'
            ],
            [
                'name' => 'Marilena',
                'surname' => 'Fiorentini',
                'slug' =>  '',
                'email' => 'marilena@gmail.com',
                'password'  => Hash::make('testtest'),
                'address' => 'piazza Delle Erbe, 25',
                'cv' => '',
                'profile_pic' => '',
                'phone' => '32499975343',
                'services' => 'Visita Specialistica'
            ],
            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'slug' =>  '',
                'email' => 'mario@gmail.com',
                'password'  => Hash::make('testtest'),
                'address' => 'via Sicilia, 2',
                'cv' => '',
                'profile_pic' => '',
                'phone' => '32499967312',
                'services' => 'Visita Specialistica'
            ],
            [
                'name' => 'Federico',
                'surname' => 'Masotti',
                'slug' =>  '',
                'email' => 'federico@gmail.com',
                'password'  => Hash::make('testtest'),
                'address' => 'via Garibaldi, 5',
                'cv' => '',
                'profile_pic' => '',
                'phone' => '3456789001',
                'services' => 'Visita Specialistica'
            ],
            [
                'name' => 'Gianluigi',
                'surname' => 'Fortunato',
                'slug' =>  '',
                'email' => 'gianluigi@gmail.com',
                'password'  => Hash::make('testtest'),
                'address' => 'piazza Verdi, 15',
                'cv' => '',
                'profile_pic' => '',
                'phone' => '3336789543',
                'services' => 'Visita Specialistica'
            ],
            [
                'name' => 'Marco',
                'surname' => 'Verdi',
                'slug' =>  '',
                'email' => 'marco@gmail.com',
                'password'  => Hash::make('testtest'),
                'address' => 'Via Milano, 17',
                'cv' => '',
                'profile_pic' => '',
                'phone' => '3462525369',
                'services' => 'Visita Specialistica'
            ],
        ];
            foreach ($users as $user) {
                $newuser = new User();
                $newuser->name = $user['name'];
                $newuser->surname = $user['surname'];
                $newuser->email = $user['email'];
                $newuser->slug = Str::slug($user['slug']);
                $newuser->password = $user['password'];
                $newuser->address = $user['address'];
                $newuser->cv = $user['cv'];
                $newuser->profile_pic = $user['profile_pic'];
                $newuser->phone = $user['phone'];
                $newuser->services = $user['services'];   
                $newuser->save();    
            }
    }
}
