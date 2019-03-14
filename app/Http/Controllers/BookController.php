<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBookRequest;
use App\models\Author;
use App\models\Book;
use App\models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $b;
    function  __construct()
    {
        $this->b = new Book();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->b->getBooks();
        return view('pages.admin.manageBooks',["books" => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c = new Category();
        $a = new Author();
        $cat = $c->getCategories();
        $authors = $a->getAuthors();
        return view('pages.admin.addBook',['categories'=> $cat,'authors'=>$authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddBookRequest $request) //ubaciti Request klasu za proveru
    {
        $title = $request->input('title');
        $pages = $request->input('pages');
        $year= $request->input('year');
        $isbn= $request->input('isbn');
        $picture = $request->file('picture');
        $author = $request->input('author');
        $category= $request->input('category');
        $description = $request->input('description');
        $price = $request->input('price');

        $name = time() . '.' . $picture->getClientOriginalExtension();
        $destinationPath = public_path('/images');

        $b = new Book();
        $res = $b->insertBook($title,$pages,$year,$isbn,'/images/'.$name,$author,$category,$description,$price);
        if($res){
            $picture->move($destinationPath, $name);
            return redirect('/admin')->with(['message'=>'bravo sinovac']);
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
        $c = new Category();
        $a = new Author();
        $cat = $c->getCategories();
        $authors = $a->getAuthors();

        $res = $this->b->getBook($id);
        return view('pages.admin.updateBook',['book' => $res,'categories'=>$cat,'authors' => $authors]);
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
        $title = $request->input('title');
        $pages = $request->input('pages');
        $year= $request->input('year');
        $isbn= $request->input('isbn');
        $oldPicture = $request->input('oldPicture');
        $newPicture = $request->file('newPicture');
        $author = $request->input('author');
        $category= $request->input('category');
        $description = $request->input('description');
        $price = $request->input('price');

        if($newPicture){
           unlink(public_path(). $oldPicture);
            $name = time() . '.' . $newPicture->getClientOriginalExtension();
            $destinationPath = public_path('/images');

            $res = $this->b->updateBook($title,$pages,$year,$isbn,'/images/'.$name,$author,$category,$description,$price,$id);
            if($res){
                $newPicture->move($destinationPath, $name);
                return redirect('/admin')->with(['message'=>'bravo sinovac']);
            }
        }else {
           // dd($oldPicture);
            $res = $this->b->updateBook($title,$pages,$year,$isbn,$oldPicture,$author,$category,$description,$price,$id);
            if($res)
                return redirect('/admin')->with(['message'=>'bravo sinovac']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = $this->b->deleteBook($id);
        if($res)
            return response()->json($res);
    }
}
