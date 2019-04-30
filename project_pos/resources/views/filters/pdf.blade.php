  	<form method="post" action="{{ route('filters.print') }}">
  		@csrf
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Default Modal</h4>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-md-12">

	        		<!-- BASIC TABLE -->
	        		<div class="box">
	        			<div class="box-header with-border">
	        				<h3>Filter</h3>
	        			</div>
	        			<div class="box-body">
	        				<div class="form-group">
			                  	<label class="col-sm-3 control-label">Tahun</label>
			                  	<div class="col-sm-7">
				                    <select class="form-control select2" name="year" required>
				                    	@foreach(range(2015, date('Y')) as $row)
					                    	<option value="{{$row}}" {{($row==date('Y')) ? 'selected': ''}}>{{ $row }}</option>
				                    	@endforeach
				                    </select>
			                  	</div>
			                </div>
			                <div class="form-group">
			                	<label class="col-sm-3 control-label">Bulan</label>
			                	<div class="col-sm-7">
			                		<select class="select2 form-control" name="month" required>
			                			@for($i=1; $i <= 12; $i++)
			                			<option value="{{$i}}" {{($i==date('n')) ? 'selected': ''}}>{{ date('F', strtotime(date('Y').'-'.$i.'-01')) }}</option>
			                			@endfor
			                		</select>
			                	</div>
			                </div>
			                <div class="form-group">
			                  	<label class="col-sm-3 control-label">Cashier</label>
			                  	<div class="col-sm-7">
				                    <select class="form-control select2" name="user_id" required>
				                    		<option value="0">All Cashier</option>
				                    	@foreach($users as $cashier)
					                    	<option value="{{$cashier->id}}">{{ $cashier->name }}</option>
				                    	@endforeach
				                    </select>
			                  	</div>
			                </div>
	        			</div>
	        		</div>
	        		<!-- END BASIC TABLE -->

	        	</div>
	        </div>
	      </div>
	
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
	        <button class="btn btn-primary">Download PDF</button>
	      </div>
	    </div>
	    <!-- /.modal-content -->
  	</form>