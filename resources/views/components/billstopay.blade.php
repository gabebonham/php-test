 <div class="table-wrapper">
    <h2 class="table-title">Cobranças a Pagar</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>De</th>
                <th>Para</th>
                <th>Quantia</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($toBills as $bill)
                <tr>
                    <td>{{ $bill->fromUser->name }}</td>
                    <td>{{ $bill->toUser->name }}</td>
                    <td>R$ {{ number_format($bill->amount, 2, ',', '.') }}</td>
                    <td>
                        @if($bill->status == 'pago')
                            <span class="status-paid">Pago</span>
                        @else
                            <span class="status-pending">Pendente</span>
                        @endif
                    </td>
                    <td>
                        @if($bill->status != 'pago')
                            <form action="/payed/{{ $bill->id }}" method="PUT">
                                @csrf
                                <input type="hidden" name="amount" value="{{ $bill->amount }}">
                                <input type="hidden" name="from" value="{{ $bill->from }}">
                                <button type="submit" class="pix-button">Pagar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>