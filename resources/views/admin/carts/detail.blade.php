@extends('admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
            <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
            <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
            <li>Email: <strong>{{ $customer->email }}</strong></li>
            <li>Ghi chú: <strong>{{ $customer->content }}</strong></li>
            <li>Tình trạng đơn hàng: <strong>{{$customer->status}}</strong></li>
        </ul>
       
    </div>

    <div class="carts">
        @php $total = 0; @endphp
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">IMG</th>
                <th class="column-2">Product</th>
                <th class="column-3">status</th>
                <th class="column-4">Price</th>
                <th class="column-5">Quantity</th>
                <th class="column-6">Total</th>
            </tr>

            @foreach($carts as $key => $cart)
                @php
                    $price = $cart->price * $cart->pty;
                    $total += $price;
                @endphp
                <tr>
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px">
                        </div>
                    </td>
                    <td class="column-2">{{ $cart->product->name }}</td>
                    <td class="column-3">{{ $customer->status }}</td>
                    <td class="column-4">{{ number_format($cart->price, 0, '', '.') }}</td>
                    <td class="column-5">{{ $cart->pty }}</td>
                    <td class="column-6">{{ number_format($price, 0, '', '.') }}</td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="4" class="text-right">Tổng Tiền</td>
                    <td>{{ number_format($total, 0, '', '.') }}</td>
                </tr>
            </tbody>
            
        </table>
        <form action="{{ route('admin.carts.update', $customer->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Tình trạng đơn hàng</label>
                <select name="status" id="status" class="form-control">
                    <option value="Chờ xác nhận" {{ $customer->status == 'Chờ xác nhận' ? 'selected' : '' }}>Chờ xác nhận</option>
                    <option value="Đang xử lý" {{ $customer->status == 'Đang xử lý' ? 'selected' : '' }}>Đang xử lý</option>
                    <option value="Đã giao cho đơn vị vận chuyển" {{ $customer->status == 'Đã giao cho đơn vị vận chuyển' ? 'selected' : '' }}>Đã giao cho đơn vị vận chuyển</option>
                    <option value="Đang giao" {{ $customer->status == 'Đang giao' ? 'selected' : '' }}>Đang giao</option>
                    <option value="Giao hàng thành công" {{ $customer->status == 'Giao hàng thành công' ? 'selected' : '' }}>Giao hàng thành công</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Cập nhật đơn hàng</button>
        </form>
    </div>
@endsection


