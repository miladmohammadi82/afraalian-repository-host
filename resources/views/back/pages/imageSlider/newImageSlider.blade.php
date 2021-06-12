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
                                <input id="thumbnail" value="{{ old('url') }}" @error('url') is-invalid @enderror class="form-control" type="text" name="url">
                            </div>
                            @error('url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="input-fild-box form-group">
                            <label for="">Alt</label>
                            <input type="text" class="mt-2 form-control @error('image') is-invalid @enderror"
                                placeholder="Alt" value="{{ old('image') }}" name="image" id="">
                            @error('image')
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
