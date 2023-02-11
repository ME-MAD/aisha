<div class="form-group row mb-4">
    <label for="from"
        class="col-xl-12 col-md-6 col-form-label   font-weight-bold text-capitalize {{ $class ?? '' }}">
        {{ $label }}
        <i class="fa-solid fa-star-of-life" style="color:rgba(246, 14, 14, 0.866)"></i>
    </label>
    <div class="col-xl-12 col-md-6">
        <input id="{{ $id ?? $name }}" value="{{ $value }}" class="form-control flatpickr flatpickr-input active"
            type="time" name="{{ $name }}">
        @error($name)
            <p class="text-danger">{{ $message }}</p>
        @enderror

    </div>
</div>
