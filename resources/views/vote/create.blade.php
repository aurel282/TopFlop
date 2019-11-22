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
            {{ Form::label('voter', trans('vote.create.name_label')) }}
            {{ Form::select('voter', $voters, '',['class' => 'ui fluid normal dropdown']) }}
        </div>
        <div class="field required">
            {{ Form::label('match', trans('vote.create.name_label')) }}
            {{ Form::select('match', $matches, '',['class' => 'ui fluid normal dropdown']) }}
        </div>
    </div>
    <br />
    <div class="two fields">
        <div class="field required">
            <label>@lang('vote.create.top_labed')</label>
            <div class="ui fluid search selection dropdown">
                <input type="hidden" name="top_candidate">
                <i class="dropdown icon"></i>
                <div class="default text">@lang('vote.create.top_select_placeholder')</div>
                <div class="menu">
                    @foreach($candidates as $candidate)
                        <div class="item" data-value="{{$candidate->id}}">{{$candidate->name}}</div>
                    @endforeach
                </div>
            </div>
            {{ Form::textarea('top_text', null, ['placeholder' => trans('vote.create.top_text_placeholder')]) }}
        </div>
        <div class="field required">
            <label>@lang('vote.create.flop_labed')</label>
            <div class="ui fluid search selection dropdown">
                <input type="hidden" name="flop_candidate">
                <i class="dropdown icon"></i>
                <div class="default text">@lang('vote.create.flop_select_placeholder')</div>
                <div class="menu">
                    @foreach($candidates as $candidate)
                        <div class="item" data-value="{{$candidate->id}}">{{$candidate->name}}</div>
                    @endforeach
                </div>
            </div>
            {{ Form::textarea('flop_text', null, ['placeholder' => trans('vote.create.flop_text_placeholder')]) }}
        </div>
    </div>


    @parent

    {{ Form::close() }}

@endsection

@section('javascript_layout')
    @parent
@endsection
