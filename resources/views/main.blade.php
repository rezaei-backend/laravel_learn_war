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
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletemodal{{$item->id}}">
                            حذف
                        </button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="deletemodal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               آیا از حذف {{$item->title}} مطمن هستید؟
                            </div>
{{--                            <div class="modal-footer">--}}
{{--                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
{{--                                <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                            </div>--}}


                            <form action="{{route('items.destroy' , $item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="حذف">

                            </form>
                        </div>
                    </div>
                </div>
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
