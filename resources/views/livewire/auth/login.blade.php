<div>
    @if (session('alert'))
        <div class="alert alert-danger">
            {{ session('alert') }}
        </div>
    @endif
    <form wire:submit.prevent="login">
        @csrf
        <div class="input-group mb-3">
            <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            <div class="invalid-feedback">
                @error('email') {{ $message }} @enderror
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            <div class="invalid-feedback">
                @error('password') {{ $message }} @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" wire:model="remember">
                    <label for="remember">
                        Ingat Saya
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
</div>
