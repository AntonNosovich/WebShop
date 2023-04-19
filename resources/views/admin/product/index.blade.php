@extends('admin.layouts.main')
@section('content')
<main class="main js-main">
    <h1 class="user-info">Product Management</h1>
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">@if($route=='show') {{$products[0]->id}} {{$products[0]->name}} @else  Product @endif</button>
        <div id="myDropdown" class="dropdown-content">
            @foreach($productShow as $pr)
                @foreach($pr->items as $item)
                 <a   href={{route('item.show',$item)}} action='POST'> {{$pr->id}} {{$pr->name}}</a>
                @break
                @endforeach
                @endforeach
        </div>
        <a href="{{route('product.create')}}">
            <button   class="btn-add" >create product</button>
        </a>
        <a href="{{route('item.create')}}">
            <button   class="btn-add color" >create item</button>
        </a>
    </div>

    <table class="content-table">
        <thead>
        <tr>
            <th>№</th>
            <th>Name</th>
            <th>Price</th>
            <th>Sale</th>
            <th>Price with sale</th>
            <th>Article</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Rating</th>
            <th>Options for item</th>
            <th>Options for product</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            @php $i=1 @endphp
            @foreach($products as $product)
                @foreach($product->items as $item)
                 <th>{{$i++}}</th>
                    <th>{{$product->name}}</th>
                 <th>{{$product->price}}$</th>

                        <th>{{$item->sale}}%</th>
                 <th>{{$item->sale_price}}$</th>
                 <th>{{$item->article}}</th>
                 <th>{{$item->size}}</th>
                 <th>{{$item->quantity}}</th>
                 <th>{{$item->raiting}}</th>
                    <th>
                        <details>
                            <summary></summary>
                            <summary><form action="{{ route( 'item.edit',$item['id'])}}" method="GET">
                                    @csrf
                                    <button class="content-table__btn-change">change</button>
                                </form></summary>
                            <summary><form action="{{ route('item.destroy',$item['id'])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="items__item-buttons__delite">Delete</button>
                                </form></summary>
                        </details>
                    </th>
                    <th>
                        <details>
                            <summary></summary>
                            <summary>
                                <form action="{{ route( 'product.edit',$product['id'])}}" method="GET">
                                    @csrf
                                    <button class="content-table__btn-change">change</button>
                                </form>
                            </summary>
                            <summary><form action="{{ route('product.destroy',$product['id'])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="items__item-buttons__delite">Delete</button>
                                </form>
                            </summary>
                        </details>
                    </th>
        </tr>
        @endforeach
        @endforeach

        </tbody>
    </table>
</main>
@endsection

