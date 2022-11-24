<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function index()
    {   
        $data = request()->all();

        if($data['specializationName'] == 'Tutti i Medici'){

         
            $allUsers = User::with(['reviews','specializations','sponsorships'])
            ->join('reviews','users.id','=','reviews.user_id','cross')
            ->select('users.*',DB::raw('round(avg(vote)) as avgVote'))
            ->groupBy('user_id')
            ->having('avgVote','>=',$data['avgVote'])
            ->withCount(['sponsorships','reviews'])
            ->has('reviews','>=', $data['reviewsNumber'])
            ->orderBy('sponsorships_count', 'desc')->inRandomOrder()->get();

           
        } else {
  
            $allUsers = User::with(['reviews','specializations','sponsorships'])
            ->join('reviews','users.id','=','reviews.user_id')
            ->select('users.*',DB::raw('round(avg(vote)) as avgVote')) 
            ->groupBy('user_id')
            ->having('avgVote','>=',$data['avgVote'])
            ->whereHas('specializations', function ($q){
                $data = request()->all();
                $q->where('specialization_id', '=' , $data['specializationName']);})  
            ->has('reviews','>=', $data['reviewsNumber'])
            ->withCount('sponsorships')
            ->orderBy('sponsorships_count', 'desc')->inRandomOrder()->get();
        }
        
        return response()->json([
            'success' => true,
            'results' => $allUsers,
        ]);

    }

    public function show($slug)
    {
        $user = User::where('slug' , $slug)->with('specializations')->first();

        if($user){
            return response()->json([
                'success' => true,
                'resolve' => $user
            ]);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'user non trovato'
            ]);
        }
    }
};
