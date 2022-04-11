@extends('layout')

@section('body')
    @if(isset($filetypes) && !empty($filetypes))
        <p align="end">
            @foreach($filetypes as $filetype)
                <a href="{{route('files.index', ['filetype' => $filetype->id])}}" class="btn btn-primary">{{$filetype->title}}</a>
            @endforeach
        </p>
    @endif
    @if(isset($files) && !empty($files))
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
            </tr>
            </thead>
            <tbody>
            @foreach($files as $file)
                @if($file->is_active)
                    <tr>
                        <th scope="row">{{$file->id}}</th>
                        <td>{{ $file->title }} <a href="{{route('files.edit', $file->id)}}">изменить</a></td>
                        <td>{{ $file->price }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
    @endif
@endsection
