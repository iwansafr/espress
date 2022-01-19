<div class="form-group">
  <label>{{ $label }}</label>
  <textarea id="{{ $name }}" class="form-control form-control-sm @error($name) is-invalid @enderror " wire:model="{{ $name }}" placeholder="{{ $placeholder }}" {{ $attribute }}></textarea>
  <div class="invalid-feedback">
    @error($name) {{$message}} @enderror
  </div>
</div>