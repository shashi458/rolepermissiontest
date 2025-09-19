@extends('layouts.app')

@section('content')
<h2>Register</h2>

@if($errors->any())
  <div>
    <ul>
      @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  </div>
@endif

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div><label>Name</label><input type="text" name="name" value="{{ old('name') }}" required></div>
    <div><label>Email</label><input type="email" name="email" value="{{ old('email') }}" required></div>
    <div><label>Password</label><input type="password" name="password" required></div>
    <div><label>Confirm</label><input type="password" name="password_confirmation" required></div>
    <button type="submit">Register</button>
</form>
@endsection
