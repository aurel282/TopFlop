@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('voter.create.title')
        <span style="font-size: 14px;">
         - @lang('voter.create.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('voter.create.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('name', trans('voter.create.name_label')) }}
            {{ Form::text('name', null, ['placeholder' => trans('voter.create.name')]) }}
        </div>
        <div class="field">
            {{ Form::label('firstname', trans('voter.create.firstname_label')) }}
            {{ Form::text('firstname', '', ['placeholder' => trans('voter.create.firstname')]) }}
        </div>
    </div>

    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
