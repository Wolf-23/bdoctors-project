<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use App\Specialization;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = request()->all();
        $allUsers = User::with(['reviews','specializations']);

        if($data['specializationName'] == 'Tutti i Medici' ){

            $data = request()->all();
            $allUsers = User::with(['reviews','specializations','sponsorships'])
            ->join('reviews','users.id','=','reviews.user_id')
            ->select('users.*',DB::raw('round(avg(vote)) as avgVote'))
            ->groupBy('user_id')
            ->having('avgVote','>=',$data['avgVote'])
            ->has('reviews','>=', $data['reviewsNumber'])
            ->withCount('sponsorships')
            ->orderBy('sponsorships_count', 'desc')
            ->inRandomOrder()
            ->get();
           
        } else {
            
            $data = request()->all();
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
            ->orderBy('sponsorships_count', 'desc')
            ->inRandomOrder()
            ->get();
        }
         
        return response()->json([
            'success' => true,
            'results' => $allUsers,
            'reviews_count' =>  $allUsers
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


            // foreach($allUsers as $user){

            //     $avgVoteBack =  DB::table('reviews')
            //     ->select('user_id',DB::raw('round(AVG(vote),0) as avgVote'))
            //     ->groupBy('user_id')->join('users','avgVote','=','avgVote')->implode('avgVote','');
            //     $newAvg = intval($avgVoteBack);
            //     $user->wow = $newAvg;
                   
            // }


