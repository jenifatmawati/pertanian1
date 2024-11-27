<?php
// app/Http/Controllers/FarmGroupController.php

namespace App\Http\Controllers;

use App\Models\FarmGroup;
use Illuminate\Http\Request;

class FarmGroupController extends Controller
{
    // Definisikan konstanta untuk validasi yang sering digunakan
    const VALIDATION_RULES = 'required|string|max:255';

    public function store(Request $request)
    {
        // Gunakan konstanta VALIDATION_RULES di sini
        $request->validate([
            'name' => self::VALIDATION_RULES,
            'location' => self::VALIDATION_RULES,
            'contact_person' => self::VALIDATION_RULES,
        ]);

        // Menyimpan FarmGroup
        FarmGroup::create($request->all());

        return redirect()->route('farm_groups.index');
    }

    public function index()
    {
        // Mendapatkan semua data kelompok tani
        $farmGroups = FarmGroup::all();
        return view('farm_groups.index', compact('farmGroups'));
    }

    public function create()
    {
        return view('farm_groups.create');
    }

    public function show($id)
    {
        $farmGroup = FarmGroup::findOrFail($id);
        return view('farm_groups.show', compact('farmGroup'));
    }

    public function edit($id)
    {
        $farmGroup = FarmGroup::findOrFail($id);
        return view('farm_groups.edit', compact('farmGroup'));
    }

    public function update(Request $request, $id)
    {
        // Gunakan konstanta VALIDATION_RULES di sini juga
        $request->validate([
            'name' => self::VALIDATION_RULES,
            'location' => self::VALIDATION_RULES,
            'contact_person' => self::VALIDATION_RULES,
        ]);

        $farmGroup = FarmGroup::findOrFail($id);
        $farmGroup->update($request->all());

        return redirect()->route('farm_groups.index');
    }

    public function destroy($id)
    {
        $farmGroup = FarmGroup::findOrFail($id);
        $farmGroup->delete();

        return redirect()->route('farm_groups.index');
    }
}
