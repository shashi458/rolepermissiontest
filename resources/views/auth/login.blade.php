@extends('layouts.app')

@section('content')
<h2>Login</h2>

@if($errors->any())
  <div>
    <ul>
      @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div><label>Email</label><input type="email" name="email" value="{{ old('email') }}" required></div>
    <div><label>Password</label><input type="password" name="password" required></div>
    <div><label><input type="checkbox" name="remember"> Remember me</label></div>
    <button type="submit">Login</button>
</form>
@endsection
