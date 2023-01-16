@extends('modules.layout')
@section('content')
<div class="card">
  <div class="card-header">Modules Page</div>
  <div class="card-body">
      
      <form action="{{ url('modules') }}" method="post">
        {!! csrf_field() !!}
        <label>Nom</label></br>
        <input type="text" name="nom" id="nom" class="form-control"></br>
        <label>Description</label></br>
        <input type="text" name="description" id="description" class="form-control"></br>
        <label>Etat</label></br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="etat" id="etat0" value="0">
            <label class="form-check-label" for="etat">
                Active
            </label>
            </div>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="etat" id="etat1" value="1" checked>
            <label class="form-check-label" for="etat">
                Inactive
            </label>
        </div>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop