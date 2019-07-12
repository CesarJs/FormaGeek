@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row text-center">
                          @include('alerts._alert')
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
