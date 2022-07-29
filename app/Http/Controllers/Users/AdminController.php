<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$users =User::whereRoleIs('admin')->join('admins','users.id','=','admins.account_id')->get();
        $users =User::whereRoleIs('admin')->where(function($query) use ($request){
            return $query->when($request->search,function($q)use ($request){
                return $q->where('name','like','%'.$request->search.'%');
            });
        })->join('admins','users.id','=','admins.account_id')->get();


        return view('AdminDashboard.Admins.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('AdminDashboard.Admins.create');
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
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string',  'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:11', 'max:11', 'unique:admins'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

//        $request_data=$request->except('password','password_confirmation','permissions');
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
//            $removedPhotoPath = public_path("assets/dist/img/user-images/{$user->image}");
//            \App\Http\Services\Media::delete($removedPhotoPath);
            $request->image->move(public_path('assets/dist/img/user-images/'), $imageName);
//            $request_data['image']=$imageName;

        }
        $request_data['password']=bcrypt($request->password);
        $user=User::create([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'username'=>$request->username,
                'image'=>$imageName,
                'password'=>bcrypt($request->password),
                'role'=>'admin'
            ]
        );
        Admin::create([

            'phone'=>$request->phone,
            'account_id'=>$user->id
        ]);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
        return redirect()->route('users.index');
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

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
//
            'email' => [ 'string', 'email', 'max:255',  'unique:users,email,'.$user->id],

            'phone' => ['string', 'max:11','unique:users,phone,'.$user->id],

            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $request_data=$request->only('first_name','last_name','email');
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
//            $removedPhotoPath = public_path("assets/dist/img/user-images/{$user->image}");
//            \App\Http\Services\Media::delete($removedPhotoPath);
            $request->image->move(public_path('assets/dist/img/user-images/'), $imageName);
            $request_data['image']=$imageName;

        }

//dd($request_data);
        $user->update(
            $request_data
        );
        Admin::where('account_id', $user->id)->update([

            'phone'=>$request->phone,
        ]);
        $user->syncPermissions($request->permissions);
        return redirect()->route('users.edit',$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function destroy(User $admin)
//    {
//
//        dd($admin->admin);
//        //
////dd(User::find($admin)->admin);
////        dd($admin->admin);
//        //why we have to delete admin before user  ?
////because the admin take a forgein key from user
//        $admin->admin->delete();
//        $admin->delete();
////return  redirect()->route('admins.index');
////        return redirect()->action('AdminController@index');
//        return redirect()->back();
//
//    }
    public function destroy(Admin $admin){
//        dd($admin);
        $user=$admin->account;
        $admin->delete();
//        User::find($admin)->delete();
        $user->delete();
return  redirect()->route('admins.index');
    }

}
