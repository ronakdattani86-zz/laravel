@extends('layouts.app')
@section('content')
<form class="form-horizontal" method="post" action="{{route('products.store')}}">
     {{ csrf_field() }}
<fieldset>

<!-- Product Form-->
<legend>Add Product</legend>

<!-- Product Name -->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Product Name</label>
  <div class="col-md-5">
      <input id="name" name="name" class="form-control input-md" placeholder="Product Name">
  </div>
</div>

<!-- Product Quantity -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Product Quantity</label>
  <div class="col-md-5">
      <input id="qty" name="qty" class="form-control input-md" placeholder="Product Quantity">
  </div>
</div>

<!-- Product Price-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Product Price">Product Price</label>  
  <div class="col-md-5">
       <input id="price" name="price" type="text" placeholder="Product Price" class="form-control input-md" required="">    
  </div>
</div>

<!-- Product Total -->
<div class="form-group">
  <label class="col-md-4 control-label" for="total">Total</label>  
  <div class="col-md-5">
      <input id="total" name="total" type="text" placeholder="Product Total" class="form-control input-md" required="" readonly="">    
  </div>
</div>

 <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
 </div>

</fieldset>
</form>




<table class="table">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Product Quantity</th>
        <th>Product Price</th>
        <th>Product Total</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      
      
      
      
      @foreach($datas as $data)
      <tr>
      <td>{{ $data->name}}</td>
      <td>{{ $data->quantity}}</td>
      <td>{{ $data->price}}</td>
      <td>{{ $data->quantity*$data->price }}</td>
      <td>{{ $data->created_at }}</td>      
    </tr>
@endforeach
      
    </tbody>
  </table>




@endsection
@push('scripts')
<script>
    var qty;
    var price;
    $('#qty,#price').keyup(function(){
        qty=$('#qty').val();
        price=$('#price').val();
        total=qty*price;
        if(total>0){
             $('#total').val(qty*price);
        }
        else{
             $('#total').val('');
        }
       
    });
</script>
@endpush