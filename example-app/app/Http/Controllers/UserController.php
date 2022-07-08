<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getAll()
    {
        return User::all();
    }

    public function get($id)
    {
        $retrievedUser0 = User::all()->where('id', $id); // probably wrong because fetches all
        $retrievedUser1 = User::where('id', $id)->get(); // no intellisense when writing it this way
        $retrievedUser2 = DB::table('users')->where('id', $id)->get(); // this method retrieves $hidden fields as well

        return $retrievedUser0;
    }

    public function getCountDescByLastName($num)
    {
        $retrievedUsers0 = User::all()->take($num)->sortByDesc('last_name');
        $retrievedUsers1 = User::take($num)->get()->sortByDesc('last_name');
        $retrievedUsers2 = DB::table('users')->take($num)->get()->sortByDesc('last_name');

        return $retrievedUsers0;
    }

    public function create(Request $request)
    {
        $user = new User;

        $user->email = $request->user["email"];
        $user->password = $request->user["password"];
        $user->first_name = $request->user["firstName"];
        $user->last_name = $request->user["lastName"];
        $user->company = $request->user["company"];
        $user->country = $request->user["country"];

        $user->save();

        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->email = array_key_exists("email", $request->user) != null ? $request->user["email"] : $user->email;
        $user->password = array_key_exists("password", $request->user) != null ? $request->user["password"] : $user->password;
        $user->first_name = array_key_exists("firstName", $request->user) ? $request->user["firstName"] : $user->first_name;
        $user->last_name = array_key_exists("lastName", $request->user) != null ? $request->user["lastName"] : $user->last_name;
        $user->company = array_key_exists("company", $request->user) != null ? $request->user["company"] : $user->company;
        $user->country = array_key_exists("country", $request->user) != null ? $request->user["country"] : $user->country;

        $user->save();

        return $user;
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
