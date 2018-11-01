@extends('master')

@section('content')
    <div class="col-lg-10">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Users  </h5>
            </div>
            <div class="ibox-content">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Votes</th>
                        <th>Story</th>
                        <th>IP Address</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Ban Reason</th>
                        <th>Tools</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($users as $user)
                        @if(!$user->admin)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->story ? $user->story->votes->count() : "No story" }}</td>
                                <td><a href="{{ route('storytelling.view', ['story' => $user->story]) }}">{{ $user->story ? $user->story->name : "No story" }}</a></td>
                                <td>{{ $user->story->ip_address ?? "No story" }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->fullAddress() }}</td>
                                <td>{{ $user->ban_message ?? "-" }}</td>
                                <td>
                                    @if(!$user->ban_message)
                                        <a class="banButton" data-name="{{ $user->name }}" data-id="{{ $user->id }}" data-toggle="modal" data-target="#banModal">
                                            <i class="fa fa-ban"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.users.unban', ['user' => $user]) }}">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @include('admin.users._ban_modal')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.banButton').click(function() {
                var id = $(this).attr('data-id');
                var name = $(this).attr('data-name');

                $('.banUser').html(name);
                $('#banForm').attr('action', '/users/ban/' + id);
            });
        })
    </script>
@endsection