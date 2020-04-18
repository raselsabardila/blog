<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $user=User::paginate(5);
    return view("admin.user.index",compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "type"=>"required",
            
        ]);

        if($request->password == null){
            User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>bcrypt("12345678"),
                "type"=>$request->type
            ]);
        }else{
            User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>bcrypt($request->password),
                "type"=>$request->type
            ]);
        }

        return redirect()->route("user.index")->with("status","Data Berhasil Ditambahkan!!");
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
        $user=User::find($id);
        return view("admin.user.edit",compact("user"));
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
            "name"=>"required",
            "email"=>"required",
            "type"=>"required",
            
        ]);

        $user=User::find($id);

        if($request->password == null){
            $user->update([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>bcrypt("12345678"),
                "type"=>$request->type
            ]);
        }else{
            $user->update([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>bcrypt($request->password),
                "type"=>$request->type
            ]);
        }

        return redirect()->route("user.index")->with("status","Data Berhasil Di Edit!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();

        return redirect()->route("user.index")->with("status","Data Berhasil diHapus!!");
    }
}
