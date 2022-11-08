@extends('app.base')

@section('content')
<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            The post has not been saved, please correct the errors.
        </div>
        @error('update')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    @endif
    <form action="{{ url('mypost/' . $post->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="mensaje" class="ml-5 mt-5 text-white">Message</label>
            <input value="{{ old('mensaje', $post->mensaje) }}" required type="text" minlength="2" maxlength="80" class="form-control ml-5" id="mensaje" name="mensaje" placeholder="Post Message">
            @error('mensaje')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success ml-5 mt-3">Edit</button>
        <a href="{{ url()->previous() }}" class="btn btn-primary ml-4 mt-3">Back</a>
        
    </form>
</div>
@endsection