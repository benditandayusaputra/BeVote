@section('page', 'Ganti Password')

<div class="row">
    <div class="col-12">
        @if ( session()->has('error') )
            <div class="error" data-error="{{ session('error') }}"></div>
            <script>
                Swal.fire({
                    title: "Error",
                    text: $('.error').data('error'),
                    icon: "error"
                })
            </script>
        @endif
        <div class="card">
            <div class="card-body">
                <h3>Ganti Password</h3>
                <form wire:submit.prevent="change">
                    <div class="form-group">
                        <label for="oldPassword">Password Lama</label>
                        <input type="password" wire:model="oldPassword" class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword" id="oldPassword"placeholder="Masukan Password Lama">
                        @error('oldPassword')
                            <small class="ml-1 text-danger"> {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Password Baru</label>
                        <input type="password" wire:model="newPassword" class="form-control @error('newPassword') is-invalid @enderror" name="newPassword" id="newPassword"placeholder="Masukan Password Baru">
                        @error('newPassword')
                            <small class="ml-1 text-danger"> {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Konfirmasi Password</label>
                        <input type="password" wire:model="confirmPassword" class="form-control" name="confirmPassword" id="confirmPassword"placeholder="Masukan Password Baru">
                    </div>
                    <button type="submit" class="btn btn-primary bg-app">
                        <i class="fas fa-save fa-fw"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>