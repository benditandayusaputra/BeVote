@section('page', 'Edit Profile')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>Edit Profile</h3>
                <div class="form-group">
                    <label for="photo">Foto</label>
                    <input id="photo" wire:change="$emit('choosePhoto')" class="form-control-file mb-3" type="file" name="photo">
                    @if ( $newPhoto )
                        <img src="{{ $newPhoto }}" alt="Photo" width="200px">
                    @elseif( $photo == '' )
                        <img src="{{ asset('src/assets/images/media/icon-user-man.png') }}" alt="Admin" width="200px">
                    @else 
                        <img src="{{ Storage::disk('public')->get($photo) }}" alt="Photo" width="200px">
                    @endif
                </div>
                <form wire:submit.prevent="update">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" wire:model="name" class="form-control" name="name" id="name"placeholder="Masukan Nama">
                        @error('name')
                        <small class="ml-1 text-danger"> {{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" wire:model="username" class="form-control" name="username" id="username"placeholder="Masukan Username">
                        @error('username')
                        <small class="ml-1 text-danger"> {{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary bg-app">
                        <i class="fas fa-save fa-fw"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('jsLoad')
    <script>
        window.livewire.on('choosePhoto', function () {  
            let filePhoto = document.getElementById('photo').files[0]
            let reader    = new FileReader()

            reader.onloadend= () => {  
                window.livewire.emit('newPhoto', reader.result)
                window.livewire.emit('namePhoto', filePhoto.name)
            }

            reader.readAsDataURL(filePhoto)
        })
    </script>
@endsection