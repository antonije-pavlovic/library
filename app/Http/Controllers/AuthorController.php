<?php

namespace App\Http\Controllers;

use App\models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $a;

    public function __construct()
    {
        $this->a = new Author();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = $this->a->getAuthors();
        if($res)
            return view('pages.admin.author.manageAuthor',['authors'=> $res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.author.addAuthor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $res = $this->a->insertAuthor($name);
        if($res)
            return response()->json($res);
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
        $res = $this->a->getAuthor($id);
        return view('pages.admin.author.updateAuthor',['author'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        $name = $request->input('name');
        $id = $request->input('authorID');

        $res = $this->a->update($id,$name);
        if($res)
            return response()->json($res);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = $this->a->deleteAuthor($id);
        if($res)
            return response()->json($res);
    }
}
