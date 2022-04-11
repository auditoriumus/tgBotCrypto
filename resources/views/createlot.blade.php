@extends('layout')

@section('body')
    <div class="container">
        <main>
            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#single"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Одиночная загрузка
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#plural"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Загрузка файлом
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="single" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row g-5">
                        <div class="col-md-12 col-lg-12">
                            <form class="needs-validation"
                                  action="@if(isset($lot)){{route('lots.update', $lot->id)}}@else{{route('lots.store')}}@endif"
                                  enctype="multipart/form-data"
                                  method="post">
                                @if(isset($lot)) @method('PUT') @else @method('POST') @endif
                                @csrf
                                <div class="row gy-3">
                                    <div class="col-md-9">
                                        <label for="title" class="form-label">Лот</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                               value="@if(isset($lot)){{$lot->title}}@else{{old('title')}}@endif"
                                        required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="price" class="form-label">Цена (дробные значения через
                                            точку)</label>
                                        <input type="text" name="price" class="form-control" id="price"
                                               value="@if(isset($lot)){{$lot->price}}@else{{old('price')}}@endif"
                                        required>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <button class="w-100 btn btn-primary btn-lg" type="submit">@if(isset($lot))Изменить
                                    лот@else
                                        Добавить лот@endif</button>
                            </form>
                            @if(isset($lot))
                                <form action="{{route('lots.destroy', $lot->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="mt-4 w-100 btn btn-danger btn-lg" type="submit">Удалить лот</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="plural" role="tabpanel" aria-labelledby="profile-tab">

                    <form class="needs-validation"
                          action="{{route('lots.store')}}"
                          enctype="multipart/form-data"
                          method="post">
                        @csrf
                        <div class="row gy-3">
                            <div class="input-group mb-3 mt-3">
                                <label class="input-group-text" for="file">Загрузить файл</label>
                                <input type="file" name="file" class="form-control" id="file">
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Добавить лоты</button>
                    </form>

                </div>
            </div>
        </main>
    </div>
@endsection
