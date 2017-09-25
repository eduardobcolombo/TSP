@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Traveling Salesman Problem</div>

                <div class="panel-body">
                    <p>The objective of this project is to find the best way to visit every capitals.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('tsp') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="capital_from" class="col-md-4 control-label">Capital from</label>
                            <div class="col-md-6">
                                <select id="capital_from" name="capital_from" class="form-control" >
                                    @foreach($capitals as $capital)
                                        <option value="{{ $capital->id }}">{{ $capital->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="population_size" class="col-md-4 control-label">Population Size</label>
                            <div class="col-md-6">
                                <input id="population_size" type="number" class="form-control" name="population_size" value="200" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="number_of_generations" class="col-md-4 control-label">Number of generations</label>
                            <div class="col-md-6">
                                <input id="number_of_generations" type="number" class="form-control" name="number_of_generations" value="100" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mutation_type" class="col-md-4 control-label">Mutation type</label>
                            <div class="col-md-6">
                                <select name="mutation_type" id="mutation_type">
                                    <option value="1">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Generate
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
