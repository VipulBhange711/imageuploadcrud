<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('welcome',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('photo');

        $request->validate([
            'photo' => 'required|mimes:png,jpg,jpeg|max:3000'
        ]);

        $path = $request->file('photo')->store('image','public');//type-1 we use simple like below 
        // $path = $request->photo->store('image','public');//type-2
        // $filename = $file->getClientOriginalName();// for image original name
        // $filename = time().'_'.$file->getClientOriginalName();// for image original name with time
        // $path = $request->photo->storeAs('image',$filename,'public');//type-3
        // $extension = $file->extension();//get file extension
        // return $extension;
        // $hashname = $file->hashName();//get file hash Name Random Name
        // return $hashname;
        // $size = $file->getSize();//get file  size in bytes
        // return $size;
        // $path = $request->photo->storeAs('image',$filename,'public');//type-4 with extension get

        // return $path;

User::create([
    'FileName' => $path,
]);
        return redirect()->route('user.index')->with('status','User Image Upload Successfully.');

        // dd($file);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::find($id);
        return view('update',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

            if($request->hasFile('photo')){

                $image_path = public_path("storage/"). $user->FileName;
                if(file_exists($image_path)){
                    @unlink($image_path);
                }
                
        $path = $request->photo->store('image','public');

        $user->FileName = $path;
        $user->save();
        return redirect()->route('user.index')->with('delete','User Image Update Successfully.');
            }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();

        $image_path = public_path("storage/"). $user->FileName;
        if(file_exists($image_path)){
            @unlink($image_path);
        }
        return redirect()->route('user.index')->with('delete','User Image Delete Successfully.');


    }
}