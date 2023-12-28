<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('link-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif&family=Nunito:wght@400;700&display=swap"
        rel="stylesheet">
    <title>Short URL generator</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1173169895998236"
        crossorigin="anonymous"></script>
</head>

<body>
    <main class="main">
        <div>
            <h1>Short URL Generator</h1>
        </div>
        <h2>As simple as copy & paste</h2>
        <form method="POST" action="{{ route('web.store') }}" enctype="multipart/form-data">
            @csrf
            <label>Insert the url</label>
            <input type="text" name="url" />
            <input type="submit" value="submit" />
            @if (session('error'))
                <div class="alert alert-danger">
                    @if (session('res'))
                        <br>
                        <div>
                            <p>Message: {{ session('res')['reason'] }}</p>
                            <p>But you can use this url {{ session('res')['url'] }}</p>
                            <a href="#" class="copy" onclick="getUrl()">Copy Url</a>
                        </div>
                    @endif
                </div>
            @endif
            @if (session('success'))
                <div class="success message">
                    <div>
                        <p>Your short URL: <span id="url-result">{{ session('res') }}</span></p>
                        <a href="#" class="copy" onclick="getUrl()">Copy Url</a>
                    </div>
                </div>
            @endif
        </form>
    </main>
    <script src="{{ asset('resources/js/index.js') }}"></script>
</body>

</html>
