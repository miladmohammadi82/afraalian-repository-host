@extends('back.index')
@section('contentAdmin')

@section('title')
{{ $title }}
@endsection

<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            @include('back.pages.layouts.message')
            <a class="btn btn-primary" href="{{ route('imagesSlider.new.admin.panel') }}">افزودن</a>
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">عکس های اسلایدر وبسایت</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="جستجو">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /.card-header -->

                <div id="loading">
                    <vue-simple-spinner class="mt4" size="large" message="Loading..."></vue-simple-spinner>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover" style="font-size: 16px;">
                        <tbody>
                            <tr>
                                <th>آیدی</th>
                                <th>تصویر</th>
                                <th>وضعیت</th>
                                <th>Alt</th>
                                <th>عملیات</th>

                            </tr>
                            @foreach ($imagesSlider as $imageSlider)
                                <tr>
                                    <td>{{ $imageSlider->id }}</td>
                                    <td><img src="{{ $imageSlider->index_image }}" alt="" height="50" width="50"></td>
                                    <td>{{ $imageSlider->name }}</td>
                                    <td>
                                        @if ($imageSlider->status == 1)
                                            <a href="{{ route('imagesSlider.edit.status.admin.panel', $imageSlider->id) }}" class="border-0"><span class="badge badge-success">تایید شده</span></a>
                                        @endif
                                        @if ($imageSlider->status == 0)
                                            <a href="{{ route('imagesSlider.edit.status.admin.panel', $imageSlider->id) }}"><span class="badge badge-danger">تایید نشده</span></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('imagesSlider.edit.admin.panel', $imageSlider->id) }}"
                                            class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>&nbsp;
                                        <form method="POST"
                                            action="{{ route('imagesSlider.destroy.admin.panel', $imageSlider->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>



    </div>

</div>

@endsection
