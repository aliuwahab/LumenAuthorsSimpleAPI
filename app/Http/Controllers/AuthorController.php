<?php

namespace App\Http\Controllers;

use App\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     * AuthorController constructor.
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show all authors
     * @return JsonResponse
     */
    public function index(){
        $authors = Author::all();
        return $this->successResponse($authors);
    }

    /**
     * Store and return an author
     * @param Request $request
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $this->validate($request, Author::$rules);

        $author = Author::create($request->all());

        return $this->successResponse($author, Response::HTTP_CREATED);
    }


    /**
     * @param $author
     * @return JsonResponse
     */
    public function show($author){
        $author = Author::findOrFail($author);
        return $this->successResponse($author);
    }

    /**
     * @param Request $request
     * @param $author
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $author){

        $this->validate($request, Author::$editRules);

        $author = Author::findOrFail($author);
        $author->fill($request->all());

        if ($author->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $author->save();

        return $this->successResponse($author);
    }


    /**
     * @param $author
     * @return JsonResponse
     */
    public function destroy($author){

        $author = Author::findOrFail($author);
        $author->delete();

        return $this->successResponse($author);
    }



}
