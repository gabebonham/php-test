<div class="table-flex-container ">
  <div class="table-row header">
    <div class="table-cell ">Nome</div>
    <div class="table-cell">Email</div>
    <div class="table-cell">Action</div>
  </div>
  
  @foreach ($users as $user)
  <div class="table-row">
    <div class="table-cell">{{ $user->name }}</div>
    <div class="table-cell">{{ $user->email }}</div>
    <div class="table-cell">
        <form action="{{ route('bill', $user->id) }}" method="POST">
      @csrf
      <button type="submit" class="pix-button">Cobrar PIX</button>
    </form>
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