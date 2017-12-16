<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="/">Fantastic Shop</a>
		</div>

		@if(!Request::is('/'))
			<ul class="nav navbar-nav">
				<li class="active"><a href="/products">Products</a></li>
			</ul>
            <ul class="nav navbar-nav" style="float: right">
				<li><a href="{{ route('change.changeMoneyType', ['type' => 'EUR']) }}">EUR</a></li>
				<li><a href="{{ route('change.changeMoneyType', ['type' => 'BRL']) }}">BRL</a></li>
				<li><a href="{{ route('change.changeMoneyType', ['type' => 'USD']) }}">USD</a></li>
                <li><a href="/cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> My Cart
					<span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
					</a>
				</li>
            </ul>
		@endif
	</div>
</nav>