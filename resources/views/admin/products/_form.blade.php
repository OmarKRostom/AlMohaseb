<div class="form-group">
	{!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
	{!! Form::input('text', 'title', $product->title, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('buyingPrice', 'Buying Price', ['class' => 'control-label']) !!}
	{!! Form::input('number', 'buyingPrice', $product->buyingPrice, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('sellingPrice', 'Selling Price', ['class' => 'control-label']) !!}
	{!! Form::input('number', 'sellingPrice', $product->sellingPrice, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}
	{!! Form::select('category_id', $categories, $product->category_id, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('available_in_stock', 'Availble In Stock', ['class' => 'control-label']) !!}
	{!! Form::input('number', 'available_in_stock', $product->available_in_stock, ['class' => 'form-control']) !!}
</div>
