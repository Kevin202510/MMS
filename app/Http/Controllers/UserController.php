<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Hash, Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('role_id' , '!=' , '1')
                    ->whereNull('deleted_at')->get();
        return response()->json($users);
    }

     public function save(Request $request)
    {
        $users=User::create([
          'fname'     => $request->fname,
          'lname'     => $request->lname,
          'address'     => $request->address,
          'contact'     => $request->contact,
          'username'    => $request->username,
          'role_id'  => $request->role_id,
      ]);
      return response()->json($users);
    }

    public function upload(Request $request)
    {

      // $validation = Validator::make($request->all(),[
      //   'upload-usersdata' =>'required|file|csv'
      // ]);
        //get file
        $upload=$request->file('upload_usersdata');
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');

        $header= fgetcsv($file);

        // dd($header);
        $escapedHeader=[];
        //validate
        foreach ($header as $key => $value) {
            $lheader=strtolower($value);
            $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }

        //looping through othe columns
        while($columns=fgetcsv($file))
        {
            if($columns[0]=="")
            {
                continue;
            }

           $data= array_combine($escapedHeader, $columns);

           // Table update
           $fname=$data['fname'];
           $lname=$data['lname'];
           $address=$data['address'];
           $contact=$data['contact'];
           $username=$data['username'];

           $users=User::create([
            'fname'     => $fname,
            'lname'     => $lname,
            'address'     => $address,
            'contact'     => $contact,
            'username'    => $username,
          ]);

        }

        return response()->json($users);
    }

    public function list()
  { 
    $roles= Roles::where('display_name','!=', 'Developer')
                  ->whereNull('deleted_at')
                    ->orderby('id', 'desc')
                    ->get();
    return response()->json($roles);
  }

    public function update(Request $request, User $user)
    {
        $input = $request->all();
        $user->update($input);
        return response()->json($user, 200);
    }

    public function updatestatus(Request $request,User $user)
    {
        $user->isApproved = $request->isApproved;
        $user->update();
        return response()->json(array('success'=>true));
    }

    public function updatestatusDisapproved(Request $request,User $user)
    {
        $user->isApproved = $request->isApproved;
        $user->deleted_at = $request->isApproved;
        $user->update();
        return response()->json(array('success'=>true));
    }


    public function destroy(User $user)
    {
        $user->deleted_at = Carbon::now();
        $user->update();
        return response()->json(array('success'=>true));
    }
}
