<div class="table-flex-container ">
  <div class="table-row header">
    <div class="table-cell ">De</div>
    <div class="table-cell">Para</div>
    <div class="table-cell">Quantia</div>
    <div class="table-cell">Status</div>
  </div>
  
  @foreach ($ownedBills as $bill)
  <div class="table-row">
    <div class="table-cell">{{ $bill->fromUser->name }}</div>
    <div class="table-cell">{{ $bill->toUser->name }}</div>
    <div class="table-cell">{{ $bill->amount }}</div>
    <div class="table-cell">
    @if($bill->status=='page')
        <span class="status-paid">Pago</span>
    @else
        <span class="status-pending">Pendente</span>
    @endif
</div>
  </div>
  @endforeach
</div>

<style>
  .table-flex-container {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
    width: 100%;
  }
  .status-paid {
    color: #065f46; /* green-800 */
    background-color: #d1fae5; /* green-100 */
    padding: 0.25rem 0.5rem;
    border-radius: 9999px;
    font-size: 0.75rem;
}

.status-pending {
    color: #92400e; /* yellow-800 */
    background-color: #fef3c7; /* yellow-100 */
    padding: 0.25rem 0.5rem;
    border-radius: 9999px;
    font-size: 0.75rem;
}
  .table-row {
    display: flex;
    gap: 1rem;
    padding: 0.75rem;
    border-bottom: 1px solid #e2e8f0;
  }
  
  .table-row.header {
    font-weight: bold;
    background-color: #f7fafc;
  }
  
  .table-cell {
    flex: 1;
    min-width: 0; /* Allows text truncation */
  }
  
  .pix-button {
    background-color: #48bb78;
    color: white;
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 0.25rem;
    cursor: pointer;
    transition: background-color 0.2s;
  }
  
  .pix-button:hover {
    background-color: #38a169;
  }
</style>