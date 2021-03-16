@extends('admin.master')
@section('content')
    
            <h1>Product Details</h1>
               <!-- <a href="#"> Back</a>-->

    
			<table>

				<tr>
					<td>Product Name: </td>
					<td>{{$product->product_name}}</td>
				</tr>
				<tr>
					<td>Category</td>
					<td>{{ $product->category}}</td>
				</tr>
				<tr>
					<td>Unit Price:</td>
					<td>{{ $product->unit_price}}</td>
				</tr>
                <tr>
					<td>Status</td>
					<td>
						
						@if ($product->status =='upcoming' )
						
							<span class="badge bg-red">{{ $product->status }} </span>
						
						@else
						
							<span class="badge bg-green"> {{ $product->status }}</span>
						
							
						@endif
						
					
					
					</td>
				</tr>
				<tr>
					<td>Vendor Name</td>
				
					

					<td>
						@foreach ($vendors as $vendor)

						@if ($vendor->id==$product->vendor_id)
                    
						{{ $vendor->vendor_name }}
							
						@endif

						@endforeach
					
					</td>
				
					{{--<td>{{ $product['vendor_id'] }}</td>--}}
				</tr>
			</table>

            @endsection