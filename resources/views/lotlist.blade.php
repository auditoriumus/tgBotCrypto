@extends('layout')

@section('body')
    @if(isset($lots) && !empty($lots))
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Лот</th>
                <th scope="col">Цена</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lots as $lot)
                @if($lot->is_active)
                    <tr>
                        <th scope="row">{{$lot->id}}</th>
                        <td>{{ $lot->title }} <a href="{{route('lots.edit', $lot->id)}}">изменить</a></td>
                        <td>{{ $lot->price }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
    @endif
@endsection
