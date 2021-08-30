<?php

namespace App\Http\Controllers\API;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $request->validate([
            'perPage' => 'integer'
        ]);

//        $perPage = $request->input('perPage');
        return BookResource::collection(Book::orderByDesc('created_at')
            ->paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return BookResource
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, $this->rules());
        $book = new Book();
        $book->title = $request->get('title');
        $book->short_desc =$request->get('shortDesc');
        $book->author = $request->get('author');
        $book->release_year = $request->get('releaseYear');
        $book->publisher = $request->get('publisher');
        $book->save();
        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Book $book
     * @return BookResource
     */
    public function show(Book $book)
    {
        //
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Book $book
     * @return BookResource
     */
    public function update(Request $request, Book $book)
    {
        //
        $this->validate($request, $this->rules());
        $book->update($request->input());
        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return \response('',200);
    }

    /**
     * @return string[]
     */
    private function rules(): array
    {
        return [
            'title' => 'required|string',
            'shortDesc' => 'required|string',
            'author' => 'required|string',
            'releaseYear' => 'required|integer',
            'publisher' => 'required|string'
        ];
    }
}
