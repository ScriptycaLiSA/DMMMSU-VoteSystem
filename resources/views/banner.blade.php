@extends('layouts.master')
@section('title', 'Welcome!')
@section('content')
  <h3 class="text-center">Welcome to DMMMSU VoteSystem</h3>
  <p class="text-center">Go to <a href="{{ url('/campaign') }}">Campaign Site!</a></p>
@endsection
