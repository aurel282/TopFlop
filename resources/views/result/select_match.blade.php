@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('result.select_match.title')
        <span style="font-size: 14px;">
         - @lang('result.select_match.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('result.select_match.help')</div>
        </div>
    </h2>
    <br />

    {{ Form::open(['class' => 'ui form']) }}

    <div class="field required">
        {{ Form::label('match', trans('result.select_match.match_label')) }}
        {{ Form::select('match', $matches->pluck('opponent', 'id'), '',['class' => 'ui fluid normal dropdown']) }}
    </div>

    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
