@extends('layout.layout')

@section('content')
    <section class="login-content">
        <div class="logo">
            <h1>Vali</h1>
        </div>
        <div class="login-box" style="min-height: 450px !important">
            <form class="login-form" action="index.html">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN UP</h3>
                <div class="form-group">
                    <label class="control-label">USERNAME</label>
                    <input class="form-control" type="text" placeholder="Username" name="name" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    <input class="form-control" type="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <label class="control-label">CONFIRM PASSWORD</label>
                    <input class="form-control" type="password" placeholder="Confirm Password"  name="confirm">
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN UP</button>
                </div>
            </form>
        </div>
    </section>
@endsection
