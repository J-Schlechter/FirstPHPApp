<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <form action ="/edit-post/{{$post->id}}" method="POST">
    @csrf
    @method('PUT')
        <p><input type = "text" name = "title" value = "{{$post->title}}">
        <p><textarea cols="50" rows="8" name = "body">{{$post->body}}  </textarea>
        <p><button>Save changes</button>
    </form>

</body>
</html>