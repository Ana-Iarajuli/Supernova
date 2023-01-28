@extends("layout")

@section("body")
    <div style="text-align: center;">
        <h1>Welcome to the Supernova!</h1>
        <img src="https://cdn.discordapp.com/attachments/1038788517276422174/1067168302058717265/logo.png" alt="Yin and Yang">
        @guest
            <h4>Already have an account?</h4>
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <h4>Don't have an account?</h4>
            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
        @endguest
    </div>
@endsection