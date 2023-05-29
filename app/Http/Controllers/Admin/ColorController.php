<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorFormRequest $request)
    {
        $validatedData = $request->validated();
        Color::create([
            'name' => $validatedData['name'],
            'code' => $validatedData['code'],
            'status' => $request->status == true ? '1' : '0',
        ]);
        return redirect('admin/colors')->with('message', 'Color Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorFormRequest $request, $color_id)
    {
        $validatedData = $request->validated();
        $validatedData['status'] = $request->status == true ? '1':'0';
        Color::find($color_id)->update($validatedData);
        return redirect('admin/colors')->with('message', 'Color Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $id)
    {
        $id->delete();
        return redirect()->back()->with('message', 'Color deleted successfully');
    }
}
