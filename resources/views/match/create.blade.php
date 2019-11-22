@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('match.create.title')
        <span style="font-size: 14px;">
         - @lang('match.create.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('match.create.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('opponent', trans('match.create.opponent_label')) }}
            {{ Form::text('opponent', null, ['placeholder' => trans('match.create.opponent')]) }}
        </div>
        <div class="field required">
            {{ Form::label('date', trans('match.create.date_label')) }}
            {{ Form::date('date', null, ['placeholder' => trans('match.create.date')]) }}
        </div>
    </div>

    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
