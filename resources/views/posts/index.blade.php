
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <!-- 07-2 <h2 class='title'>{{ $post->title }}</h2> -->
                    <!-- 07-3---------- -->
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <!-- -------------- -->
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <a href='/posts/create'>create</a> <!-- 7-04 -->
    </body>
</html>
