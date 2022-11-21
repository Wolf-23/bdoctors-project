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
        
        // $avgVote = $data['avgVote'];
        $reviewsNumber = $data['reviewsNumber'];
        
        $avgVoteCalc = DB::table('reviews')
        ->select('user_id',DB::raw('round(AVG(vote),0) as avgVote'))
        ->groupBy('user_id')
        ->get();

        $reviewsLength = DB::table('users')
        ->select('users.id', DB::raw('COUNT(reviews.user_id) AS reviews_count'))
        ->join('reviews', 'users.id', '=', 'reviews.user_id')
        ->groupBy('users.id')
        ->get();

        // $myReviewsTable = Review::all(); 
        
        // $allUsers = User::with(['specializations','reviews'])->get();

       

        
        if($data['specializationName'] == ''){
            
            $allUsers = User::with(['specializations','reviews'])
            ->get(['id','name','surname','slug','profile_pic']);
            
        } else {
  
                $allUsers = User::with([ 'specializations', 'reviews'])
                ->whereHas('specializations', function ($q){
                    $data = request()->all();
                    $q->where('specialization_id', '=' , $data['specializationName']);    
                })
                ->whereHas('reviews',function(){},'>=',$data['reviewsNumber'])
                
                ->get();                
            }

            

          
        
         
        return response()->json([
            'success' => true,
            'results' => $allUsers,
            'reviews_count' => $allUsers
        ]);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
};

    
