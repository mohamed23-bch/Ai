@extends('layouts.body')

@section('content')
<style>
    .liProfil {
        font-size: 10px;
        line-height: 52px;
        text-align: center;
        padding: 5px; /* Valeur de padding ajoutée */
        transform: translateY(-5px); 
        top: 110%/* Déplace légèrement l'élément vers le haut */
    }
</style>
@section('ProfileActive')
active    
@endsection

<div class="d-flex flex-row justify-content-center align-items-center" style="margin-top:50px;">
    <div class="d-flex flex-column align-items-center">
        <img src="/images/student.png" alt="student" width="260">
        <div>
            <a href="#" class="btn btn-secondary" style="padding: 5px 60px;">Changer image</a>
        </div>
    </div>
</div>

<ul>
    <li class="liProfil"><b>Nom :</b> John</li>
    <li class="liProfil"><b>Prénom :</b> Smith</li>
    <li class="liProfil"><b>Date de naissance :</b> 05/12/1998</li>
    <li class="liProfil"><b>Filière :</b> Génie Informatique</li>
    <li class="liProfil"><b>Année :</b> 3ème année</li>
    <a href="#" class="btn btn-primary" style="padding: 5px 52px;">Modifier Mes Infos</a>
</ul>    
@endsection