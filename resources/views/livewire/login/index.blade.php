<div class="container-fluid py-5">
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
    @if ( session()->has('success') )
        <div class="success" data-success="{{ session('success') }}"></div>
        <script>
            Swal.fire({
                title: "Terimakasih",
                text: $('.success').data('success'),
                icon: "success"
            })
        </script>
    @endif
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 col-md-12 col-12 pt-5">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 border-right pt-5 text-center">
                            <img src="{{ asset('src/assets/images/auth/icon-2.png') }}" alt="img" class="img-auth mt-4">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-center">
                            <h4>Pemilihan Ketua & Wakil Ketua OSIS</h4>
                            <img src="{{ Storage::disk('public')->get($config->logo) }}" width="120px" alt="img">
                            <h4 class="text-dark mt-3 mb-0">{{ $config->school_name }}</h4>
                            <small class="text-dark" style="font-size: 12px;">{{ $config->school_slogan }}</small>
                            <form wire:submit.prevent="doLogin">
                                <div class="form-group mb-3">
                                    <div class="input-group mt-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"><i class="fas fa-user fa-fw"></i></label>
                                        </div>
                                        <input type="text" class="form-control @error('nis') is-invalid @enderror" wire:model="nis" name="nis" id="nis" placeholder="Masukan NIS/NIP">
                                    </div>
                                    @error('nis')
                                        <small class="text-left text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"><i class="fas fa-key fa-fw"></i></label>
                                        </div>
                                        <input type="text" class="form-control @error('token') is-invalid @enderror" wire:model="token" name="token" id="token" placeholder="Masukan Token">
                                    </div>
                                    @error('token')
                                        <small class="text-left text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary bg-app mt-2">
                                    Masuk <i class="fas fa-sign-in-alt"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-12 mt-5">
                            <small>Copyrigth &copy; 2020 <a href="https://www.instagram.com/benditandayusaputra_/">SMK Negeri 1 Bawang</a> made with <i class="fas fa-heart text-danger"></i></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>