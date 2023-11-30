@extends('layouts.app')

@section('content')
<!-- This is an example component -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <div class="card">
                <div class="card-body">
                    <form method="GET">
                        <div class="row">
                            <div class="col-xl-3">
                                <label>Актеры</label>
                                <select id="actors[]" name="actors[]" multiple="multiple" class="custom-select" multiple>
                                    <option>Выберите актера</option>
                                    @foreach($actors as $actor)
                                        <option value="{{$actor->id}}">{{$actor->name}}</option>   
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-3">
                                <label>Режисёр</label>
                                <select id="director" name="director" class="form-control">
                                    @foreach($directors as $director)
                                        <option value="{{$director->id}}">{{$director->name}}</option>   
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-3">
                                <label>Жанр</label>
                                <select id="genre[]" name="genre[]" multiple="multiple" class="custom-select" multiple>
                                    <option>Выберите жанр</option>
                                    @foreach($genries as $genry)
                                        <option value="{{$genry->id}}">{{$genry->name}}</option>   
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-1 mt-3">
                                <label>Рейтинг</label>
                                <input type="text" name="rating" class="form-control" value="{{ $rating ?? '' }}">
                            </div>
                            <div class="col-xl-1 mt-3">
                                <label>Годы</label>
                                <input type="text" name="years" class="form-control" value="{{ $years ?? '' }}">
                            </div>
                            <div class="col-xl-12 text-right mt-2">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Развание</th>
                        <th>Жанр</th>
                        <th>Режисёр</th>
                        <th>Описание</th>
                        <th>Оценка</th>
                        <th>Год выпуска</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($films as $key => $film)
                    <tr>
                    <td> {{ $film->id }}</td>
                    <td> {{ $film->name }}</td>
                    <td>{{ $film->genre->name }}</td>
                    <td>{{ $film->director->name }}</td>
                    <td>{{ $film->description }}</td>
                    <td>{{ round($film->stars, 2) }}</td>
                    <td>{{  \Carbon\Carbon::parse($film->date)->format('d.m.Y') }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            {{ $films->links() }}
        </div>
    </div>
</div>
@endsection