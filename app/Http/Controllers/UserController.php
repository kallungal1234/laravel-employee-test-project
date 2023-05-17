<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Listing all users
     */
    public function index()
    {   
        $data = [];
        try {
            $users = User::all();
            foreach ($users as $key => $user) {
                $user->department;
                $user->designation;
            }
            $data['users'] = json_decode($users, true);
            // dd($data);
            return view('users.index', $data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Search by name, department and designation
    */
    public function search()
    {
        try {
            $search = $_GET['search'];
            $users = User::where('Fk_department', 'LIKE', "%$search%")->orWhere('Fk_designation', 'LIKE', "%$search%")->orWhere('name', 'LIKE', "%$search%")->get();
            dd($users);
            foreach ($users as $key => $user) {
                $user->department;
                $user->designation;
            }
            $data['search'] = $search;
            $data['users'] = json_decode($users, true);
            return view('users.index', $data);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
