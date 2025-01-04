@extends('layouts.body')
@section('Active')
active    
@endsection
@section('dash')
<li>
  <a href="{{Route('admin.index')}}">
    <i class="bx bx-grid-alt"></i>
    <span class="links_name">Dashboard</span>
  </a>
</li>
@endsection
@section('Afficher')
 <li>
  <a href="{{Route('admin.Afficher')}}">
    <i class="bx bx-box"></i>
    <span class="links_name">Actions</span>
  </a>
</li> 
@endsection
@section('content')
@vite(['resources/js/app.js', 'resources/sass/app.scss'])

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<div class="content-wrapper" style="display: flex; justify-content: center; align-items: center; min-height: 120vh; padding-top: 61px;">
  <div class="table-container" style="width: 90%; background-color: #f8f9fa; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    
{{-- testttt --}}









{{-- <!-- Titre --> --}}
    <h1 class="text-center mb-4">Gestion des User</h1>
    @if ($errors->any())
    <div class="alert alert-danger " style="margine-top:20%">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
            @endforeach
        </ul>
    </div>
@endif
    <!-- Bouton Ajouter -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ajouter User
      </button>
    <hr/>
    <!-- Tableau -->
    <table class="table table-striped table-bordered">
        
      <thead>
        <!-- Ligne du titre principal -->
        <tr style="background-color: #435d7d">
          <th colspan="9" class="text-light text-center" style="font-size: 25px;">Liste des User</th>
        </tr>
        
        <!-- En-têtes des colonnes -->
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date de Naissance</th>
          <th>Téléphone</th>
          <th>Annexe</th>
          <th>Email</th>
          <th colspan="3">Actions</th>
        </tr>
      </thead>
      
      <tbody>
        <!-- Exemple de ligne étudiante -->
        @foreach ($user as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->prenom }}</td>
            <td>{{ $user->dateNaissance }}</td>
            <td>{{ $user->telephone }}</td>
            <td>{{ $user->annexe }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-center">
                {{-- <a href="javascript:void(0)" onclick="edituser({{ $user->id }})">
                    <img src="/image/editing.png" alt="edit" width="25">
                </a> --}}

                {{--  --}}

                
                <a href="{{ Route('admin.edit', ['id' => $user->id]) }}">
                  <img src="/image/editing.png" alt="edit" width="25">
               </a>
              
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Launch static backdrop modal
                      </button> --}}

                {{--  --}}
            </td>   
            <td class="text-center">
                
           
{{--  --}}
          <form id ="deleteStudentForm" action="{{ route('admin.destroy', $user->id) }}" method="post">
             @csrf
             @method('DELETE')
             <button type="submit">
                      <img src="/image/delete.png" alt="delete" width="25">
             </button>
          </form>
{{--  --}}
</td>
            <td class="text-center">
              {{-- <a href="{{ Route('admin.deleteView', ['id' => $etudiant->id]) }}">
                  <img src="/images/delete.png" alt="delete" width="25">
              </a> --}}
          </td>
          @endforeach 

        </tr>
      </tbody>
    </table>
    {{-- <div class="d-flex justify-content-center">
        {{$user -> links()}}
    </div> --}}
  </div>
</div>

<!-- Modal Ajouter -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{Route('admin.store')}}" method="POST">
                @csrf
                  <div class="col-auto form-row">
                    <div class="input-group mb-2 col-sm-6">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                      </div>
                      <input type="text" class="form-control" name="name" placeholder="Nom">
                    </div>
    
                    <div class="input-group mb-2 col-sm-6">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                      </div>
                      <input type="text" class="form-control" name="Prenom" placeholder="Prenom">
                    </div>
                  </div>
    
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-phone"></i></div>
                      </div>
                      <input type="text" class="form-control" name="telephone" placeholder="Téléphone">
                    </div>
                  </div>
    
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                      </div>
                      <input type="date" class="form-control" name="dateNaissance" placeholder="Date de Naissance">
                    </div>
                  </div>
    
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-university"></i></div>
                      </div>
                      <select name="annexe" id="annexe"  class="form-control">
                        <option value="Niveau 1">Niveau 1</option>
                        <option value="Niveau 2">Niveau 2</option>
                        <option value="Niveau 3">Niveau 3</option>
                        <option value="Niveau 4">Niveau 4</option>
                        <option value="Niveau 5">Niveau 5</option>
                    </select>
                    </div>
                  </div>
                  {{--Rendment  --}}

                  <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-university"></i></div>
                        </div>
                        <select name="affectation_id" id="affectation_id" class="form-control">
                            <option value="">Sélectionnez une option</option>
                            <optgroup label="A1">
                                <option value="الصخور">الصخور</option>
                                <option value="أولاد أتميم">أولاد أتميم</option>
                                <option value="بوشان">بوشان</option>
                                <option value="لبريكين">لبريكين</option>
                            </optgroup>
                            <optgroup label="A2">
                                <option value="لوطا">لوطا</option>
                                <option value="لبحيرة">لبحيرة</option>
                                <option value="راس العين">راس العين</option>
                                <option value="الجبيلات">الجبيلات</option>
                                <option value="سيدي بوعتمان">سيدي بوعتمان</option>
                            </optgroup>
                            <optgroup label="A3">
                                <option value="بلدية إبن جرير - الملحقة الأدارية الاولى AA1">بلدية إبن جرير - الملحقة الأدارية الاولى AA1</option>
                                <option value="بلدية إبن جرير - الملحقة الأدارية التانية AA2">بلدية إبن جرير - الملحقة الأدارية التانية AA2</option>
                                <option value="بلدية إبن جرير - الملحقة الأدارية التالتة AA3">بلدية إبن جرير - الملحقة الأدارية التالتة AA3</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                
                
                

                  {{--  --}}
                  <div class="col-auto">
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                      </div>
                      <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                  </div>
    
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <input type="submit" value="Ajouter" class="btn btn-primary">
                  </div>
                </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>


@endsection
