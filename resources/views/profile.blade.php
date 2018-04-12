@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col">
        <img src="{{ Storage::disk('public')->url($user->avatar) }}" style="width:150px; height: 150px; border-radius:50%; float:left; margin-right:25px;">
        <h2>{{ $user->name }}</h2>
      </div>
    </div>
  </div>
@endsection
