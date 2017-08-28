@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">List of shows</div>
          <div class="col-md-6 text-right">
            <a href="{{ route('show.create') }}" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add show</a>
          </div>
        </div>
    </div>
    <div class="panel-body">
      @if (empty($shows))
        <p>No shows yet.</p>
      @else
        <table class="table">
          <thead>
            <tr>
              <th>Venue</th>
              <th>Address</th>
              <th>Date</th>
              <th>Enabled</th>
              <th>Created at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($shows->items() as $show)
              <tr>
                <td>{{ $show->venue }}</td>
                <td>{{ $show->address }}</td>
                <td>{{ $show->date }}</td>
                <td><i class="glyphicon {{ $show->enabled ? 'glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></i></td>
                <td>{{ $show->created_at }}</td>
                <td><a href="{{ route('show.edit', $show) }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>
</div>

@endsection