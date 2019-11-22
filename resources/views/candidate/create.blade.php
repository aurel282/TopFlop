@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('candidate.create.title')
        <span style="font-size: 14px;">
         - @lang('candidate.create.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('candidate.create.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('name', trans('candidate.create.name_label')) }}
            {{ Form::text('name', null, ['placeholder' => trans('candidate.create.name')]) }}
        </div>
    </div>

    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
