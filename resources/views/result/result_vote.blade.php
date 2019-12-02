@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('result.vote.title')
        <span style="font-size: 14px;">
         - @lang('result.vote.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('result.vote.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{  trans('result.vote.flop_name_label') }}: {{  $vote->flop_candidate->name }}
            <br/>
            {{  $vote->flop }}
        </div>
        <div class="field required">
            {{  trans('result.vote.top_name_label') }}: {{  $vote->top_candidate->name }}
            <br/>
            {{  $vote->top }}
        </div>
    </div>

    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
