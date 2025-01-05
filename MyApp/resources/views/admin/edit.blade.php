@extends('layouts.body')
@section('content')
@vite(['resources/js/app.js', 'resources/sass/app.scss'])

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Modifier l'utilisateur</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
            <form id="userForm" action="{{ route('admin.update', $user->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="col-auto form-row">
                  <div class="input-group mb-2 col-sm-6">
                      <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-user"></i></div>
                      </div>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Nom" value="{{ $user->name }}">
                  </div>

                  <div class="input-group mb-2 col-sm-6">
                      <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-user"></i></div>
                      </div>
                      <input type="text" class="form-control" name="Prenom" id="prenom"  placeholder="Prénom" value="{{ $user->prenom }}">
                  </div>
              </div>

              <div class="col-auto">
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-phone"></i></div>
                      </div>
                      <input type="text" class="form-control" name="telephone" id="telephone"  placeholder="Téléphone" value="{{ $user->telephone }}">
                  </div>
              </div>

              <div class="col-auto">
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                      </div>
                      <input type="date" class="form-control" name="dateNaissance" id="dateNaissance"  placeholder="Date de Naissance" value="{{ $user->dateNaissance }}">
                  </div>
              </div>

              <div class="col-auto">
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-university"></i></div>
                      </div>
                      <select name="annexe" id="annexe" class="form-control">  
                          <option value="Genie Informatique" @if($user->annexe == 'Genie Informatique') selected @endif>Génie Informatique</option>
                          <option value="Genie Industriel" @if($user->annexe == 'Genie Industriel') selected @endif>Génie Industriel</option>
                          <option value="Genie Electrique" @if($user->annexe == 'Genie Electrique') selected @endif>Génie Electrique</option>
                          <option value="Genie Mecanique" @if($user->annexe == 'Genie Mecanique') selected @endif>Génie Mécanique</option>
                          <option value="Genie Mathematique" @if($user->annexe == 'Genie Mathematique') selected @endif>Génie Mathématique</option>
                      </select>
                  </div>
              </div>

              <div class="col-auto">
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                          <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                      </div>
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
                  </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <input type="submit" value="Mettre à jour" class="btn btn-primary">
              </div>
            </form>
          </div>
      </div>
  </div>
</div>

@endsection
