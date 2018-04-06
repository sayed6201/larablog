<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Photo;
use App\Post;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        //
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    public function Userindex()
    {
        //
        $user=Auth::user();
        $posts=Post::where('user_id',$user->id)->get();
        return view('users.index',compact('posts'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=Role::lists('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    public function Usercreate()
    {
        //

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {

        $input=$request->all();
      if ($file=$request->file('photo_id')){
          $name=time().$file->getClientOriginalName();
          $file->move('images',$name);
          $photo=Photo::Create(['name'=>$name]);
          $input['photo_id']=$photo->id;
      }
        $input['password']=bcrypt($input['password']);
        User::create($input);
        return redirect('/admin/users');

    }

    public function Userstore(UsersRequest $request)
    {

        $input=$request->all();
        if ($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::Create(['name'=>$name]);
            $input['photo_id']=$photo->id;
        }
        $input['password']=bcrypt($input['password']);
        $input['role']='author';
        User::create($input);
        return redirect('users/index');

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

    public function Usershow()
    {
        //
        $user=Auth::user();
        return view('users.show',compact('user'));
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
        $user=User::find($id);
        $roles=Role::lists('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    public function Useredit($id)
    {
        //
        $user=User::find($id);
        $roles=Role::lists('name','id')->all();
        return view('users.edit',compact('user'));
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
        $input=$request->all();
        if ($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::Create(['name'=>$name]);
            $input['photo_id']=$photo->id;
        }
        if(!empty($input['password'])){
            $input['password']=bcrypt($input['password']);
        }else{
            unset($input['password']);
//            $input=$request->except('password');
        }
        $user=User::find($id);
        $user->update($input);
        return redirect('/admin/users');

    }

    public function Userupdate(Request $request, $id)
    {
        //
        $input=$request->all();
        if ($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::Create(['name'=>$name]);
            $input['photo_id']=$photo->id;
        }
        if(!empty($input['password'])){
            $input['password']=bcrypt($input['password']);
        }else{
            unset($input['password']);
//            $input=$request->except('password');
        }
        $user=User::find($id);
        $user->update($input);
        return redirect('/users/show');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user=User::find($id);
        if($user->photo){
            unlink(public_path() . $user->photo->name);
            $user->photo->delete();
        }
        $user->delete();
        Session::flash('deleted_user','User Has Been Deleted');
        return redirect()->back();
    }
}
