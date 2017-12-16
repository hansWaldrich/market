<?php /**
 * User: Hans Waldrich
 */
$monetaryChoice = '&';
$productCart;
?>

@extends('layouts.app')

@section('content')

    <div class="container" style="display: inline">
        <div class="jumbotron text-center">
            <h2>Products</h2>
        </div>

        <div class="container-fluid">

            <div class="row">
                @if(count($products) > 0)
                    <div class="col-md-9 col-sm-9 col-md-offset-1 col-sm-offset-1" style="display: inline-block">
                        @foreach($products as $product)
                                <div class="well col-md-5 col-sm-5 col-md-offset-1 col-sm-offset-1">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <img src="notFound.png" width="100%" height="40%">
                                        </li>
                                        <li class="list-group-item">Name : {{$product->name}}</li>
                                        <li class="list-group-item">Description : {{$product->description}}</li>
                                        <li class="list-group-item">
                                            @if(Session::has('monetary'))
                                                Price : {{Session::get('monetary')}}
                                            @else
                                                Price : &euro;
                                            @endif
                                            @if(Session::has('rate'))
		                                            <?php
		                                                $product->value = number_format(($product->value * floatval(Session::get('rate'))), 2);
		                                            ?>
                                            @else
		                                            <?php
		                                                $product->value = number_format($product->value, 2);
		                                            ?>
                                            @endif
                                            {{$product->value}}
                                        </li>
                                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" type="button" class="btn btn-primary" style="float: right; margin-top: 10px;">Add to Cart</a>

                                    </ul>
                                </div>

                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
