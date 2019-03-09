<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $u;
    function __construct()
    {
        $this->u = new User();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = $this->u->getAllUsers();
        return view('pages.admin.manageUsers',['users' => $res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *  name,
    username,
    email,
    password,
    active,
    role
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');
        $active = $request->input('active');
        $role = $request->input('role');
        $token = md5(time() . $password);
        try{
            $res = $this->u->insert($name,$username,$password,$email,$active,$token,$role);
            if($res)
                return response()->json($res);
        }catch (QueryException $e){
            return response()->json($e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = $this->u->userActivity($id);
        return view('pages.admin.userActivity',['data' => $res]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = $this->u->getUser($id);
        return view('pages.admin.updateUser',['user' => $res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * name,
    username,
    email,
    password,
    active,
    role
     */
    public function update(Request $request, $id)
    {
        //ubaci rikvest klasuuu

        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $active = $request->input('active');
        $role = $request->input('role');


        $res = $this->u->update($name,$username,$email,$active,$role,$id);
        if($res){
            return response()->json(200);
        }else
            return response()->json(400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = $this->u->delete($id);
        return response()->json($res);
    }
}
