<?php

use App\Sponsorship;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorshipUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            $dateRandom = date('Y-m-d H:i:s');
            DB::table('sponsorship_user')->insert([
                'user_id'=>$user['id'],
                'sponsorship_id'=>rand(1,3),
                'created_at'=>date($dateRandom)
            ]);
        } 
    }
}
