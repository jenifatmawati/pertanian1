<?php

// app/Http/Controllers/FarmerController.php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\FarmGroup;
use Illuminate\Http\Request;


class FarmerController extends Controller
{
    public function index()
    {
        $farmers = Farmer::all();
        return view('farmers.index', compact('farmers'));
    }

    public function create()
    {
        $farmGroups = FarmGroup::all();
        return view('farmers.create', compact('farmGroups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'farm_group_id' => 'required|exists:farm_groups,id',
        ]);

        Farmer::create($request->all());

        return redirect()->route('farmers.index');
    }

    public function show($id)
    {
        $farmer = Farmer::findOrFail($id);
        return view('farmers.show', compact('farmer'));
    }

    public function edit($id)
    {
        $farmer = Farmer::findOrFail($id);
        $farmGroups = FarmGroup::all();
        return view('farmers.edit', compact('farmer', 'farmGroups'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'farm_group_id' => 'required|exists:farm_groups,id',
        ]);

        $farmer = Farmer::findOrFail($id);
        $farmer->update($request->all());

        return redirect()->route('farmers.index');
    }

    public function destroy($id)
    {
        $farmer = Farmer::findOrFail($id);
        $farmer->delete();

        return redirect()->route('farmers.index');
    }
}
