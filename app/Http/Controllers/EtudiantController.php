<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index() {
        $students = Etudiant::orderBy("nom","asc")->paginate(5);
    return view('etudiant',compact("students"));
}

    public function create(){
        $classes=Classe::all();
        return view("createStudent", compact("classes"));
    }
    public function ajouter(Request $request){
       $request->validate([
        "nom"=>"required",
        "prenom"=>"required",
        "classe_id"=>"required",
       ]);
       //avec var $fillable du model qui récupère les value 
       Etudiant::create($request->all());
    // Methode sans $fillable dans le model
    // Etudiant::create([
    //     "nom"=>$request->nom,
    //     "prenom"=>$request->prenom,
    //     "classe_id"=>$request->classe_id,
    // ]);

    //Permet de renvoyer sur la meme page avec un message de succès
    return back()->with("success", "Etudiant ajouté avec succès !");
    }

    public function supprimer(Request $request, $etudiant) {
        Etudiant::destroy($etudiant);
        return back()->with("successDelete", "Etudiant supprimé avec succès !");
    }
    public function update(Request $request,Etudiant $etudiant){
        $request->validate([
         "nom"=>"required",
         "prenom"=>"required",
         "classe_id"=>"required",
        ]);
        $etudiant->update($request->all());
 
     return back()->with("success", "Etudiant mis a jour avec succès !");
     }

     public function edit(Etudiant $etudiant){
        $classes=Classe::all();
        return view("editStudent", compact("etudiant","classes"));
    }
}
