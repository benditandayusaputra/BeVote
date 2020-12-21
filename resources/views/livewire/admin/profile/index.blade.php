@section('page', 'Profile')

<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10 col-md-12 col-12">
        <div class="card shadow-lg">
            <div class="card-body">
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
                    <div class="col-12 text-center">
                        @if ( $profile->photo )
                            <img src="{{ Storage::disk('public')->get($profile->photo) }}" alt="Admin" width="150px" class="rounded-circle">
                        @else
                            <img src="{{ asset('src/assets/images/media/icon-user-man.png') }}" alt="Admin" width="150px">
                        @endif
                    </div>
                    <div class="col-12 border-top border-bottom p-3 mt-5">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-4">
                                <h5 class="text-dark">Username</h5>
                            </div>
                            <div class="col-lg-9 col-md-9 col-8">
                                <h5>: {{ $profile->username }}</h5>
                            </div>
                            <div class="col-lg-3 col-md-3 col-4">
                                <h5 class="text-dark">Nama</h5>
                            </div>
                            <div class="col-lg-9 col-md-9 col-8">
                                <h5>: {{ $profile->name }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary bg-app btn-block">
                                    <i class="fas fa-edit fa-fw"></i> Edit Profile
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('admin.profile.change_password') }}" class="btn btn-primary bg-app btn-block">
                                    Ganti Password <i class="fas fa-key fa-fw"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-1"></div>
</div>