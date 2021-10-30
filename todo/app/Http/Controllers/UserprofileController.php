<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\Userprofile;


class UserprofileController extends Controller
{
    //get all user profile
    public function getUserprofiles()
    {
        $userprofiles = Userprofile::all();

        return response()->json($userprofiles,200);
    }
    
    public function getUserprofileById($id)
    {
        $userprofile = Userprofile::find($id);

        if(is_null($userprofile))
        {
            return response()->json(['message'=> 'User not found']);
        }

        return response()->json($userprofile::find($id),200); 
    }

    public function addUserprofile(Request $request)
    {
        $userprofile = Userprofile::create($request->all());

        return response()->json(['message'=> 'Added Successfully','code'=>200,'data'=>$userprofile]);

        //return response($userprofile,201);
    }

    public function updateUserprofile(Request $request,$id)
    {
        $userprofile = Userprofile::find($id);

        if(is_null($userprofile))
        {
            return response()->json(['message'=> 'User not found']);
        }else{
            $userprofile ->update($request->all());
            
            return response()->json(['message'=> 'Updated Successfully','data'=>$userprofile,'code'=>'200']);

            //return response($userprofile,200); 
        }
        
        

       

    }

    public function deleteUserprofile(Request $request,$id)
    {
        $userprofile = Userprofile::find($id);

        if(is_null($userprofile))
        {
            return response()->json(['message'=> 'User not found']);
        }

        $userprofile->delete();

        return response()->json(null,204); 

    }


    public function login(Request $request){
        $loginDetails = $request->only('email','password');
        
        $check = Userprofile::where("email", $request->email)->where("password",$request->password)->first();

        if(is_null($check))
        {
            return response()->json(['message'=> 'Wrong login details','code'=>501]);
        }else{
            $uid = $check->id;
            
            return response()->json(['message'=> 'Login Successfully','data'=>$uid, 'code'=>200]);
        }

        return $check;

    }





}
