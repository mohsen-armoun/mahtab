@extends('panel.layouts.master')
@section( 'title','مدیریت  مقام ها')
@section('content')

    <div class="content-wrapper">


        <div class="content-header">
            <div class="container-fluid px-4">
                <div class="row mb-2 d-flex flex-wrap justify-content-between">

                    <h1 class="m-0 text-dark">مدیریت  مقام ها </h1>

                    <div>
                        @can('create_role')
                        <a href="{{route('admin.Role.create')}}" class="btn btn-sm btn-outline-primary p-2">افزودن مقام جدید</a>
                        @endcan
                        <a href="{{route('admin.panel')}}" class="btn btn-sm btn-outline-secondary p-2">بازگشت</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card shadow-sm">


                    <form action="" method="get">

                        <div class="row py-2">
                            <div class="col-lg-3 mr-2">
                                <input type="text" name="search" placeholder="جستجو براساس نام  " class="form-control ml-2">
                            </div>

                            <div class="col-lg-4">
                                <button type="submit" class="btn  btn-outline-success ">جستجو</button>

                            </div>

                        </div>
                    </form>
                    <div class="py-4 px-4 ">

                        <table class="table table-sm">
                            <thead class="thead-light">
                            <tr>

                                <th>مقام </th>
                                <th>عنوان مقام </th>
                                <th>اقدامات  </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($rolls as $roll)
                                <tr>
                                    <td  class="text-align-center">{{$roll->name}}</td>
                                    <td  class="text-align-center">{{$roll->label}}</td>
                                    <td  class="text-align-center">
                                        <form method="post" action="{{route('admin.Role.destroy' , $roll->id)}}">
                                            @csrf
                                            @method('delete')
                                            @can('update_role')
                                            <a href="{{route('admin.Role.edit' , $roll->id)}}" class="btn btn-sm btn-success">ویرایش</a>
                                            @endcan
                                            @can('delete_role')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('آیا مایل به حذف هستید؟')"  title="حذف"
                                            >حذف</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                    </div>
                    <div class="card-footer">
                        {{$rolls->render()}}

                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection
