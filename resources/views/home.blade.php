<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    
    @auth
    <p><b> Welcome {{Auth::user()->name}} </b></p>
    <p style="text-align:right;"> You are logged in! </p>
    <form style="text-align:right;" action = "/logout" method = "POST">
        @csrf
        <button> Log Out </button>
    </form>

    <div style="border: 3px solid black;">
        <h2> Write a Post </h2>
        <form action = "/create-post" method = "POST">
        @csrf
            <p><input type = "text" name = "title" placeholder="Your post's title">
            <p><textarea  cols="50" rows="8" name="body" placeholder="Write your post here!"></textarea>
            <p><button>Post</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2> All Posts </h2>
        @foreach($posts as $post)
        <div style="background-color: gray; padding: 10px; margin:10px; border: 1px solid black;">
            <h3>{{ $post['title']}} by {{$post->user->name}} </h3>
            <p>{{ $post['body'] }}</p>
            <p><a href="/edit-post/{{ $post->id }}"> Edit </a></p>
            <form action = "/delete-post/{{ $post->id }}" method = "POST">
            @csrf
                @method('DELETE')
                <p><button>Delete Post</button>
            </form>
        </div>
        @endforeach
    </div>

    @else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
        @csrf
            <input type="text" placeholder="name" name='name'>
            <input type="text" placeholder="email" name='email'>
            <input type="password" placeholder="password" name='password'>
            <button>Register</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>Log In</h2>
        <form action="/login" method="POST">
        @csrf
            <input type="text" placeholder="name" name='loginname'>
            <input type="password" placeholder="password" name='loginpassword'>
            <button>Log In</button>
        </form>
    </div>
    @endauth
           
</body>
</html>