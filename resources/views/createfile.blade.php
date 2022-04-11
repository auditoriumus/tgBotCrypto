@extends('layout')

@section('body')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Добавление файлов</h2>
            </div>

            <div class="row g-5">
                <div class="col-md-12 col-lg-12">
                    <h4 class="mb-3"></h4>
                    <form class="needs-validation"
                          action="@if(isset($file)){{route('files.update', $file->id)}}@else{{route('files.store')}}@endif"
                          method="post" enctype="multipart/form-data">
                        @if(isset($file)) @method('PUT') @else @method('POST') @endif
                        @csrf
                        <div class="row gy-3">
                            <div class="col-md-9">
                                <label for="title" class="form-label">Файл</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       value="@if(isset($file)){{$file->title}}@else{{old('title')}}@endif" required="">
                            </div>
                            <div class="col-md-3">
                                <label for="price" class="form-label">Цена (дробные значения через точку)</label>
                                <input type="text" name="price" class="form-control" id="price"
                                       value="@if(isset($file)){{$file->price}}@else{{old('price')}}@endif"
                                       required="">
                            </div>
                        </div>
                        <div class="input-group mb-3 mt-3">
                            <label class="input-group-text" for="file">Загрузить файл</label>
                            <input type="file" name="file" class="form-control" id="file">
                        </div>

                        @if(isset($file))<a class="btn btn-success" href="{{route('getFile', $file->id)}}">Скачать
                            файл</a>@endif

                        @if(isset($filetypes) && !empty($filetypes))
                            <select class="form-select mt-3" name="filetype">
                                @foreach($filetypes as $filetype)
                                    <option value="{{$filetype->id}}"
                                            @if(isset($file) &&  ($filetype->id == $file->file_types_id)) selected @endif>{{$filetype->title}}</option>
                                @endforeach
                            </select>
                        @endif

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">@if(isset($file))Изменить
                            файл@else
                                Добавить файл@endif</button>
                    </form>
                    @if(isset($file))
                        <form action="{{route('files.destroy', $file->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="mt-4 w-100 btn btn-danger btn-lg" type="submit">Удалить файл</button>
                        </form>
                    @endif
                </div>
            </div>
        </main>
    </div>
@endsection


