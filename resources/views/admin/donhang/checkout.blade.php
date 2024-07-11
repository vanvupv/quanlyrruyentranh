@extends('admin.main')
@section('content')
    @if(Session::has('message'))
        <div class="alert alert-primary" role="alert">
           {{session('message')}}
        </div>
    @endif

    <div>
        DDaay la trang kiem tra don hang

    </div>
    <form action="{{route('order.store')}}" method="POST">
        @csrf
    <div>
        <table class="table box table-bordered" id="sc_showTotal">
            <tbody>
            @foreach($data as $item)
{{--                @dd($item)--}}
                <tr class="sc_showTotal">
                    <th>SubTotal</th>
                    <td style="text-align: right" id="subtotal">
                        {{$item->name}}
                    </td> <td style="text-align: right" id="subtotal">
                        {{$item->price}}
                    </td> <td style="text-align: right" id="subtotal">
                        {{$item->total}}
                    </td> <td style="text-align: right" id="subtotal">
                        {{$item->qty}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        <div>
            {{$paymentMethodData}}
        </div>
        <div>
            {{$shippingMethodData}}
        </div>
        <div>
            {{$shippingAddress['first_name']}}
            {{$shippingAddress['last_name']}}
            {{$shippingAddress['email']}}
            {{$shippingAddress['country']}}
            {{$shippingAddress['address']}}
            {{$shippingAddress['phone']}}
            {{$shippingAddress['comment']}}
        </div>
        <div>
            {{ $dataSubTotal }}
        </div>
        <div>
            {{ $dataTax }}
        </div>
        <div>
            {{ $dataTotal }}
        </div>
        <input type="submit" value="Xac Nhan" class="btn btn-warning">
    </form>
@endsection

