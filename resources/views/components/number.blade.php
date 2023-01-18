<div class="form-group row mb-4">
    <label for="name"
        class="col-xl-12 col-md-6 col-form-label text-muted font-weight-bold text-capitalize">{{ $label }}</label>
    <div class="col-xl-12 col-md-6">
        <input type="number" class="form-control" id="{{ $id ?? '' }}" placeholder="" name="{{ $name }}" value="{{ $value }}">
        @error($name)
        <p class="text-danger">{{$message}}</p>
    @enderror
    </div>
</div>