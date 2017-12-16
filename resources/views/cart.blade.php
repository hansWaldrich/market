<?php /**
 * Created by PhpStorm.
 * User: Hans Waldrich
 * Date: 15/12/2017
 * Time: 21:55
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container" style="display: inline">
        <div class="jumbotron text-center">
            <h2>My Shopping Cart</h2>
        </div>
    </div>
    <div class="container">
        <div class="well col-md-12">
            @if(Session::has('cart'))
                <ul class="list-group" style="display: inline-flex; width: 100%;">
                    <li class="list-group-item" style="width: 60%; text-align: center">Product
                    </li>
                    <li class="list-group-item" style="width: 15%; text-align: center">Price
                    </li>
                    <li class="list-group-item" style="width: 15%; text-align: center">Quantity
                    </li>
                    <li class="list-group-item" style="width: 10%; text-align: center">Action
                    </li>
                </ul>
                @foreach($products as $product)
                    <ul class="list-group" style="display: inline-flex; width: 100%;">
                        <li class="list-group-item" style="width: 60%;">
                            <b><h5>{{$product['item']['name']}}</h5></b>
                        </li>
                        <li class="list-group-item" style="width: 15%; text-align: center"><b><h5>
                                    @if(Session::has('monetary'))
                                        {{Session::get('monetary')}}
                                    @else
                                       &euro;
                                    @endif
                                    @if(Session::has('rate'))
				                        <?php
				                            $product['price'] = number_format(($product['price'] * Session::get('rate')), 2);
				                        ?>
                                    @else
				                        <?php
				                            $product['price'] = number_format($product['price'], 2);
				                        ?>
                                    @endif
                                    {{$product['price']}}
                        </h5></b></li>
                        <li class="list-group-item" style="width: 15%; text-align: center"><b><h5>{{$product['qty']}}</h5></b></li>
                        <li class="list-group-item" style="width: 10%; text-align: center">
                            <a href="{{ route('product.removeItem', ['id' => $product['item']['id']]) }}" class="btn btn-flat btn-danger" type="button">X</a>
                        </li>
                    </ul>
                @endforeach
                <ul class="list-group">
                    <li class="list-group-item"><b><h4>
                                Total :
                                @if(Session::has('monetary'))
                                    {{Session::get('monetary')}}
                                @else
                                    &euro;
                                @endif
                                @if(Session::has('rate'))
                                    <?php
                                        $totalPrice = number_format(($totalPrice * Session::get('rate')), 2);
                                    ?>
                                @else
				                    <?php
				                        $totalPrice = number_format($totalPrice, 2);
				                    ?>
                                @endif
                                {{$totalPrice}}
                            </h4></b></li>
                </ul>
            @else
                <ul class="list-group">
                    <li class="list-group-item"><b>No items found!</b></li>
                </ul>
            @endif
        </div>
        <div class="form-group" style="float: right">
            @if(Session::has('cart'))
                <a href="{{ route('mail.send') }}" class="btn btn-lg btn-success" type="button">Buy</a>
            @else
                <a href="#" class="btn btn-lg btn-success" type="button" disabled="disabled">Cart Empty...</a>
            @endif
        </div>
    </div>
@endsection
