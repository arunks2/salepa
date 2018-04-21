<div class="modal fade" id="editSaleModal{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Create Product</h4>
      </div>
		{{ Form::open(['url'=>'/user/'.$sale->id.'/sale_edit','method'=>'post','id'=>'form']) }}
			<div class="widget-content pad20f">
				<div class="sales_information">
					<label>Sale Name</label>
					<input type="text" class="input-text" placeholder="Sales Name" name="name" placeholder="e.g Arun`s Yard sale" value="{{$sale->name}}" />
					<label>Sales Description</label>
					<textarea class="textarea" rows="3" name="description" placeholder="What are you selling?">{{$sale->description}}</textarea>
					<div class="row">
						<div class="col-md-6">
							<label>Start Date</label>
							<input type="text" id="starts_on" name="starts_on" class="input-text" value="{{$sale->starts_on->format('Y-m-d')}}" required>
						</div>
						<div class="col-md-6">
							<label>End Date(Optional)</label>	
							<input type="text" class="input-text" id="ends_on" name="ends_on" value="
								@if($sale->ends_on->format('Y')=='-0001')
							{{$sale->ends_on->format('Y m d')}}
							@endif
							">
						</div>
					</div>
					<label>Private
					<input type="radio" id="radio-1" value="1" name="is_private"><label for="radio-1">Yes</label>
					<input type="radio" id="radio-2" value="0" name="is_private"><label for="radio-2">NO</label>
				</div>	

				<h4>Public Visible Contact info:</h4>
				<div class="sales_information">
					<label>Pick Up area</label>
					<input type="text" class="input-text"  name="address" value="{{$sale->address}}" />
					<label>Contact Number</label>
					<input type="text" class="input-text" value="{{$sale->contact_info}}" name="contact_info"  />
				</div>

				<h4>Private Contact info:</h4>
				<div class="sales_information">			
					<label>Pick Up area</label>
					<input type="text" class="input-text" value="{{$sale->pvt_address}}" name="pvt_address" />
					<label>Contact Number</label>
					<input type="text" class="input-text"  name="pvt_contact_info" value="{{$sale->pvt_contact_info}}" />
				</div>
                <span class="custom-input">   
                	<button type="submit">Save</button>
                </span>
			
		</div> <!-- /widget-content -->
		{{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Delete Edit Modal -->
<div class="modal fade" id="deleteSaleModal{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Delete Sale</h4>
      </div>
      <div class="modal-body">
       Are You Sure?
      </div>
      <div class="modal-footer">
             <button type="button" class="btn btn-light-grey" data-dismiss="modal">Cancel</button>
             <a href="/user/{{$sale->id}}/delete"><button type="button" class="btn">Delete</button>
             </a>
           </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /Product modal -->