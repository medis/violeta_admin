@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Edit radio</div>
    <div class="panel-body">
        @include('partials.errors')

        {!! Form::model($radio, ['route' => ['radio.update', $radio], 'method' => 'put']) !!}

            <div class="row">

                <div class="col-sm-12">
                    <div class="form-group title">
                        {{ Form::label('title', 'Title') }}
                        {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group source">
                        {{ Form::label('link', 'Link') }}
                        {{ Form::url('link', $radio->link, ['class' => 'form-control', 'required']) }}
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

        {{ Form::open(['method' => 'DELETE', 'route' => ['radio.destroy', $radio->id]]) }}
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