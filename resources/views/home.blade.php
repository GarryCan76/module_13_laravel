<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@auth
    <p>you are logged in</p>
    <form action="/logout" method="post">
        @csrf
        <button>Log out</button>
    </form>
    <div style="border: 1px solid black">
        <h2>Create a new post</h2>
        <form action="/create-post" method="post">
            @csrf
            <input name="title" type="text" placeholder="title">
            <textarea name="body" placeholder="body content..."></textarea>
            <button>Save post</button>
        </form>
    </div>
    <div style="border: 1px solid black">
        <h2>all posts</h2>
        @foreach($posts as $post)
            <div style="background-color: gray; padding: 10px; margin: 10px">
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                {{$post['body']}}
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@else
    <div style="border: 1px solid black">
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
            <input type="text" placeholder="name" name="name">
            <input type="text" placeholder="email" name="email">
            <input type="password" placeholder="password" name="password">
            <button>Register</button>
        </form>
    </div>
    <div style="border: 1px solid black">
        <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <input type="text" placeholder="name" name="loginname">
            <input type="password" placeholder="password" name="loginpassword">
            <button>Login</button>
        </form>
    </div>
@endauth


</body>
</html>
