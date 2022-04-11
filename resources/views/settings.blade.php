@extends('layout')

@section('body')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Название</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($filetypes))
            @foreach($filetypes as $filetype)
                <tr>
                    <th scope="row">{{$filetype->id}}</th>
                    <td>
                        <form class="row g-3" action="{{route('filetype.update', $filetype->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="col-auto">
                                <input name="title" class="form-control" type="text" value="{{$filetype->title}}">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-warning mb-3">Изменить</button>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('filetype.destroy', $filetype->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

    <form action="{{route('filetype.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="filetype" class="form-label">Введите название категории</label>
            <input type="text" name="title" class="form-control" id="filetype" required>
            <button class="mt-3 btn btn-success" type="submit">Добавить</button>
        </div>
    </form>

@endsection
