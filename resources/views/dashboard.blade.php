@extends('templates.master')
@section('content')
    <div class="row">
        <h2>Wellcome {{\Illuminate\Support\Facades\Auth::user()->username}}</h2>
    </div>
@endsection
