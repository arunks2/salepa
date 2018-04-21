<?php
function getCostPrice(App\Product $product, App\User $user)
{
	$currency = App\Currency::find($user->currency_id);
	$cost_price =round(($product->cost_price)/($currency->conversion_rate),2);
	$cost_price = $currency->short_symbol.$cost_price;
	return $cost_price;
}

function getSellPrice(App\Product $product, App\User $user)
{
	$currency = App\Currency::find($user->currency_id);
	$sale_price =round(($product->sale_price)/($currency->conversion_rate),2);
	$sale_price = $currency->short_symbol.$sale_price;
	return $sale_price;
}

function allCurrencies()
{
	return App\Currency::all();
}

function conversationProduct(App\Product $product)
{
	$conversation = App\Conversation::where([
    ['product_id', '=', $product->id],
    ['created_by', '=', Auth::User()->id],
])->get();

	return $conversation;
}





?>