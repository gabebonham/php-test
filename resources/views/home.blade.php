@extends('layouts.publiclayout')

@section('content')
    @auth
        <section class="auth-section">
            <p class="status-text">Você está autenticado.</p>

            <form action="/logout" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-button">Sair</button>
            </form>

            <div class="wallet-section">
                @include('components.wallet')
            </div>

            <div class="grid-container">
                @include('components.billstopay')
                @include('components.billssent')
                @include('components.usertable')
            </div>
        </section>
    @else
        <section class="guest-section">
            <p class="status-text">Você não está autenticado.</p>
            <div class="auth-links">
                <a href="/auth/signup" class="auth-button">Cadastrar</a>
                <a href="/auth/login" class="auth-button">Entrar</a>
            </div>
        </section>
    @endauth
@endsection
<style>
    .auth-section, .guest-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 3rem 1rem;
        background-color: #f1f5f9;
        border-radius: 0.5rem;
        margin-top: 2rem;
    }

    .status-text {
        font-size: 1.1rem;
        color: #334155;
        margin-bottom: 1.25rem;
        text-align: center;
    }

    .logout-form {
        display: flex;
        justify-content: center;
    }

    .logout-button {
        padding: 0.5rem 1.25rem;
        background-color: #ef4444;
        color: white;
        font-weight: 600;
        border: none;
        border-radius: 0.375rem;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .logout-button:hover {
        background-color: #dc2626;
    }

    .auth-links {
        display: flex;
        gap: 1rem;
    }

    .auth-button {
        padding: 0.5rem 1rem;
        background-color: #3b82f6;
        color: white;
        font-weight: 500;
        border-radius: 0.375rem;
        text-decoration: none;
        transition: background-color 0.2s;
    }

    .auth-button:hover {
        background-color: #2563eb;
    }
    .styled-table {
        width: 100%;
        border-collapse: collapse;
        margin: 1rem 0;
        font-size: 0.9rem;
        background-color: #fff;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .styled-table th, .styled-table td {
        padding: 0.75rem;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }

    .styled-table th {
        background-color: #f1f5f9;
        font-weight: 600;
        color: #334155;
    }

    .styled-table tbody tr:hover {
        background-color: #f9fafb;
    }

    .table-wrapper {
        margin-top: 2rem;
    }

    .table-title {
        font-size: 1.25rem;
        margin-bottom: 0.5rem;
        color: #1e293b;
        font-weight: 600;
    }

    .status-paid {
        color: #065f46;
        background-color: #d1fae5;
        padding: 0.25rem 0.5rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        text-align: center;
        display: inline-block;
    }
    .status-exp {
        color: #5f0906;
        background-color: #fad1d1;
        padding: 0.25rem 0.5rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        text-align: center;
        display: inline-block;
    }
    .status-pending {
        color: #92400e;
        background-color: #fef3c7;
        padding: 0.25rem 0.5rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
        text-align: center;
        display: inline-block;
    }

    .table-flex-container {
        display: flex;
        flex-direction: column;
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .table-row {
        display: flex;
        border-bottom: 1px solid #e5e7eb;
    }

    .table-row.header {
        background-color: #f1f5f9;
        font-weight: bold;
    }

    .table-cell {
        flex: 1;
        padding: 0.75rem 1rem;
    }
</style>
