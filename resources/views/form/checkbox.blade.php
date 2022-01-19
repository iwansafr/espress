<div class="form-group">
  <label for="">{{ $label }}</label>
  <div class="overflow-auto @error($name) is-invalid @enderror"
      style="max-height: 100px;">
      @foreach ($options as $key => $value)
          <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox"
                  id="checkbox{{ $key }}" value="{{ $key }}"
                  wire:model="{{ $name}}_ids.{{ $key }}">
              <label for="checkbox{{ $key }}"
                  class="custom-control-label">{{ $value }}</label>
          </div>
      @endforeach
  </div>
  <div class="invalid-feedback">
      @error($name) {{ $message }} @enderror
  </div>
</div>