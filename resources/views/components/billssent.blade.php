<div class="table-wrapper">
  <h2 class="table-title">Cobranças Criadas</h2>
  <table class="styled-table">
      <thead>
          <tr>
              <th>De</th>
              <th>Para</th>
              <th>Quantia</th>
              <th>Status</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($ownedBills as $bill)
              <tr>
                  <td>{{ $bill->fromUser->name }}</td>
                  <td>{{ $bill->toUser->name }}</td>
                  <td>R$ {{ number_format($bill->amount, 2, ',', '.') }}</td>
                  <td>
                        @if($bill->status == 'pago')
                            <span class="status-paid">Pago</span>
                        @elseif($bill->status == 'expirado')
                            <span class="status-exp">Expirado</span>
                        @else
                            <span class="status-pending">Pendente</span>
                        @endif
                    </td>
              </tr>
          @endforeach
      </tbody>
  </table>
</div>