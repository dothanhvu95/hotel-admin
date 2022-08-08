@extends('Layout.main')
@section('content')
<!-- Main content -->
  	
<div class="col-lg-12">
  <section class="panel">
      <header class="panel-heading">
          Horizontal Forms
      </header>
      <div class="panel-body">
          <form class="form-horizontal" role="form">
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Hotel Name</label>
                  	<div class="col-lg-8">
                      	<input type="text" name='name' class="form-control" id="inputEmail1" placeholder="Name hotel">
                      	<p class="help-block" style='color:red'>Example block-level help text here.</p>
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Price</label>
                  	<div class="col-lg-8">
                      	<input type="text" name='name' class="form-control" id="inputEmail1" placeholder="Name hotel">
                      	<p class="help-block" style='color:red'>Example block-level help text here.</p>
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Address hotel</label>
                  	<div class="col-lg-8">
                      	<input type="text" name='name' class="form-control" id="inputEmail1" placeholder="Name hotel">
                      	<p class="help-block" style='color:red'>Example block-level help text here.</p>
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">City,District,Ward.</label>
                  	<div class="col-lg-2">
                      	<select class="form-control m-b-3">
                              <option >Choose City</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                          </select>
                          
                      	<p class="help-block" style='color:red'>Example block-level help text here.</p>
                  	</div>
                  	<div class="col-lg-2">
                      	<select class="form-control m-b-3">
                              <option>Choose District</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                          </select>
                          
                      	<p class="help-block" style='color:red'>Example block-level help text here.</p>
                  	</div>
                  	<div class="col-lg-2">
                      	<select class="form-control m-b-3">
                              <option>Choose Ward</option>
                              <option>Option 2</option>
                              <option>Option 3</option>
                          </select>
                          
                      	<p class="help-block" style='color:red'>Example block-level help text here.</p>
                  	</div>
              	</div>

              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Extention</label>
                  	<div class="col-lg-8">
                      	<label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox1" value="option1"> Recommended
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox2" value="option2"> Popular
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="option3"> Trending
	                    </label>
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Detail hotel</label>
                  	<div class="col-lg-8">
                      	<label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox1" value="option1"> Four bedrooms
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox2" value="option2"> One bedrooms
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="option3"> Two bedrooms
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="option3"> Is hotel
	                    </label>
	                    
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Service hotel</label>
                  	<div class="col-lg-8">
                      	<label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox1" value="option1"> Have swimming Pool
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox2" value="option2"> Have Wifi
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="option3"> Have Restaurant
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="option3"> Have Parking
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="option3"> Have Meeting Room
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="option3"> Have Elevator
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="option3"> Have Fitness Center
	                    </label>
	                    <label class="checkbox-inline">
	                        <input type="checkbox" id="inlineCheckbox3" value="option3"> 24-hours Open
	                    </label>
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Pictures</label>
                  	<div class="col-lg-3">
                      	<input type="file" name='name' class="form-control" id="inputEmail1" placeholder="Name hotel">
                      	<p class="help-block" style='color:red'>Example block-level help text here.</p>
                  	</div>
              	</div>
              	<div class="form-group">
                  	<label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Description</label>
                  	<div class="col-lg-8">
                      	<textarea name='name' class="form-control" id="inputEmail1" placeholder="Description hotel">
                      	</textarea>
                      	<p class="help-block" style='color:red'>Example block-level help text here.</p>
                  	</div>
              	</div>
              	<div class="form-group">
                  	<div class="col-lg-offset-2 col-lg-10">
                      	<button type="submit" class="btn btn-danger">Create</button>
                  	</div>
              	</div>
          	</form>
      	</div>
  	</section>
	</div>
@endsection