<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use App\Specialization;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $specializationName = $data['specializationName'];
        $reviewsNumber = $data['reviewsNumber'];
     
        if($data['specializationName'] == ''){
        
        $allUsers = User::with(['specializations','reviews','sponsorships'])
        ->get(['id','name','surname','slug','profile_pic']);
            
        } else {
        $allUsers = User::with([ 'specializations', 'reviews','sponsorships'])
        ->whereHas('specializations', function ($q){
            $data = request()->all();
            $q->where('specialization_id', '=' , $data['specializationName']);})

        ->whereHas('reviews',function(){},'>=',$data['reviewsNumber'])
        ->get();

        $allUsers->sortByDesc('sponsorships');
        }
         
        return response()->json([
            'success' => true,
            'results' => $allUsers,
            'reviews_count' => $allUsers
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

    
