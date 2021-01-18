<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Categorie};

class CategorieController extends Controller
{
    public function categorie(Categorie $categories, Request $request)
    {
        if ($request->method() == "POST"){
            $name = $request['categorie'];
            Categorie::create([
                'name' => $name,
                'slug' => \Str::slug($name),
            ]);
        }
        $categories = $categories->get()->sortBy('id');
        $context = array(
            "title"         => "Kategori",
            "title_body"    => "Kategori"
        );

        return view('categorie.categorie', compact('context', 'categories'));
    }

    public function edit(Categorie $categorie, Request $request)
    {
        // dd($categorie);
        if ($request->method() == "POST"){
            $name = $request['name'];
            $categorie->update($request->all());
            return redirect('categorie');
            // dd($categorie);

        }
        $context = array(
            "title"         => "Kategori",
            "title_body"    => "Edit Kategori"
        );
        return view('categorie.edit', compact('context', 'categorie'));
    }

    public function delete(Categorie $categories)
    {
        // dd($categories);
        $categories->posts()->detach();
        $categories->delete();

        return redirect('categorie');
    }
}
