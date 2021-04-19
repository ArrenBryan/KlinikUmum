@if ($errors->any())
    @foreach ($errors->all() as $err)
        <div class="alert">
            {{ $err }}
        </div>
    @endforeach
@endif

<head>
    <title>Sistem Pelayanan Kesehatan</title>
    <link rel="stylesheet" type="text/css" href="{{ url('assets/style.css') }}">
</head>

<body id="bodyLogin">
    <div class="container" id="login">
        <h1>Login</h1>
        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <label>Username</label><br>
            <input type="text" placeholder="username" name="username">
            <label>Password</label><br>
            <input type="text" placeholder="password" name="password">
            <button type="submit">Submit</button>
        </form>
    </div>     
</body>