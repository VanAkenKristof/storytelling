@extends('master')

@section('content')
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">

                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        @foreach($stories as $story)

                            <div class="col-lg-3">
                                <div class="contact-box center-version">

                                    <a href="#">

                                        {{--<img alt="image" class="rounded-circle" src="img/a2.jpg">--}}


                                        <h3 class="m-b-xs"><strong>{{ $story->name }}</strong></h3>

                                        <div class="font-bold">By {{ $story->user->name }}</div>
                                        <div class="m-t-md">
                                            <strong>{{ $story->race->name }} {{ $story->class->name }}</strong><br>
                                            {{ $story->subClass->name }}<br>
                                            Age {{ $story->age }}<br>
                                            {{ $story->background->name }}<br>
                                        </div>

                                    </a>
                                    <div class="contact-box-footer">
                                        <div class="m-t-xs btn-group">
                                            @if (isset($votes))
                                                @if (!$votes->contains($story->id))
                                                    <a href="{{ route('storytelling.vote', ['story' => $story]) }}" class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Vote </a>
                                                @else
                                                    <a href="{{ route('storytelling.unvote', ['story' => $story]) }}" class="btn btn-xs btn-white"><i class="fa fa-heart"></i> Retract Vote </a>
                                                @endif
                                            @endif
                                            <a href="{{ route('storytelling.view', ['story' => $story]) }}" class="btn btn-xs btn-white"><i class="fa fa-book"></i> Read </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
