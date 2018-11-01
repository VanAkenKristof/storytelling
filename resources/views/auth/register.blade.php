@extends('master')

@section('scripts')
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
@endsection

@section('content')


    <div class="col-lg-6">
        <div class="ibox">
            <div class="ibox-content">



                <h3>Register to Storytelling</h3>
                <p>Create account to vote on your favourite story or create your own!.</p>
                @if($errors->any())
                    <div class="row collapse">
                        <ul class="alert-box warning radius">
                            @foreach($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" placeholder="Name" name="name"
                               value="{{ old('name') }}" autofocus required>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                        <input id="street" type="text" class="form-control" placeholder="Street" name="street"
                               value="{{ old('street') }}" required>

                        @if ($errors->has('street'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                        <input id="number" type="text" class="form-control" placeholder="Number" name="number"
                               value="{{ old('number') }}" required>

                        @if ($errors->has('number'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                        <input id="postal_code" type="text" class="form-control" placeholder="Postal Code" name="postal_code"
                               value="{{ old('postal_code') }}" required>

                        @if ($errors->has('postal_code'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <input id="city" type="text" class="form-control" placeholder="City" name="city"
                               value="{{ old('city') }}" required>

                        @if ($errors->has('city'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <input id="country" type="text" class="form-control" placeholder="Country" name="country"
                               value="{{ old('country') }}" required>

                        @if ($errors->has('country'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="hr-line-dashed"></div>
                    
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" placeholder="E-mail" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password"
                               name="password_confirmation" required>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary block full-width m-b">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
@endsection