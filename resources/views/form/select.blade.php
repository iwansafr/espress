<div class="form-group">
  <label>{{ $label }}</label>
  <select id="" class="form-control form-control-sm @error($name) is-invalid @enderror " wire:model="{{ $name }}"
    @if($event) {{ $event }} @endif {{ $attribute }}>
    @if (!empty($placeholder))
        <option value readonly>--{{ $placeholder }}--</option>
    @endif
    @if (!empty($options))
      @foreach ($options as $key => $value)
          <option value="{{ $key }}">{{ $value }}</option>
      @endforeach
    @endif
  </select>
  <div class="invalid-feedback">
    @error($name) {{$message}} @enderror
  </div>
</div>