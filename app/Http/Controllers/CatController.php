<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatFormRequest;
use App\Http\Resources\CatResource;
use App\Models\Cat;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Cats/index', [
            'cats' => CatResource::collection(auth()->user()->cats()->paginate(8))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Cats/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCatFormRequest $request)
    {
        $request->authenticate();

        $user = auth()->user();

        $user->cats()->create([
            'name'      => $request->name,
            'breed'     => $request->breed,
            'birth'     => $request->birth,
            'weight'    => $request->weight,
            'picture'   => ''
        ]);

        return Inertia::render('Cats/index', [
            'cats' => CatResource::collection($user->cats()->paginate(8))
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $cat)
    {
        return Inertia::render('Cats/show', [
            'cat' => CatResource::make($cat)
        ]);
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
    }
}
