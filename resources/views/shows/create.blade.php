@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('partials.errors')

                    {!! Form::open(['route' => 'show.store']) !!}

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="form-group venue">
                                    {{ Form::label('venue', 'Venue') }}
                                    {{ Form::text('venue', null, ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group address">
                                    {{ Form::label('address', 'Address') }}
                                    {{ Form::text('address', null, ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="form-group date">
                                    {{ Form::label('date', 'Date') }}
                                    {{ Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group time">
                                    {{ Form::label('time', 'Time') }}
                                    {{ Form::time('time', Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control', 'required']) }}
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group submit">
                                    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection