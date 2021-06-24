@extends('back.index')
@section('contentAdmin')
@section('title')
{{ $title }}
@endsection
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

                    <form action="{{ route('imagesSlider.store.admin.panel') }}" method="post">
                        @csrf
                        <div class="input-fild-box form-group">
                            <label for="">تصویر</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> انتخاب
                                </a>
                                </span>
                                <input id="thumbnail" value="{{ old('image') }}" @error('image') is-invalid @enderror class="form-control" type="text" name="image">
                            </div>
                             @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-fild-box form-group">
                            <label for="">url</label>
                            <input type="text" class="mt-2 form-control @error('url') is-invalid @enderror"
                                placeholder="url" value="{{ old('url') }}" name="url" id="">
                            @error('url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="input-fild-box form-group">
                            <label for="">Alt</label>
                            <input type="text" class="mt-2 form-control @error('alt') is-invalid @enderror"
                                placeholder="Alt" value="{{ old('alt') }}" name="alt" id="">
                            @error('alt')
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
