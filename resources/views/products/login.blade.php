@extends('layouts.login')
@section('content')
    <div class="login-container">
        <div class="login-form">
            <h1 class="title">Log In</h1>
            <p class="subtitle">Keep it all together and you'll be fine</p>

<form method="POST" action="{{ route('login') }}">
         <div class="form-groupp">
      @csrf
            <div class="form-group">
    <input type="text" name="name" placeholder="Name" class="input-field" required>
</div>
 <div class="form-group">
      <input type="email" name="email" placeholder="Email"   class="input-field" required>
       </div>
        <div class="form-group">
      <input type="password" name="password" placeholder="Password"  class="input-field password-input" required>
        <button type="button" class="show-password">Show</button>
       </div>
           <button type="submit"  class="sign-in-btn">log in</button>
<div class="divider">or</div>
         <a href="{{ route('products.signup') }}" class="sign-in-btn">Sign up</a>
    </form>
     </form>
  </div>
    </div>
</div>
@endsection
