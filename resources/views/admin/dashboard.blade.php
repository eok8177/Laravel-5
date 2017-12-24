@extends('layouts.app')

@section('content')
<div class="container">

            <div class="card card-default">
                <div class="card-title text-center"><h2>Dashboard</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

</div>
@endsection
