
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NWITEE</title>
        <link rel="stylesheet" href="Home.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
    <div class="sidebar">
            <div class="logo">
                <img class="gambar" src="img/Logo.jpg">
            
                <ul>
                    <li> <a href="home"><i class="fa fa-home"></i>  &nbspHome</a></li>
                    <li> <a href="mypost"><i class="fa-user-circle-o"></i>  &nbspMypost</a></li>
                    <li> <a href="Profile"><i class="fa fa-user-circle"></i> &nbspProfile</a></li>
                    <li> <a href="Message"><i class="fa fa-envelope"></i> &nbspMessage</a></li>
                    <li> <a href="Friends"><i class="fa fa-users"></i> &nbspFriends</a></li>
                    <li> <a href="Setting"><i class="fa fa-gear"></i>   &nbspSetting</a></li>
                    <li> <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a> </li>
                </ul>
            </div>
    </div>
    <header>
        <div class="header">
        @auth  
            <div class="text-headers">
                Wellcome {{ auth()->User()->Username}} 
            </div>
            <div class="search">
                <input type="text" placeholder="Search.." name="search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </div>
            <div class="notif">
                <a href="#notif"><i class="fas fa-bell"></i></a>
            </div>
            </div>
        </div>
            <!-- <div>
                <ul class="nav nav-pills">
                    <a href=" class="btn btn-danger">Logout</a>
                </ul>
            </div> -->
        </div>
         <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">             
            <div class="dropdown-divider"></div>
           
        </div>
        
        
                <!-- <div class="logout">
               
            </div>   -->
    </header>
            
     
    <form method="POST" enctype="multipart/form-data" action="/post.store">
    {{ csrf_field() }}
        <div class="posting">
            <div class="createpost">
                <input type="text" placeholder="How's Your day?" name="body" id="body" >
                <input type="hidden" value="{{ Session::token()}}" name="_token">	
            </div>
                <div class="form-control">
                    <input name="image" type="file"  id="image" >
                </div>
            </div> 
        <div>
        <div class="createpost">
            <br><br>
                <div class="button-group text-center">
                    <button type="submit" class="btn btn-primary">
                        Post
                    </button>                             
                </div>   
        </div> 
            <!-- <div class="createpost-icon">
                 <a class ="tombpost" href="Upload"> </a> 
                <a class ="tombpost" href="#"> <i class ="fa fa-link"> </i></a>
                <a class ="tombpost" href="#"> <i class ="fa fa-frown-o"> </i></a>
            </div> --> 
        </div>
    
    @foreach($posts as $posts)   
    <div class="post-display">
        <div class="postingan">
                <div class="user-info">
                    <div class="profilephoto">
                        <img src="./images/girl.jpg" alt="">
                    </div>
                    <div class="post-info">
                        <div class="name">{{ $posts->Username}}</div>
                        <span class="time">{{ $posts->created_at }}</span>
                    </div>
                    <!-- <form action="/posts/delete/ $posts->id}}" method="POST" class="d-inline">
                       
                        @csrf 
                        <button class="badge bg-danger boder-0" onclick="return confirm('Are your sure'?)"><span data-feather='x-circle'></span>Delete</button>
                    </form>      -->
                    <div class = "ED">
                        <a href='/EditPost/{{$posts->id}}' class="btn btn-success" onclick='return confirm("Edit post?");'>
                            <i class="fa fa-edit"> Edit </i>
                        </a> 
                        <a href="/DeletePost/{{$posts->id}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                    <!-- <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Dropdown</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </div>
                    
                </div> -->

                <div class="post-content">
                    <div class="post-status"> 
                        <p>{{$posts->body}}</p>
                    </div>
                    <div class="post-file">
                        <div style="width:100%;height: 300px;; background-image: url('img/posts/{{$posts->image}}'); background-size:cover;"></div>
                    </div>
                    </div>
                </div>

                
                <div class="LCS">
                    <div class="action">
                        <a href="{{url('like',$posts->id)}}"><i class="fa fa-thumbs-up"></i>
                        <span>Like</span></a>
                    </div>
                    <div class="action">
                        <a href="{{url('like', $posts->id)}}"><i class="fa fa-thumbs-down"></i></a>
                        <span>Unlike</span>
                    </div>
                    <div class="action">
                        <a href='/Comment/{{$posts->id}}'><i class="fa fa-comment"></i>
                        <span>Comment</span>
                    </div>
                    <div class="action">
                        <i class="fa fa-share"></i>
                        <span>Share</span>
                    </div>
                    
                    </div>  
                </div>
            </div>
            @endforeach
            @endauth
                   <div class="information-bar">
            <h2>Information</h2>
            <p>
                Tindakan menyalahkan hanya akan membuang waktu. Sebesar apapun kesalahan yang Anda timpakan ke orang lain, 
                dan sebesar apapun Anda menyalahkannya, hal tersebut tidak akan mengubah Anda” - Wayne Dyer
            </p>   
        </div>

    
    </body>
    </html>

