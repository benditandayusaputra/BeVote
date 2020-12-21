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
                title: "Sukses",
                text: $('.success').data('success'),
                icon: "success"
            })
        </script>
    @endif
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 col-md-12 col-12 pt-5">
            <div class="card shadow-lg">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 border-right pt-2">
                            <img src="{{ asset('src/assets/images/auth/icon-2.png') }}" alt="img" class="img-auth mt-4">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <img src="{{ asset('media/bendVote.png') }}" width="100px" alt="img">
                            <h3 class="text-dark mt-3 mb-3">Masuk Ke Aplikasi</h3>
                            <form wire:submit.prevent="doLogin">
                                <div class="form-group">
                                  <input type="text" class="form-control @error('username') is-invalid @enderror" wire:model="username" name="username" id="username" placeholder="Masukan Username">
                                  @error('username')
                                    <small class="text-left text-danger">{{ $message }}</small>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password" name="password" id="password" placeholder="Masukan Password">
                                  @error('password')
                                    <small class="text-left text-danger">{{ $message }}</small>
                                  @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">
                                    Masuk <i class="fas fa-sign-in-alt"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-12 mt-5">
                            <small>Copyrigth &copy; 2020 <a href="https://www.instagram.com/benditandayusaputra_/">Bendi Tandayu Saputra</a> made with <i class="fas fa-heart text-danger"></i></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>