<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCatFormRequest;
use App\Http\Requests\UpdateCatFormRequest;
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
     * @param  Cat  $cat
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
     * @param  Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function edit(Cat $cat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateCatFormRequest  $request
     * @param  Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatFormRequest $request, Cat $cat)
    {
        $cat->update($request->only([
            'name',
            'breed',
            'birth',
            'weight',
            'is_favorite'
        ]));

        return Inertia::render('Cats/index', [
            'cats' => CatResource::collection(auth()->user()->cats()->paginate(8))
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Cat  $cat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cat $cat)
    {
        //
    }
}
