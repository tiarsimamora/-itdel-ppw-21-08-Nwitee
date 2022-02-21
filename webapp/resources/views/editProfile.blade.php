<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<title>Edit Profile</title>
<link rel="stylesheet" href="./Profile.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="logo">
            <img class="gambar" src="Img/Logo.jpg">
        </div>
            <div class="icon-headers">
                    <a class ="tombnotif" href="#"> <i class ="fa fa-bell"> </i></a>
            </div>
        </header>
            <div class="sidebar">
                <ul>
                    <li> <a href="Home"><i class="fa fa-home"></i>  &nbspHome</a></li>
                    <li> <a href="Profile"><i class="fa fa-user-circle"></i> &nbspProfile</a></li>
                    <li> <a href="Message"><i class="fa fa-envelope"></i> &nbspMessage</a></li>
                    <li> <a href="Friends"><i class="fa fa-users"></i> &nbspFriends</a></li>
                    <li> <a href="Setting"><i class="fa fa-gear"></i>   &nbspSetting</a></li>
                </ul>
            </div>

            <div class="profile">
          <div class="menu">
          <div class="container">
            <img src="/Img/avatars/login.png" style="width:150px; height:150px; border-radius:50%; display: block; margin-left: auto; margin-right: auto;">
          </div>
          <div class="update">
            <form action="{{ route('profile.update') }}" method="post">
              @method("put")
              @csrf
              <label for="UserID">UserID</label>
              <input value="{{ old('UserID', Auth::user()->UserID) }}" type="text" name="UserID">

              <label for="Username">Username</label>
              <input value="{{ old('Username', Auth::user()->Username) }}" type="text" name="Username">

              <label for="email">Email</label>
              <input value="{{ old('Email', Auth::user()->Email) }}" type="text" name="Email">

              <label for="Password">Password</label>
              <input value="{{ old('Password', Auth::user()->Password) }}" type="password" name="Password">

              <label for="Repeat_Password">Repeat_Password</label>
              <input value="{{ old('Repeat_Password', Auth::user()->Repeat_Password) }}" type="password" name="Repeat_Password">
            
              <input type="submit" value="Save">
            </form>
          </div>
          </div>
        </div>
</body>
</html>
