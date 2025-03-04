<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Affiche la liste des options.
     */
    public function index()
    {
        return view('admin.options.index', [
            'options' => Option::paginate(10)
        ]);
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('admin.options.form', [
            'option' => new Option()
        ]);
    }

    /**
     * Enregistre une nouvelle option.
     */
    public function store(OptionFormRequest $request)
    {
        Option::create($request->validated());
        return redirect()->route('admin.option.index')->with('success', 'L’option a été créée avec succès.');
    }

    /**
     * Affiche le formulaire d’édition.
     */
    public function edit(Option $option)
    {
        return view('admin.options.form', [
            'option' => $option
        ]);
    }

    /**
     * Met à jour une option existante.
     */
    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return redirect()->route('admin.option.index')->with('success', 'L’option a été modifiée avec succès.');
    }

    /**
     * Supprime une option.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('admin.option.index')->with('success', 'L’option a été supprimée.');
    }
}
