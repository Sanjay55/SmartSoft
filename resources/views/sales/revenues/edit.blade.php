@extends('layouts.admin')

@section('title', trans('general.title.edit', ['type' => trans_choice('general.payments', 1)]))

@section('content')
<!-- Default box -->
<div class="box box-success">
    {!! Form::model($payment, [
        'method' => 'PATCH',
        'files' => true,
        'url' => ['payments', $payment->id],
        'role' => 'form'
    ]) !!}

    <div class="box-body">
            {{ Form::textGroup('sales_id', 'Sales Invoice ID', 'credit-card', ['required' => 'required', 'autofocus' => 'autofocus']) }}

             {{ Form::textGroup('payment_date', 'Payment Date','calendar', array('id' => 'payment_date', 'class' => ' form-control datepicker', 'required' => 'required' , 'data-inputmask' => '\'alias\': \'yyyy/mm/dd\'', 'data-mask' => '')) }}

            {{ Form::selectGroup('payment_mode', trans('general.payment_mode'), 'credit-card', $payment_mode) }}

            {{ Form::textGroup('paid_amount', trans('general.amount'), 'money', ['required' => 'required', 'autofocus' => 'autofocus']) }}

            {{ Form::textareaGroup('payment_terms', trans('general.payment_terms')) }}

            {{ Form::selectGroup('vendor_account_id', trans_choice('general.vendors', 1), 'credit-card', $vendor_accounts) }}

            {{ Form::selectGroup('company_account_id', trans_choice('general.company', 1), 'folder-open-o', $company_accounts) }}

            {{ Form::selectGroup('payment_type', trans_choice('general.payment_types', 1), 'credit-card', $payment_type) }}

            {{ Form::textGroup('payment_reference', trans('general.reference'), 'file-text-o',[]) }}

            {{ Form::textGroup('payment_notes', trans('general.payment_notes'), 'file-text-o',[]) }}
        </div>
    <!-- /.box-body -->

    <div class="box-footer">
        {{ Form::saveButtons('/payments') }}
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}

</div>
@endsection


@section('js')
    <script src="{{ asset('js/bootstrap-fancyfile.js') }}"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('dist/css/select2.min.css') }}">
    <script src="{{ asset('dist/js/select2.full.min.js') }}"></script>

    <!-- datepicker -->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".datepicker" ).datepicker({
        changeMonth: true,
      changeYear: true,
      dateFormat: 'dd-mm-yy',
      autoclose: true
    });
  });
  </script>

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-fancyfile.css') }}">
    <!-- datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@endsection


