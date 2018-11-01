@extends('master')

@section('content')

<div class="ibox-content m-b-sm border-bottom">
    <div class="text-center p-lg">
        <h2>This account has been diqualified</h2>
        <p>
            {{ $message }}
        </p>
    </div>
</div>

@endsection