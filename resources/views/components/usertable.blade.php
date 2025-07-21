<div class="table-wrapper">
    <h2 class="table-title">Usuários</h2>
    <div class="table-flex-container">
        <div class="table-row header">
            <div class="table-cell">Nome</div>
            <div class="table-cell">Email</div>
            <div class="table-cell">Ações</div>
        </div>
        @foreach ($users as $user)
            <div class="table-row">
                <div class="table-cell">{{ $user->name }}</div>
                <div class="table-cell">{{ $user->email }}</div>
                <div class="table-cell">
                    <a href="/billing/{{ $user->id }}" class="pix-button">Cobrar PIX</a>
                </div>
            </div>
        @endforeach
    </div>
</div>