<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    // display authors
    public function __construct(){
        $this->middleware('auth');
    }

    public function list() {
        $items = Author::orderBy('name', 'asc')->get();

        return view(
            'author.list',
            [
                'title' => 'Authors',
                'items' => $items,
            ]
        );
    }

    public function create() {
        return view(
            'author.form',
            [
                'title' => 'Add new author',
                'author' => new Author()
            ]
            );
    }

    private function saveAuthorData(Author $author, AuthorRequest $request){
        $validatedData = $request->validated();
        $author->name = $validatedData['name'];
        $author->save();
    }

    public function put(AuthorRequest $request){
        
        $author = new Author();
        
        $this->saveAuthorData($author, $request);

        return redirect('/authors');
    }
    
    public function update(Author $author){
        return view(
            'author.form',
            [
                'title' => 'Edit author',
                'author' => $author
            ]
            );
    }

    public function patch(Author $author, AuthorRequest $request){
        
        $this->saveAuthorData($author, $request);

        return redirect('/authors');
    }

    public function delete(Author $author){
        $author->delete();
        return redirect('/authors');
    }
}
