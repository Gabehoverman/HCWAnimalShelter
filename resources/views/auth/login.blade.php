@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">
            <h5>Admin Login</h5>
            <div>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Address</label>

                        <div>
                            <input id="email" type="email" class="form-control input-field" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Password</label>

                        <div>
                            <input id="password" type="password" class="form-control input-field" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn blue">
                                Login
                            </button>

                            {{--<a class="btn btn-link blue" href="{{ route('password.request') }}">--}}
                                {{--Forgot Your Password?--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
