<?php

namespace App\Http\Controllers;
// use App\Http\Requests\StoreUserRequest;

// use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;



class UserController extends Controller
{


    public function index(Request $request)
    {

        $users = User::get();
        return view('user.list', [
            'user' => $request->user(),'users'=>$users
        ]);
    }

    


    public function create(Request $request)
    {

        $users = Auth::user()->users;
        
        return view('user.add', [
            'user' => $request->user(),'users'=>$users
        ]);
    }




    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());

        // die;
    
        return redirect()->route('user.add')->with('success', 'User added successfully!');
    }


    public function edit(string $id)
    {

        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));

    
        //
    }


    public function update(StoreUserRequest $request, $id)
    {
        
        $user = User::findOrFail($id);
        $user->update($request->validated());
    
        return redirect()->route('user.edit', $id)->with('success', 'User updated successfully!');
    }
    



        public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.add')->with('success', 'User deleted successfully.');
    }



   

}
