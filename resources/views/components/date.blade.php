<div class="form-group row mb-4">
    <label for="brithday" class="col-xl-12 col-md-6 col-form-label text-muted font-weight-bold text-capitalize">{{ $label }}
        <i class="fa-solid fa-star-of-life" style="color:red"></i>
    </label>
    <div class="col-xl-12 col-md-6 ">
        <input type="date" 
            class="form-control {{$class ?? ''}}"
            id="{{$id ?? $name}}"
            placeholder=""
            name="{{ $name }}"
            value="{{$value ?? ''}}">
            @error($name)
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
</div>