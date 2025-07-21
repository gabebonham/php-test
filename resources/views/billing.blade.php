@extends('layouts.publiclayout')

@section('content')
<div class="billing-form-container">
    <div class="billing-form-card styled-form-card">
        <h2 class="form-title">Criar nova cobrança</h2>
        <form action="/bills" method="POST" class="billing-form">
            @csrf
            <div class="form-group">
                <label for="amount" class="form-label">Valor</label>
                <input type="number" name="amount" id="amount" step="0.01" min="0" placeholder="0.00" class="form-input styled-input" required>
            </div>
            <input type="hidden" name="from" value="{{ $id }}">
            <button type="submit" class="submit-button pix-button">Cobrar Cliente</button>
        </form>
    </div>
</div>
@endsection

<style>
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

    .billing-form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2rem;
    }

    .billing-form-card {
        background: white;
        padding: 2rem;
        border-radius: 0.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        width: 100%;
        max-width: 400px;
    }

    .form-title {
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
        color: #1e293b;
        font-weight: 600;
        text-align: center;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #334155;
    }

    .form-input {
        width: 100%;
        padding: 0.5rem 0.75rem;
        border: 1px solid #cbd5e1;
        border-radius: 0.375rem;
        font-size: 0.9rem;
    }

    .submit-button {
        width: 100%;
        padding: 0.5rem 1rem;
        background-color: #3b82f6;
        color: white;
        border: none;
        border-radius: 0.375rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .submit-button:hover {
        background-color: #2563eb;
    }
</style>