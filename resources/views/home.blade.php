@extends('layouts.publiclayout')
@section('content')
 @auth
       <p> auth </p>  
       <form action="/logout" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
    <ul>
            @include('components.usertable')
        </ul>
       @else
       <p>not auth
</p>
<a href="/auth/signup">asdf</a>
        @endauth
        
@endsection
