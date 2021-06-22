@extends('back.index')
@section('contentAdmin')

    <main class="client-page">
        <div class="d-flex align-items-center">
            <div class="container">
                <div class="">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('articles.store.admin.panel') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="input-fild-box form-group">
                            <label for="">نام مطلب</label>
                            <input type="text" class="mt-2 form-control @error('name') is-invalid @enderror "
                                placeholder="نام محصول" value="{{ old('name') }}" name="name" id="">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="input-fild-box form-group">
                            <label for="">لینک</label>
                            <input type="text" class="mt-2 form-control @error('slug') is-invalid @enderror"
                                placeholder="لینک" value="{{ old('slug') }}" name="slug" id="">
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-fild-box form-group">
                            <label for="">تعداد بازدید</label>
                            <input type="text" class="mt-2 form-control @error('hit') is-invalid @enderror"
                            value="{{ old('hit') }}" placeholder="تعداد بازدید" name="hit" id="">
                            @error('hit')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-fild-box form-group">
                            <label for="">توضیحات</label>
                            <textarea id="editor" class="mt-2 form-control @error('description') is-invalid @enderror"
                                placeholder="توضیحات" name="description" id="">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-fild-box form-group">
                            <label for="">انتخاب دسته بندی</label>
                            <select class="chosen-select form-control" placeholder="دسته بندی را انتخاب کنید" name="categories[]" multiple>
                                @foreach ($categories as $cat_id => $cat_name)
                                    <option value="{{ $cat_id }}">{{ $cat_name }}</option>
                                @endforeach
                            </select>



                        </div>

                        <div class="input-fild-box form-group">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                        </div>


                        <div class="input-fild-box form-group">
                            <label for="">تصویر شاخص</label>
                            <div class="input-group">
                                <input type="file" name="index_image" id="">
                            </div>
                            @error('index_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-fild-box form-group">
                            <button type="submit" class="btn btn-success w-100">ارسال</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection
