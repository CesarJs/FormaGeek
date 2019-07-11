@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row text-center">
                          <div class="col-12">
                              <h5>Seus Alimentos</h5>
                          </div>
                          @include('alerts._alert')
                        </div>
                         <h4>Adicionar</h4>
                         <form action="{{route('foods.store')}}" method="POST" class="form">
                            {{csrf_field()}}
                            <div class="form-row">
                                <div class="col-sm-12 col-12 mb-2">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="" required>
                                </div>
                                <div class="col-sm-3 col-4 mb-2">
                                    <label for="calories">Calorias</label>
                                    <input type="text" class="form-control" id="calories" name="calories" placeholder="Calorias" value="" required>
                                </div>
                                <div class="col-sm-3 col-4 mb-2">
                                    <label for="proteins">Proteinas</label>
                                    <input type="text" class="form-control" id="proteins" name="proteins" placeholder="Proteinas" value="" required>
                                </div>
                                <div class="col-sm-3 col-4 mb-2">
                                    <label for="carbo">Carboidratos</label>
                                    <input type="text" class="form-control" id="carbo" name="carbo" placeholder="Carboidratos" value="" required>
                                </div>
                                <div class="col-sm-3 col-4 mb-2">
                                    <label for="fat">Gordura</label>
                                    <input type="text" class="form-control" id="fat" name="fat" placeholder="Gordura" value="" required>
                                </div>
                                <div class="col-sm-3 col-4 mb-2">
                                    <label for="fiber">Fibra</label>
                                    <input type="text" class="form-control" id="fiber" name="fiber" placeholder="Fibra" value="" required>
                                </div>
                                <div class="col-sm-3 col-4 mb-2">
                                    <label for="sodium">Sódio</label>
                                    <input type="text" class="form-control" id="sodium" name="sodium" placeholder="Sódio" value="" >
                                </div>
                                <div class="col-sm-3 col-4 mb-2">
                                    <label for="potassium">Potássio</label>
                                    <input type="text" class="form-control" id="potassium" name="potassium" placeholder="Potássio" value="" >
                                </div>
                                <div class="col-sm-3 col-4 mb-2">
                                    <label for="cholesterol">Colesterol</label>
                                    <input type="text" class="form-control" id="cholesterol" name="cholesterol" placeholder="Colesterol" value="" >
                                </div>
                            </div>
                            <div class="form-row">
                              <div class="col-sm-12 col-12 mb-2 text-center">
                                 <button type="submit" class="btn btn-success btn-lg mb-2 col-md-12">Salvar</button> 
                              </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="accordion" id="tableHistory">
                      <div class="card">
                            <div class="card-header" id="headingOne">
                              <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 <h3>Todos <i class="fal fa-arrow-down"></i></h3>
                                </button>
                              </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#tableHistory">
                                <div class="card-body">
                                    <table class="table table-striped table-borderless table-hover table-bordered">
                                      <thead>
                                        <tr class="thead-dark">
                                          <th scope="col">Nome</th>
                                          <th scope="col">Calorias</th>
                                          <th scope="col">Proteinas</th>
                                          <th scope="col">Carboidratos</th>
                                          <th scope="col">Fibras</th>
                                          <th scope="col">Gorduras</th>
                                          <th scope="col">Editar</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @forelse(Auth::user()->foods->sortBy('name') as $m)
                                        <tr>
                                          <th scope="row">{{$m->name}}</th>
                                          <td>{{$m->calories>0?$m->calories:'x'}}</td>
                                          <td>{{$m->proteins>0?$m->proteins:'x'}}</td>
                                          <td>{{$m->carbo>0?$m->carbo:'x'}}</td>
                                          <td>{{$m->fiber>0?$m->fiber:'x'}}</td>
                                          <td>{{$m->fat>0?$m->fat:'x'}}</td>
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
