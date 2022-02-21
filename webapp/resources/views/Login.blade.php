<!DOCTYPE html>
<html lang="en">>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="UTF-8">
      <title>NWITEE</title>
      <link rel="stylesheet" href="master.css">


<form action="{{ route('login') }}" method="POST">
@csrf
  <div class="login">
    <div class="imgcontainer">
      <img src="img/Logo.jpg" alt="Avatar" class="avatar">
    </div>
    <div class='form-signup'>
      <div class="form-floating"> </div>
      <div>
        <label for="UserID"><b>UserID</b></label>
      </div>
          <input type="varchar" placeholder="Enter UserID" name="UserID" class="form-signup rounded-top @error('UserID') 
      is-invalid @enderror" id="UserID" required>
          @error('UserID')
            <div class = "invalid-feedback">
              {{$message }}
          @enderror 
    </div>
      <div class="form-floating"> </div>
      <div>
        <label for="Password">Password</label>
      </div>
        <input type="password" placeholder="Password" name ="Password" class="form-signup rounded-top @error('Password') 
      is-invalid @enderror" id="Password"  required>
        @error('Password')
          <div class = "invalid-feedback">
            {{$message }}
        @enderror 
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
        <button class="btnlogin" type="submit">Login</button>
    
    <p>Doesn't have an account? click <a href=" SignUp" class="underlineSignIp">Sign Up</a> </p>
</div>   
</form>
</html> 