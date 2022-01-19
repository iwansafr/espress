<div class="form-group">
  <label>{{ $label }}</label>
  <input type="{{ $type }}" class="form-control form-control-sm @error($name) is-invalid @enderror " wire:model="{{ $name }}" placeholder="{{ $placeholder }}" @if (!empty($accept)) accept="{{ $accept }}" @endif {{ $attribute }}>
  <div class="invalid-feedback">
    @error($name) {{$message}} @enderror
  </div>
</div>