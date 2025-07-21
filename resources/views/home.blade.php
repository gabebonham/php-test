@extends('layouts.publiclayout')
@section('content')
        @auth
       <p> auth </p>  
       <form action="/logout" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
    <div>
        @include('components.wallet')
    </div>
    <div class="grid-container">
        @include('components.billstopay')
        @include('components.billssent')
        @include('components.usertable')
       </div>
        @else
       <p>not auth
</p>
<a href="/auth/signup">signup</a>
<a href="/auth/login">login</a>
        @endauth
        
@endsection
<style>
    .grid-container {
        display: grid;
        gap: 1.5rem;
        padding: 1rem;
    }

    /* Default mobile layout - single column */
    .grid-container {
        grid-template-columns: 1fr;
    }

    /* Tablet layout - 2 columns */
    @media (min-width: 768px) {
        .grid-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Desktop layout - 3 columns */
    @media (min-width: 1024px) {
        .grid-container {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    .grid-item {
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 1.5rem;
        transition: transform 0.2s ease;
    }

    .grid-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }
</style>