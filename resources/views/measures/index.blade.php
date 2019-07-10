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
                                @if(Auth::user()->genre == 2)
                                <div class="col-sm-2 col-3 mb-1">
                                    <label for="waist">Quadril</label>
                                    <input type="text" class="form-control" id="waist" name="waist" placeholder="Quadril" value=" {{Auth::user()->measure->last()->waist}}" required>
                                </div>
                                @endif
                            </div>
                            <div class="form-row">
                                <div class="col-sm-2 col-3 mb-1">
                                    <label for="height">Altura</label>
                                    <input type="text" class="form-control" id="height" id="height" placeholder="Altura" value=" {{Auth::user()->measure->last()->height}}" required>
                                </div>
                                <div class="col-sm-2 col-3 mb-1">
                                    <label for="arm">Braço</label>
                                    <input type="text" class="form-control" id="arm" name="arm" placeholder="Braço" value=" {{Auth::user()->measure->last()->arm}}" required>
                                </div>
                                <div class="col-sm-2 col-3 mb-1">
                                    <label for="chest">Peito</label>
                                    <input type="text" class="form-control" id="chest" name="chest" placeholder="Peito" value=" {{Auth::user()->measure->last()->chest}}" required>
                                </div>
                                <div class="col-sm-2 col-3 mb-1">
                                    <label for="thigh">Coxa</label>
                                    <input type="text" class="form-control" id="thigh" name="thigh" placeholder="Coxa" value=" {{Auth::user()->measure->last()->thigh}}" required>
                                </div>
                                <div class="col-sm-2 col-3 mb-1">
                                    <label for="calf">Panturrilha</label>
                                    <input type="text" class="form-control" id="calf" name="calf" placeholder="Panturrilha" value=" {{Auth::user()->measure->last()->calf}}" required>
                                </div>
                                 @if(Auth::user()->genre == 1)
                                <div class="col-sm-2 col-3 mb-1">
                                    <label for="waist">Quadril</label>
                                    <input type="text" class="form-control" id="waist" name="waist" placeholder="Quadril" value=" {{Auth::user()->measure->last()->waist}}" required>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                    
                    <div class="accordion" id="tableHistory">
                      <div class="card">
                            <div class="card-header" id="headingOne">
                              <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 <h3>Histórico <i class="fal fa-arrow-down"></i></h3>
                                </button>
                              </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#tableHistory">
                                <div class="card-body">
                                    <table class="table table-striped table-borderless table-hover table-bordered">
                                      <thead>
                                        <tr class="thead-dark">
                                          <th scope="col">Data</th>
                                          <th scope="col">Peso</th>
                                          <th scope="col">Abdomen</th>
                                          <th scope="col">Pescoço</th>
                                          <th scope="col">Braço</th>
                                          <th scope="col">Coxa</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @forelse(Auth::user()->measure->sortByDesc('created_at') as $m)
                                        <tr>
                                          <th scope="row">{{date('d/m/y', strtotime($m->created_at))}}</th>
                                          <td>{{$m->height>0?$m->height:'x'}}</td>
                                          <td>{{$m->abdomen>0?$m->abdomen:'x'}}</td>
                                          <td>{{$m->neck>0?$m->neck:'x'}}</td>
                                          <td>{{$m->arm>0?$m->arm:'x'}}</td>
                                          <td>{{$m->coxa>0?$m->coxa:'x'}}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                          <th scope="row">X</th>
                                          <td>Ainda</td>
                                          <td>Sem</td>
                                          <td>Registros</td>
                                          <td>>:(</td>
                                          <td>X</td>
                                        </tr>
                                        @endforelse
                                      </tbody>
                                    </table>
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
