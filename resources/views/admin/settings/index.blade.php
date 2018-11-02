@extends('master')

@section('styles')
    <link href="/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-content">
                    <h3>
                        Phases
                    </h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.settings.edit') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="phase1">Phase 1</label>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="phase1" value="{{ old('phase1') ?? ($phaseCollection[1] ?? "") }}" required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="phase1">Phase 2</label>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="phase2" value="{{ old('phase2') ?? ($phaseCollection[2] ?? "") }}" required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="phase1">Phase 3</label>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="phase3" value="{{ old('phase3') ?? ($phaseCollection[3] ?? "") }}" required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="phase1">Phase 4</label>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="phase4" value="{{ old('phase4') ?? ($phaseCollection[4] ?? "") }}" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="submit" value="Complete" class="btn btn-primary pull-right">
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="/js/plugins/fullcalendar/moment.min.js"></script>
    <script src="/js/plugins/daterangepicker/daterangepicker.js"></script>

    <script>
        $(document).ready(function () {
            $('input[name="phase1"], input[name="phase2"], input[name="phase3"], input[name="phase4"]').daterangepicker({
                format: 'DD/MM/YYYY',
            });
        });
    </script>
@endsection
