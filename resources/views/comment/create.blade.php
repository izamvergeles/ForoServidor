@extends('app.base')


    @section('content')
    <div>
        <form action="{{ url('mycomment') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="mensaje" class="text-white ml-4 mt-5">Comment</label>
                <input value="{{ old('comment') }}" _required type="text" maxlength="100" class="form-control w-50 ml-4 h-25" id="comment" name="comment" placeholder="Your comment">
                @error('mensaje')
                    <div class="alert alert-danger ml-4 w-50">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-success ml-4 mt-3">Add</button>
                <a href="{{ url()->previous() }}" class="btn btn-primary ml-4 mt-3">Back</a>
            </div>
        </form>
    </div>
    @endsection