<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ControllerProduits extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if(request()->categorie)
        {
            $produits = Produit::with('categories')->whereHas('categories',function($query){
                $query->where('slug',request()->categorie);
            })->orderBy('created_at','DESC')->paginate(6);
        }
        else{
            $produits = Produit::with('categories')->orderBy('created_at','DESC')->paginate(6);
        }

        return view('produits.index')->with('produits',$produits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return view('produits.show')->with('produit',$produit);
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

    public function recherche(Request $request){
        $request->validate([
            'recherche'=>'required|min:2|alpha',
        ]);
        $produits = Produit::where('titre','like',"%$request->recherche%")
                                ->orWhere('description','like',"%$request->recherche%")->orderBy('created_at','DESC')->paginate(6);

                    return view('produits.recherche')->with('produits',$produits);
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
