<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="UTF-8">
<link rel="stylesheet" href="master.css">
<link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/components/alerts/#dismissing">


<form action="{{ route('SignUp') }}" method="POST" style="border:1px solid #ccc">
 @csrf 
 
<div class="contain">
  <h1>Sign Up</h1>
  <p>Please fill in this form to create an account.</p> 
  <hr>

  <div class = "form-floating">
  <label for="UserID"><b>UserID</b></label>
  <input type="varchar" placeholder="Enter UserID" name="UserID" class="form-signup rounded-top @error('UserID') 
    is-invalid @enderror" id="UserID" >
    @error('UserID')
    <div class=".alert-danger">{{ $message }}
    @enderror
    </div>
  

<div class = "form-floating">
  <label for="Username"><b>Username</b></label>
  <input type="varchar" placeholder="Enter Username" name="Username" class="form-signup rounded-top @error('Username') 
    is-invalid @enderror" id="Username" >
    @error('Username')
    <div class=".alert-danger">{{ $message }}
    @enderror
    </div>


<div class = "form-floating">
  <label for="Date_Of_Birth"><b>Date Of Birth</b></label>
  <input type="date" placeholder="Enter Date of birth" name="Date_Of_Birth" class="form-signup rounded-top @error('Date_Of_Birth') 
    is-invalid @enderror" id="Date_Of_Birth" >
    @error('Date_Of_Birth')
    <div class=".alert-danger">{{ $message }}
    @enderror
    </div>


<div class = "form-floating">
  <label for="Email"><b>Email</b></label>
  <input type="varchar" placeholder="Enter email" name="Email" class="form-signup rounded-top @error('Email') 
    is-invalid @enderror" id="Email" required>
    @error('Email')
    <div class="alert alert-danger">{{ $message }}
    @enderror
    </div>


<div class = "form-floating">
  <label for="Password"><b>Password</b></label>
  <input type="password" placeholder="Enter Password" name="Password" class="form-signup rounded-top @error('Password') 
    is-invalid @enderror" id="Password" required>
    @error('Password')
    <div class="alert alert-danger">{{ $message }}
    @enderror
    </div>



  <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

  <div class="clearfix">
    <button type="cancel" class="cancelbtn">Cancel
        <a href="master.css"></a>    
    </button>
    <button type="submit" value="Simpan" name="Proses" >Sign Up</button>
    </div>
  </div>
</div>
</form>