@extends("layouts.master")
@section('contenu')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Liste des etudiants</h3>
    <div class="d-flex justify-content-start mb-4">
      {{$students->links()}}
    </div>
    <div class="d-flex justify-content-end mb-4">
        <a href="{{route('etudiant.create')}}" class="btn btn-success">Ajouter un nouvel étudiant</a>
    </div>
    @if(session()->has("successDelete"))
    <div class="alert alert-success"> 
        {{session()->get("successDelete")}}
    </div>
        @endif
    <div class="d-flex text-body-secondary pt-3">
     
        <table class="table table-hover table_bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Classe</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $etudiant )
              <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$etudiant->nom}}</td>
                <td>{{$etudiant->prenom}}</td>
                <td>{{$etudiant->classe->libelle}}</td>
                <td>
                    <a href="{{route('etudiant.edit',['etudiant' => $etudiant->id])}}" class="btn btn-warning">Editer</a>
                    <a href="{{ route('etudiant.supprimer', ['etudiant' => $etudiant->id]) }}"
                      class="btn btn-danger"
                      onclick="event.preventDefault();
                               if (confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')) {
                                   document.getElementById('form-delete-{{ $etudiant->id }}').submit();
                               }">
                       Supprimer
                   </a>
                   <form id="form-delete-{{ $etudiant->id }}"
                         action="{{ route('etudiant.supprimer', ['etudiant' => $etudiant->id]) }}"
                         method="POST" style="display: none;">
                       @csrf
                       @method('DELETE')
                   </form>
                </td>
              </tr>
            @endforeach
            </tbody>
            
          </table>
          
  </div>

  
@endsection