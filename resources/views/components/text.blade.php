<div class="form-group row mb-4">
    <label for="name"
           class="col-xl-12 col-md-6 col-form-label  font-weight-bold text-capitalize {{$labelClass ?? 'text-muted'}}">{{ $label }}
           <i class="fa-solid fa-star-of-life" style="color:rgba(246, 14, 14, 0.866)"></i>
        </label>
    <div class="col-xl-12 col-md-6 ">
        <input type="text"
               class="form-control {{$class ?? ''}}"
               id="{{$id ?? $name}}"
               placeholder="{{$placeholder ?? ''}}"
               name="{{ $name }}"
               value="{{$value ?? ''}}">

              
        @error($name)
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
</div>
