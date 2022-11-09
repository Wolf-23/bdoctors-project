<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Specialization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        
        return(view('admin.profile'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profileEdit = User::find($id);
        $profileSpecialization = $profileEdit->specializations;
        $specializations = Specialization::all();
        return view('admin.profile',compact('profileEdit', 'specializations', 'profileSpecialization'));
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
            $request->validate([
                'address' => 'required|max:100',
                'phone' => 'numeric|nullable',
                'cv'  => 'file|max:5000|nullable|mimes:pdf',
                'profile_pic' => 'image|max:8000|nullable',
                'services' => 'string|max:255|nullable'
            ]);
            // GRAZIE STACKOVERFLOW
            $profileUpdate = User::find($id);
            $data = $request->all();
            if (array_key_exists('profile_pic', $data)) {
                if ($profileUpdate->profile_pic) {
                    Storage::delete($profileUpdate->profile_pic);
                }
                $profile_pic = Storage::put('profile_pic', $data['profile_pic']);
                $data['profile_pic'] = $profile_pic;
            }
            if (array_key_exists('cv', $data)) {
                if ($profileUpdate->cv) {
                    Storage::delete($profileUpdate->cv);
                }
                $cv = Storage::put('cv', $data['cv']);
                $data['cv'] = $cv;
            }
            $profileUpdate->update($data);
            $profileUpdate->specializations()->sync($data['specializations']);
            return redirect()->route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profileDelete = User::find($id);
        if ($profileDelete->profile_pic) {
            Storage::delete($profileDelete->profile_pic);
        }
        if ($profileDelete->cv) {
            Storage::delete($profileDelete->cv);
        }
        $profileDelete->specializations()->sync([]);
        Auth::logout();
        $profileDelete->delete();
        return redirect()->route('register');
    }
}
