@extends('layouts.publiclayout')

@section('content')
<div class="billing-form-container">
    <div class="billing-form-card">
        <h2 class="form-title">Create New Bill</h2>
        
        <form action="/bills" method="POST" class="billing-form">
            @csrf
            
            <div class="form-group">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" 
                       name="amount" 
                       id="amount"
                       step="0.01"
                       min="0"
                       placeholder="0.00" 
                       class="form-input"
                       required>
            </div>
            
            <input type="hidden" name="from" value="{{ $id }}">
            
            <button type="submit" class="submit-button">
                Charge Client
            </button>
        </form>
    </div>
</div>

<style>
    /* Base Container Styles */
    .billing-form-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        background-color: #f8fafc;
        padding: 20px;
    }

    /* Card Styles */
    .billing-form-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        width: 100%;
        max-width: 400px;
    }

    /* Form Title */
    .form-title {
        color: #1e293b;
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    /* Form Group */
    .form-group {
        margin-bottom: 1.5rem;
    }

    /* Form Label */
    .form-label {
        display: block;
        color: #64748b;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    /* Form Input */
    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* Submit Button */
    .submit-button {
        width: 100%;
        background-color: #3b82f6;
        color: white;
        padding: 0.75rem;
        border: none;
        border-radius: 8px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .submit-button:hover {
        background-color: #2563eb;
    }

    /* Responsive Adjustments */
    @media (max-width: 480px) {
        .billing-form-card {
            padding: 1.5rem;
        }
    }
</style>
@endsection