<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="{{asset('css/Dash.css')}}"/>
    <title>NWITEE/EDIT POST</title>

</head>
<body>
    <div class="sidebar">
            <div class="logo">
                <img class="gambar" src="{{asset('img/Logo.jpg')}}">
            </div>
                <ul>
                    <li> <a href="/home"><i class="fa fa-home"></i>  &nbspHome</a></li>
                    <li> <a href="Profile"><i class="fa fa-user-circle"></i> &nbspProfile</a></li>
                    <li> <a href="Message"><i class="fa fa-envelope"></i> &nbspMessage</a></li>
                    <li> <a href="Friends"><i class="fa fa-users"></i> &nbspFriends</a></li>
                    <li> <a href="Setting"><i class="fa fa-gear"></i>   &nbspSetting</a></li>
                    <li> <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a> </li>
                </ul>
            </div>
    </div>

    <div class="pos-edit">
            <center>                    
                <h1>Edit Post</h1>
                        <form action="/UpdatePost/{{$posts->id}}" method="POST" enctype="multipart/form-data" >
                    @method("PUT")
                    {{ csrf_field() }}
                    <div class="container">
                            <input type="hidden" name="id"  value="NULL">
                            <br>
                                <input type="body" name="body" placeholder="" size="40" value="{{$posts->body}}" 
                                style=" padding: 100px 100px;"> <br>
                                <img class="img-fluid" src="../img/posts/{{$posts->image}}" alt="" style = "width:40%;height: 200px" />
                              
                                <h5>Gambar : <input type="file" name="image" id="image" ></h5>
                                <input type="hidden" name="id" id="id" value="{{$posts->id}}">
                            <button type="submit" class="btn btn-primary" value="update" 
                                style="background-color: #3596c0; color: #ffffff; padding: 10px; border-radius:5px;">update
                            </button>
                        </form>
                        <a href="/home"> cancel </a>
                    </div>
                </center>

            </div>
        
        </div>
</body>
</html>
