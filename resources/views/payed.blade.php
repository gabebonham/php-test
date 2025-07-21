@extends('layouts.publiclayout')

@section('content')
<div class="pix-confirmation">
    <h1 class="confirmation-title">Pix {{ $id }} pago com sucesso!</h1>
    <a href="/home" class="return-link">Voltar para a Home</a>
</div>
@endsection

<style>
    .pix-confirmation {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 4rem 2rem;
        background-color: #f9fafb;
    }

    .confirmation-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #065f46;
        margin-bottom: 1rem;
        text-align: center;
    }

    .return-link {
        font-size: 0.95rem;
        padding: 0.5rem 1rem;
        background-color: #3b82f6;
        color: white;
        border-radius: 0.375rem;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.2s;
    }

    .return-link:hover {
        background-color: #2563eb;
    }
</style>
