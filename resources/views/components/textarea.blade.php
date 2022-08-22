<div class="form-group row mb-4">
    <label for="note"
    class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">{{ $label }}</label>
    <div class="col-xl-10 col-lg-9 col-sm-10">
        <textarea class="form-control" cols="30" rows="10" name="{{ $name }}" id="{{ $name }}">
            {{ $value }} 
        </textarea>
        @error($name)
        <p class="text-danger">{{$message}}</p>
    @enderror
    </div>
</div>