<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Sodium\compare;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
         return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
         return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(UserRequest $request)
    {
        ini_set('memory_limit','256M');
       $input = $request->all();

       $input['password']=bcrypt($request->password);

      if ($file=$request->file('photo'))
      {
          $name= time().$file->getClientOriginalName();

          $file->move('images',$name);

          $photo=Photo::create(['file'=> $name]);

          $input['photo_id']=$photo->id;
      }
        $user=User::create($input);
        Session::flash('created_user','The user has been created');
        return redirect('admin/user');
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
        $roles = Role::pluck('name','id')->all();
        return view ('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {


        $user= User::find($id);

        if(trim($request->password)=='')
        {
            $input= $request->except('password');
        }
        else
        {
            $input = $request->all();
            $input['password']=bcrypt($request->password);
        }

        if($file= $request->file('photo'))
        {
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>"$name"]);

            $input['photo_id']=$photo->id;




        }
       $user->update($input);

        Session::flash('updated_user','The user has been updated');

       return redirect('admin/user');
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
        unlink(public_path() . $user->photo->file);
        $user->delete();
        Session::flash('deleted_user','The user has been deleted');
        return redirect('admin/user');
    }
}
