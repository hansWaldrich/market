<?php /**
 * Created by PhpStorm.
 * User: Hans Waldrich
 * Date: 15/12/2017
 * Time: 21:55
 */
?>

@extends('layouts.app')

@section('content')
    <div class="text-center vertical-center">
        <div class="container" style="display: inline">

            <form class="form-signin" action="/login/auth" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="well col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4">
                    <h2 class="form-signin-heading">Please sign in</h2>
                    <label for="userName" class="sr-only">User</label>
                    <input type="text" id="userName" name="userName" class="form-control" placeholder="User" required=""
                           autofocus="">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Ready to Shop!</button>

                    <div class="well alert alert-danger">
                        {{Session::get('message')}}
                    </div>

                </div>
            </form>

        </div>
    </div>
@endsection
