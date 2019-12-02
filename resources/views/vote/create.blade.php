@extends('layout.template-form')

@section('adminHeader')
    <h2 class="ui dividing header">@lang('vote.create.title')
        <span style="font-size: 14px;">
         - @lang('vote.create.subtitle')
        </span>
    </h2>
@endsection

@section('containerContent')
    <h2 class="ui header dividing" style="background: #e8ecf1; padding: 10px;">
        <div class="content">
            <div class="sub header">@lang('vote.create.help')</div>
        </div>
    </h2>
    <br />
    {{ Form::open(['class' => 'ui form']) }}

    <div class="two fields">
        <div class="field required">
            {{ Form::label('voter', trans('vote.create.voter_label')) }}
            {{ Form::select('voter', $voters->pluck('name', 'id'), '',['class' => 'ui fluid normal dropdown']) }}
        </div>
        <div class="field required">
            {{ Form::label('match', trans('vote.create.match_label')) }}
            {{ Form::select('match', $matches->pluck('opponent', 'id'), '',['class' => 'ui fluid normal dropdown']) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="field required">
            {{ Form::label('top_candidate', trans('vote.create.top_label')) }}
            {{ Form::select('top_candidate', $candidates->pluck('name', 'id'), '',['class' => 'ui fluid normal dropdown']) }}
            {{ Form::textarea('top_text', null, ['placeholder' => trans('vote.create.top_text_placeholder')]) }}
        </div>
        <div class="field required">
            {{ Form::label('flop_candidate', trans('vote.create.flop_label')) }}
            {{ Form::select('flop_candidate', $candidates->pluck('name', 'id'), '',['class' => 'ui fluid normal dropdown']) }}
            {{ Form::textarea('flop_text', null, ['placeholder' => trans('vote.create.flop_text_placeholder')]) }}
        </div>
    </div>


    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
