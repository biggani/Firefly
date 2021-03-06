@extends('layouts.default')
@section('breadcrumbs', Breadcrumbs::render('edittransaction',$transaction))
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3>
            Edit transaction "{{{$transaction->description}}}"
        </h3>
    </div>
</div>

{{Form::open(['class' => 'form-horizontal'])}}
<div class="row">

    <div class="col-lg-6 col-md-6">
        <h4>Mandatory fields</h4>

        <!-- description -->
        <div class="form-group
             @if($errors->has('description'))
             has-error
             @endif
             ">
            <label for="inputDescription" class="col-sm-3 control-label">Description</label>
            <div class="col-sm-9">
                <input type="text" name="description" class="form-control"
                       value="{{{Input::old('description') ? Input::old
                       ('description') : $transaction->description}}}"
                       id="inputDescription"
                       placeholder="{{{$transaction->description}}}">
                @if($errors->has('description'))
                <span class="text-danger">{{$errors->first('description')}}</span>
                @endif
            </div>
        </div>

        <!-- Amount -->
        <div class="form-group
             @if($errors->has('amount'))
             has-error
             @endif
             ">
            <label for="inputAmount" class="col-sm-3 control-label">Amount</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon">&euro;</span>
                    <input type="number" value="{{Input::old('amount') ? Input::old('amount') : $transaction->amount}}" name="amount" step="any" class="form-control" id="inputAmount">
                </div>
                @if($errors->has('amount'))
                <span class="text-danger">{{$errors->first('amount')}}</span>
                @endif
            </div>
        </div>

        <!-- Date -->
        <div class="form-group
             @if($errors->has('date'))
             has-error
             @endif
             ">
            <label for="inputDate" class="col-sm-3 control-label">Date</label>
            <div class="col-sm-9">
                <input type="date" name="date" value="{{Input::old('date') ? Input::old('date') : $transaction->date->format('Y-m-d')}}"  class="form-control" id="inputDate">
                @if($errors->has('date'))
                <span class="text-danger">{{$errors->first('date')}}</span>
                @endif
            </div>
        </div>

        <!-- accounts -->
        <div class="form-group
             @if($errors->has('account_id'))
             has-error
             @endif
             ">
            <label for="inputAccount" class="col-sm-3 control-label">Account</label>
            <div class="col-sm-9">
                {{Form::select('account_id',$accounts,Input::old('account_id') ? Input::old('account_id') :$transaction->account_id,['class' => 'form-control'])}}
                @if($errors->has('date'))
                <span class="text-danger">{{$errors->first('account_id')}}</span>
                @endif
            </div>
        </div>


    </div>
    <div class="col-lg-6 col-md-6">
        <h4>Optional fields</h4>

        <!-- beneficiary (can be created) --> 
        <div class="form-group">
            <label for="inputBeneficiary" class="col-sm-3 control-label">Beneficiary</label>
            <div class="col-sm-9">
                <input type="text" value="{{{Input::old('beneficiary') ?
                Input::old('beneficiary') : $transaction->beneficiary ?
                $transaction->beneficiary->name : ''}}}" name="beneficiary" class="form-control" id="inputBeneficiary" autocomplete="off" />
            </div>
        </div>
        
        <!-- categorys (can be created) --> 
        <div class="form-group">
            <label for="inputCategory" class="col-sm-3 control-label">Category</label>
            <div class="col-sm-9">
                <input type="text" value="{{{Input::old('category') ?
                Input::old('category') : $transaction->category ?
                $transaction->category->name : ''}}}" name="category" class="form-control" id="inputCategory" autocomplete="off" />
            </div>
        </div>

        <!-- budget (can be created) --> 
        <div class="form-group">
            <label for="inputBudget" class="col-sm-3 control-label">Budget</label>
            <div class="col-sm-9">
                <input type="text" value="{{{Input::old('budget') ?
                Input::old('budget') : $transaction->budget ?
                $transaction->budget->name : ''}}}" name="budget" class="form-control" id="inputBudget" autocomplete="off" />
            </div>
        </div>

        <!-- ignore in transactions (default is zero) -->
        <div class="form-group">
            <label for="inputIgnore" class="col-sm-3 control-label">Ignore</label>
            <div class="col-sm-9">
                <div class="checkbox">
                    <label>
                <input type="checkbox" name="ignore" value="1"
                       @if($transaction->ignore == 1)
                       checked="checked"
                       @endif
                       > Ignores this transaction in predictions
                        .</label></div>
            </div>
        </div>
        
        <!-- mark in charts -->
        <div class="form-group">
            <label for="inputMark" class="col-sm-3 control-label">Mark</label>
            <div class="col-sm-9">
                <div class="checkbox">
                    <label>
                <input type="checkbox" name="mark" value="1"
                       @if($transaction->mark == 1)
                       checked="checked"
                       @endif
                       > Marks this transaction in certain charts.
                        </label></div>
            </div>
        </div>
        



    </div>

</div>


<div class="row">
    <div class="col-lg-12 col-lg-offset-0" style="margin-top:20px;">
        <input type="submit" name="submit" value="Save edits to transaction" class="btn btn-default btn-info btn-lg" />
    </div>
</div>

{{Form::close()}}   
@stop
@section('scripts')
<script src="js/typeahead.min.js"></script>
<script src="js/transactions.js"></script>
@stop
@section('styles')
<link href="css/typeahead.js-bootstrap.css" rel="stylesheet" media="screen">
<link href="css/transactions.css" rel="stylesheet" media="screen">
@stop