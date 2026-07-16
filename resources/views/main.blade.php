@extends('layouts.master')
@section('content')
    <div class="col-12">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">اسم محصول</th>
                <th scope="col">قیمت</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$item->title}} </td>
                    <td>{{$item->price}} تومان</td>
                    <td>
                        <a href="{{route('items.edit', $item->id)}}" class="btn btn-primary">ویرایش</a>
                        <a class="btn btn-danger">حذف</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <h1>فرم ثبت آیتم</h1>
        <form action="{{route('items.store')}}" method="post">


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
                <input name="title" type="text" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">قیمت آیتم</label>
                <input name="price" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <br>

            <button type="submit" class="btn btn-primary">ثبت فرم</button>
        </form>
    </div>
@endsection
