@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">List of press</div>
          <div class="col-md-6 text-right">
            <a href="{{ route('blog.create') }}" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add press</a>
          </div>
        </div>
    </div>
    <div class="panel-body">
      @if (empty($blogs))
        <p>No blogs yet.</p>
      @else
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Source</th>
              <th>Link</th>
              <th>Date</th>
              <th>Enabled</th>
              <th>Created at</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($blogs->items() as $blog)
              <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ $blog->source }}</td>
                <td><a href="{{ $blog->link }}" target="_blank"><i class="glyphicon glyphicon-globe"></i></a></td>
                <td>{{ $blog->date }}</td>
                <td><i class="glyphicon {{ $blog->enabled ? 'glyphicon-ok' : 'glyphicon glyphicon-remove' }}"></i></td>
                <td>{{ $blog->created_at }}</td>
                <td><a href="{{ route('blog.edit', $blog) }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <nav aria-label="Shows pagination" class="text-center">
          {{ $blogs->links() }}
        </nav>

      @endif
    </div>
</div>

@endsection