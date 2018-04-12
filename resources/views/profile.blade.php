@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
        <img src="{{ Storage::disk('public')->url($user->avatar) }}" style="width:150px; height: 150px; border-radius:50%; float:left; margin-right:25px;">
        <h2>{{ $user->name }}</h2>
        <form action="/profile" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <label> Actualizar imagen de perfil</label>
          <input class="d-block" type="file" name="avatar">
          <input type="submit" class="btn btn-primary btn-sm">
        </form>
      </div>
    </div>
  </div>
@endsection
