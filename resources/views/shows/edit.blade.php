@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Edit Show</div>
    <div class="panel-body">
        @include('partials.errors')

        {!! Form::model($show, ['route' => ['show.update', $show], 'method' => 'put']) !!}

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
                        {{ Form::date('date', Carbon\Carbon::parse($show->date)->format('Y-m-d'), ['class' => 'form-control', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group time">
                        {{ Form::label('time', 'Time') }}
                        {{ Form::time('time', Carbon\Carbon::parse($show->date)->format('H:i'), ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group enabled">
                        {{ Form::label('enabled', 'Enabled') }}
                        {{ Form::checkbox('enabled') }}
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group submit">
                        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            </div>
        {!! Form::close() !!}

        {{ Form::open(['method' => 'DELETE', 'route' => ['show.destroy', $show->id]]) }}
            <div class="row float-right">
                <div class="col-sm-12">
                    <div class="form-group delete negative-margin">
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>

@endsection