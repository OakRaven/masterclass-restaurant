<?php

namespace App\Http\Controllers;

use App\Category;
use App\Food;
use App\Http\Requests\Food\CreateFoodRequest;
use App\Http\Requests\Food\UpdateFoodRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('food.index')->with('food', Food::orderby('name')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create')->with('categories', Category::orderby('name')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFoodRequest $request)
    {
        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        Food::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
            'image' => $name,
        ]);

        session()->flash('success', 'Food item has been added successfully');

        return redirect()->route('food.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        return view('food.create')
            ->with('food', $food)
            ->with('categories', Category::orderby('name')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {

        $image = $request->file('image');
        if ($image) {
            if (File::exists(public_path('/images/' . $food->image))) {
                File::delete(public_path('/images/' . $food->image));
            }

            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);

            $food->image = $name;
        }

        $food->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category,
        ]);

        session()->flash('success', 'Food item has been updated successfully');

        return redirect()->route('food.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}
