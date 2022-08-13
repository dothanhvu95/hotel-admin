@extends('Layout.main')
@section('content')
<!-- Main content -->
  	
<div class="col-lg-12">
  <section class="panel">
      <header class="panel-heading">
          Create Hotel
      </header>
      <div class="panel-body">
      	@if(session('success'))
      	<div class="alert alert-success ">
	          <button data-dismiss="alert" class="close close-sm" type="button">
	              <i class="fa fa-times"></i>
	          </button>
	          <strong>Well done!</strong>{{session('success')}}
	      </div>
	      @endif
          <form class="form-horizontal" enctype="multipart/form-data" role="form" action="/admin/hotel/create-hotel" method="post" >
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Hotel Name</label>
                  	<div class="col-lg-8">
                      	<input type="text" name='name' class="form-control" id="inputEmail1" placeholder="Name hotel">
                      	@if($errors->has('name') )
                      		<p class="help-block" style='color:red'>{{$errors->first("name")}}</p>
                      	@endif
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Price</label>
                  	<div class="col-lg-8">
                      	<input type="text" name='price' value="" class="form-control" id="formattedNumberField" placeholder="Price">
                      	@if($errors->has('price') )
                      		<p class="help-block" style='color:red'>{{$errors->first("price")}}</p>
                      	@endif
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Address hotel</label>
                  	<div class="col-lg-8">
                      	<input type="text" name='address' class="form-control" id="inputEmail1" placeholder="Address">
                      	@if($errors->has('address') )
                      		<p class="help-block" style='color:red'>{{$errors->first("address")}}</p>
                      	@endif
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Stock, Sqft</label>
                  	<div class="col-lg-2">
                      	<select class="form-control m-b-3" name="stock">
                              <option value="" >Choose Stock</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>	
                          </select>
                        @if($errors->has('stock') )
                      		<p class="help-block" style='color:red'>{{$errors->first("stock")}}</p>
                      	@endif
                  	</div>
                  	<div class="col-lg-2">
                      	<select class="form-control m-b-3" name="sqft">
                              <option value="" >Choose sqft</option>
                              <option value="10">10</option>
                              <option value="15">15</option>
                              <option value="20">20</option>
                              <option value="25">25</option>
                              <option value="30">30</option>	
                              <option value="35">35</option>	
                              <option value="40">40</option>	
                              <option value="45">45</option>	
                              <option value="50">50</option>	
                          </select>
                          
                      	 @if($errors->has('sqft') )
                      		<p class="help-block" style='color:red'>{{$errors->first("sqft")}}</p>
                      	@endif
                  	</div>
                  	
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">City,District,Ward.</label>
                  	<div class="col-lg-2">
                      	<select class="form-control m-b-3" name="city_id">
                              <option value="" >Choose City</option>
                              @if(count($cities) > 0)
                              	@foreach($cities as $k => $v)
                              		<option value="{{$k}}">{{$v}}</option>
                              	@endforeach
                              @endif
                          </select>
                          
                      	 @if($errors->has('city_id') )
                      		<p class="help-block" style='color:red'>{{$errors->first("city_id")}}</p>
                      	@endif
                  	</div>
                  	<div class="col-lg-2">
                      	<select class="form-control m-b-3" name="district_id">
                              <option value="">Choose District</option>
                              
                          </select>
                          
                      	 @if($errors->has('district_id') )
                      		<p class="help-block" style='color:red'>{{$errors->first("district_id")}}</p>
                      	@endif
                  	</div>
                  	<div class="col-lg-2">
                      	<select class="form-control m-b-3" name="ward_id">
                              <option value="">Choose Ward</option>
                             
                          </select>
                          
                      	 @if($errors->has('ward_id') )
                      		<p class="help-block" style='color:red'>{{$errors->first("ward_id")}}</p>
                      	@endif
                  	</div>
              	</div>

              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Extention</label>
                  	<div class="col-lg-8">
                      	<label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox1" value="2" name="is_recommand"> Recommended
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox2" value="2" name="is_popular"> Popular
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="2" name="is_trending"> Trending
	                    </label>
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Detail hotel</label>
                  	<div class="col-lg-8">
                      	<label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox1" value="2" name="four_bedrooms"> Four bedrooms
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox2" value="2" name="one_bedrooms"> One bedrooms
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="2" name="two_bedrooms"> Two bedrooms
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="2" name="is_hotel"> Is hotel
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="2" name="two_bathrooms"> Two Bathrooms
	                    </label>
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Service hotel</label>
                  	<div class="col-lg-8">
                      	<label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox1" value="2" name="have_swimming"> Have swimming Pool
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox2" value="2" name="have_wifi"> Have Wifi
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="2" name="have_restaurant"> Have Restaurant
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="2" name="have_parking"> Have Parking
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="2" name="have_meeting_room"> Have Meeting Room
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="2" name="have_elevator"> Have Elevator
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="2" name="have_fitness_center"> Have Fitness Center
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="2" name="have_open"> 24-hours Open
	                    </label>
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Pictures</label>
                  	<div class="col-lg-3">
                      	<input type="file" name='images[]' class="form-control" id="inputEmail1" multiple>
                      	@if($errors->has('images') )
                      		<p class="help-block" style='color:red'>{{$errors->first("images")}}</p>
                      	@endif
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  	<div class="col-lg-8">
                      	<textarea name='description' class="form-control" id="inputEmail1" placeholder="Description hotel">
                      	</textarea>
                      	 @if($errors->has('description') )
                      		<p class="help-block" style='color:red'>{{$errors->first("description")}}</p>
                      	@endif
                  	</div>
              	</div>
              	<input type="hidden" name="_token" value="{{ csrf_token() }}" class="form-control" />
              	<div class="form-group">
                  	<div class="col-lg-offset-2 col-lg-10">
                      	<button type="submit" id='overdue' class="btn btn-danger">Create</button>
                  	</div>
              	</div>
          	</form>
      	</div>
  	</section>
	</div>
	
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function () {
   	
    $("select[name='city_id']").change(function(){
        var city_id = $(this).val();
        
        $.ajax({
            url: "{{ url('/location/district/') }}"+'/'+city_id,
            method: 'GET',
            
            success: function(data) {
                $("select[name='district_id'").html('');
                $.each(data, function(key, value){
                    $("select[name='district_id']").append(
                      "<option value=" + value.code + ">" + value.name + "</option>"
                    );
                });
            }
        });
    }); 

    $("select[name='district_id']").change(function(){
        var district_id = $(this).val();
        
        $.ajax({
            url: "{{ url('/location/ward/') }}"+'/'+district_id,
            method: 'GET',
            
            success: function(data) {
                $("select[name='ward_id'").html('');
                $.each(data, function(key, value){
                    $("select[name='ward_id']").append(
                      "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                });
            }
        });
    });    
    
	});
</script>
@endsection
