@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <form action="{{route('measures.create')}}" class="form">
                            <div class="form-row">
                                <div class="col-sm-2 col-3 mb-1">
                                    <label for="weight">Peso</label>
                                    <input type="text" class="form-control" id="weight" id="weight" placeholder="Peso" value=" {{Auth::user()->measure->last()->weight}}" required>
                                </div>
                                <div class="col-sm-2 col-3 mb-1">
                                    <label for="abdomen">Abdomen</label>
                                    <input type="text" class="form-control" id="abdomen" name="abdomen" placeholder="Abdomen" value=" {{Auth::user()->measure->last()->abdomen}}" required>
                                </div>
                                <div class="col-sm-2 col-3 mb-1">
                                    <label for="neck">Pescoço</label>
                                    <input type="text" class="form-control" id="neck" name="neck" placeholder="Pescoço" value=" {{Auth::user()->measure->last()->neck}}" required>
                                </div>



                                <div class="col-sm-2 col-3 mb-1">
                                    <label for="height">Altura</label>
                                    <input type="text" class="form-control" id="height" id="height" placeholder="Altura" value=" {{Auth::user()->measure->last()->height}}" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <h3>Histórico</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
