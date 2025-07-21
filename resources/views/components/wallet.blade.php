
<div class="wallet-container">
    <div class="wallet-card">
        <div class="wallet-header">
            <h1>Wallet Summary</h1>
            <div class="wallet-icon">💰</div>
        </div>

        <div class="wallet-owner">
            <div class="owner-avatar">
                {{ strtoupper(substr($wallet->owner, 0, 1)) }}
            </div>
            <div class="owner-details">
                <h2>{{ $wallet->owner }}</h2>
                <p>Account Holder</p>
            </div>
        </div>

        <div class="wallet-balance">
            <p class="balance-label">Current Balance</p>
            <p class="balance-amount">
                {{ number_format($wallet->value, 2) }}
            </p>
        </div>
    </div>
</div>

<style>
    /* Base Styles */
    .wallet-container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        max-width: 500px;
        margin: 2rem auto;
    }

    /* Card Styles */
    .wallet-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    /* Header Styles */
    .wallet-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .wallet-header h1 {
        font-size: 1.5rem;
        color: #333;
        margin: 0;
    }

    .wallet-icon {
        font-size: 1.8rem;
    }

    /* Owner Styles */
    .wallet-owner {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: #f8f9fa;
        padding: 1.2rem;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .owner-avatar {
        width: 48px;
        height: 48px;
        background: #3b82f6;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        font-weight: bold;
    }

    .owner-details h2 {
        margin: 0;
        color: #333;
        font-size: 1.1rem;
    }

    .owner-details p {
        margin: 0.2rem 0 0;
        color: #666;
        font-size: 0.9rem;
    }

    /* Balance Styles */
    .wallet-balance {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        padding: 1.5rem;
        border-radius: 8px;
    }

    .balance-label {
        margin: 0 0 0.5rem;
        font-size: 0.9rem;
        opacity: 0.9;
    }

    .balance-amount {
        margin: 0;
        font-size: 2rem;
        font-weight: bold;
    }

    .currency {
        font-size: 1.2rem;
        margin-left: 0.3rem;
    }

    .balance-update {
        margin: 0.5rem 0 0;
        font-size: 0.8rem;
        opacity: 0.8;
    }
</style>