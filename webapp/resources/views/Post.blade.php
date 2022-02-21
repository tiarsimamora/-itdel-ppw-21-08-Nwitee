<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<title>Profile</title>
<link rel="stylesheet" href="Post.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <header>
    <form action="/Post" method="post">

    
    <div class="logo">
        <img class="gambar" src="Logo.jpg">
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

<div class="judul">
  <h1>Create a new post</h1>
</div>

    <div class="field">
        <label class="label">JudulPost</label>
        <div class="control">
            <input type="text" name="judulpost" class="input" placeholder="judulpost" minlength="5" maxlength="100" required />
        </div>
    </div>

    <div class="field">
        <label class="label">Postingan</label>
        <div class="control">
            <textarea name="postingan" class="textarea" placeholder="postingan" minlength="5" maxlength="2000" required rows="10"></textarea>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link is-outlined">Publish</button>
        </div>
    </div>
    </form>
</body>
</html>