<div class="form-group">
  <label>{{ $label }}</label>
  <label class="@error($name) is-invalid @enderror " wire:model="{{ $name }}" {{ $attribute }}>{{ $$name }}</label>
  <div class="invalid-feedback">
    @error($name) {{$message}} @enderror
  </div>
</div>