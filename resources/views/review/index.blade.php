@extends('layouts.default')
@section('title', __( 'Review' ))
@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Book Reviews</h3>
            <div class="card-tools">
                <a type="button" class="btn btn-info btn-sm" href="{{ URL::to('/book') }}">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
        <div class="card-body">
            @include('layouts.partials.notifications')
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th style="width: 10px;">No</th>
                        <th>User</th>
                        <th>Book</th>
                        <th>Star</th>
                        <th>Comment</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->user->name }}</td>
                            <td>{{ $value->book->title }}</td>
                            <td>{{ $value->star }}</td>
                            <td>{!! nl2br($value->review) !!}</td>
                            <td>
                                <a type="button" href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editData-{{ $value->id }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a type="button" class="btn btn-danger btn-sm" href="{{ URL::to('/delete-review/'.$value->id) }}" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    @foreach ($data as $value)
        <div class="modal fade" id="editData-{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ URL::to('do-update-review', $value->id) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Star</label>
                                <select class="form-control" name="star" required>
                                    <option value="">-- SELECT STAR --</option>
                                    @for($i=1; $i<=5; $i++)
                                        <option value="{{ $i }}" {{ selected($i, $value->star) }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Comment</label>
                                <textarea class="form-control" name="comment" rows="5" required>{{ $value->review }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
