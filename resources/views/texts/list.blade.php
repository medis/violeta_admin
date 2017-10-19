@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
          <div class="col-md-6">List of texts</div>
        </div>
    </div>
    <div class="panel-body">
      @if (empty($texts))
        <p>No texts yet.</p>
      @else
        <table class="table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($texts->items() as $text)
              <tr>
                <td>{{ $text->title }}</td>
                <td><a href="{{ route('text.edit', $text) }}" class="btn btn-default" role="button"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Edit</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <nav aria-label="Shows pagination" class="text-center">
          {{ $texts->links() }}
        </nav>

      @endif
    </div>
</div>

@endsection