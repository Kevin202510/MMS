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
          'email'    => $request->email,
          'role_id'  => $request->role_id,
      ]);
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

    public function destroy(User $user)
    {
        $user->deleted_at = Carbon::now();
        $user->update();
        return response()->json(array('success'=>true));
    }
}
