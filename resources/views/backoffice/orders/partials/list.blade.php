<div class="body" >
                   
    <div class="table-responsive">
       
        
        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Shipping address</th>
                    <th>total price</th>
                    <th>CreatedAt</th>
                    <th>Action</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Client</th>
                    <th>Shipping address</th>
                    <th>total price</th>
                    <th>CreatedAt</th>
                    <th>Action</th>
                    <th>Details</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->shipping_address }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td width="90px">
                            <a title="delete" type="button"
                                onclick="deleteOrder({{ $order->id }})"
                                class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
                            </a>

                            <a href="{{ route('orders.edit', ['order' => $order->id]) }}"
                                title="edit" type="button"
                                class="btn btn-warning btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">edit</i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('orders.show', ['order' => $order->id]) }}" >Details</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>