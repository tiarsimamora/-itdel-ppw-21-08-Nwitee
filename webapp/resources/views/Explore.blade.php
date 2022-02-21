<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<title>Profile</title>
<link rel="stylesheet" href="{{ url('Profile.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <div class="logo">
            <img class="gambar" src="{{ url('img/Logo.jpg') }}">
        </div>
        <div class="icon-headers">
                <a class ="tombnotif" href="#"> <i class ="fa fa-bell"> </i></a>
        </div>
        <div class="search">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
    </header>
    <div id="rows">
        <div class="sidebar">
            <ul>
                <li> <a href="{{url('home')}}"><i class="fa fa-home"></i>  &nbspHome</a></li>
                <li> <a href="{{url('Profile')}}"><i class="fa fa-user-circle"></i> &nbspProfile</a></li>
                <li> <a href="{{route('Profile.all')}}"><i class="fa fa-gear"></i>   &nbspExplore</a></li>
                <li> <a href="{{url('Message')}}"><i class="fa fa-envelope"></i> &nbspMessage</a></li>
                <li> <a href="#"><i class="fa fa-users"></i> &nbspFriends</a></li>
                <li> <a href="{{url('Setting')}}"><i class="fa fa-gear"></i>   &nbspSetting</a></li>
                <li> <a href="{{ route('logout') }}"><i class="fa fa-gear"></i>   &nbspLogout</a></li>
            </ul>
        </div>
        <div id="colomn">
            <div class="status">
                @foreach($pegawai as $posts)
                <a href="{{route('Profile.edit',$posts->id)}}" class="explore">
                    <img src="http://127.0.0.1:8000/img/Ava.jpeg" style="height: 150px;width: 100%;" alt="profile"/>
                    <h2><center>{{ $posts->Username}}</center></h2>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</body>
