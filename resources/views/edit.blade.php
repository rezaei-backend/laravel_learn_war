@extends('layouts.master')
@section('content')
    <div class="col-12">
        <h1>فرم ویرایش آیتم</h1>
        <form action="{{route('items.update' , $item->id)}}" method="post">
            @csrf
            @method('PUT')
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="exampleInputEmail1">نام آیتم</label>
                <input name="title" value="{{$item->title}}" type="text" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">قیمت آیتم</label>
                <input name="price" value="{{$item->price}}" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <br>

            <button type="submit" class="btn btn-primary">ثبت فرم</button>
        </form>
    </div>
@endsection
