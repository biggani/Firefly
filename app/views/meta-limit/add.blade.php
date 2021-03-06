<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Set {{OBJ}} limit for
            {{{$object->name}}} in month {{$date->format('F Y')}}</h4>
      </div>
        {{Form::open(['class' => 'form-horizontal','role' => 'form'])}}
      <div class="modal-body">
        <p>
        By adding a limit to a {{OBJ}} you trigger an alert when it's amount is reached this month.
        </p>
        <div class="form-group">
            <label for="inputAmount" class="col-sm-3
            control-label">Amount</label>
            <div class="col-sm-9">
            <div class="input-group">
                <span class="input-group-addon">&euro;</span>
            <input type="number" step="any" name="amount" class="form-control" id="inputAmount">
                </div>
            </div>
        </div>
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Set new limit</button>
      </div>
        {{Form::close()}}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->