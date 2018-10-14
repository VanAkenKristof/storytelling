@extends('master')

@section('content')
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">

                <div class="wrapper wrapper-content animated fadeInRight">

                    <div class="row">
                        <div class="col-lg-9">
                            <div class="wrapper wrapper-content animated fadeInUp">
                                <div class="ibox">
                                    <div class="ibox-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="m-b-md">
                                                    <h2>{{ $story->name }}</h2>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <dl class="row mb-0">
                                                    <div class="col-sm-4 text-sm-right"><dt>Race:</dt> </div>
                                                    <div class="col-sm-8 text-sm-left"><dd class="mb-1">{{ $story->name }}</dd></div>
                                                </dl>

                                                <dl class="row mb-0">
                                                    <div class="col-sm-4 text-sm-right"><dt>Class:</dt> </div>
                                                    <div class="col-sm-8 text-sm-left"><dd class="mb-1">{{ $story->subClass->name }} <strong>{{ $story->class->name }}</strong></dd></div>
                                                </dl>

                                                <dl class="row mb-0">
                                                    <div class="col-sm-4 text-sm-right"><dt>Background:</dt> </div>
                                                    <div class="col-sm-8 text-sm-left"><dd class="mb-1">{{ $story->background->name }}</dd></div>
                                                </dl>

                                                @if (Auth::user())
                                                    <dl class="row mb-0">
                                                        <div class="col-sm-4 text-sm-right">
                                                            <dt>
                                                            <span class="label label-primary">
                                                                    @if (!$voted)
                                                                    <a href="{{ route('storytelling.vote', ['story' => $story]) }}" style="text-decoration: none; color: #fff;">
                                                                    <i class="fa fa-heart"></i> Vote
                                                                </a>
                                                                @else
                                                                    <a href="{{ route('storytelling.unvote', ['story' => $story]) }}" style="text-decoration: none; color: #fff;">
                                                                    <i class="fa fa-frown-o"></i> Retract Vote
                                                                </a>
                                                                @endif
                                                            </span>
                                                            </dt>
                                                        </div>
                                                    </dl>
                                                @endif

                                            </div>
                                            <div class="col-lg-6" id="cluster_info">

                                                <dl class="row mb-0">
                                                    <div class="col-sm-4 text-sm-right">
                                                        <dt>Created By:</dt>
                                                    </div>
                                                    <div class="col-sm-8 text-sm-left">
                                                        <dd class="mb-1">{{ $story->user->name }}</dd>
                                                    </div>
                                                </dl>
                                                <dl class="row mb-0">
                                                    <div class="col-sm-4 text-sm-right">
                                                        <dt>Last Updated:</dt>
                                                    </div>
                                                    <div class="col-sm-8 text-sm-left">
                                                        <dd class="mb-1">{{ $story->updated_at->format('d/m/Y - h:m') }}</dd>
                                                    </div>
                                                </dl>
                                                <dl class="row mb-0">
                                                    <div class="col-sm-4 text-sm-right">
                                                        <dt>Created:</dt>
                                                    </div>
                                                    <div class="col-sm-8 text-sm-left">
                                                        <dd class="mb-1"> {{ $story->created_at->format('d/m/Y - h:m') }}</dd>
                                                    </div>
                                                </dl>
                                                <dl class="row mb-0">
                                                    <div class="col-sm-4 text-sm-right">
                                                        <dt>Votes:</dt>
                                                    </div>
                                                    <div class="col-sm-8 text-sm-left">
                                                        <dd class="mb-1"> {{ $votes }}</dd>
                                                    </div>
                                                </dl>
                                            </div>
                                        </div>


                                        <div class="wrapper wrapper-content animated fadeInRight">
                                            <p>
                                                {{ $story->story }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
