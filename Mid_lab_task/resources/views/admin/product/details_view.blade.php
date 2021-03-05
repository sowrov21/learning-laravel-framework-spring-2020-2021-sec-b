@extends('admin.master')
@section('content')
    
            <h1>Product Details</h1>
               <!-- <a href="#"> Back</a>-->

    
			<table>

				<tr>
					<td>Product Name: </td>
					<td>{{$product['product_name']}}</td>
				</tr>
				<tr>
					<td>Category</td>
					<td>{{ $product['category']}}</td>
				</tr>
				<tr>
					<td>Unit Price:</td>
					<td>{{ $product['unit_price']}}</td>
				</tr>
                <tr>
					<td>Status</td>
					<td>{{ $product['status'] }}</td>
				</tr>
				<tr>
					<td>Vendor id</td>
					<td>{{ $product['vendor_id'] }}</td>
				</tr>
			</table>

            @endsection