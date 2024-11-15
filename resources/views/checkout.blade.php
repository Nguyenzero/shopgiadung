
@foreach($products as $key => $product)
    @php
        $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
        $priceEnd = $price * $carts[$product->id];
        $total += $priceEnd;
    @endphp
    <tr class="table_row">
        <td class="column-1">
            <div class="how-itemcart1">
                <img src="{{ $product->thumb }}" alt="IMG">
            </div>
        </td>
        <td class="column-2">{{ $product->name }}</td>
        <td class="column-3">{{ number_format($price, 0, '', '.') }}</td>
        <td class="column-4">
            <div class="wrap-num-product flex-w m-l-auto m-r-0">
                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                    <i class="fs-16 zmdi zmdi-minus"></i>
                </div>

                <input class="mtext-104 cl3 txt-center num-product" type="number"
                       name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">

                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                    <i class="fs-16 zmdi zmdi-plus"></i>
                </div>
            </div>
        </td>
        <td class="column-5">{{ number_format($priceEnd, 0, '', '.') }}</td>
        <td class="p-r-15">
            <a href="/carts/delete/{{ $product->id }}">Xóa</a>
        </td>
    </tr>
@endforeach