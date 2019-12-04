@extends('layout')

@section('content')

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h4 class="text-center">Logowanie</h4>
                    <hr>
                    <form method="post" role="form" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="password" class="form-control" name="password" placeholder="Haslo">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="text-center">
                                <input class="btn btn-primary" type="submit" value="Login"/>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection