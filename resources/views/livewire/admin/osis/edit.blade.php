<div class="row">
    <div class="col-12">
        <div class="card shadow-lg">
            <div class="card-body">
                <div class="form-group">
                    <label>Foto OSIS</label>
                    <input type="file" class="form-control-file" id="photo" wire:change="$emit('photoChoosen')">
                    @if ( $newPhoto )
                        <img src="{{ $newPhoto }}" alt="Photo" width="250px" class="mt-2" />
                    @elseif ( $photo == 'default.png' )
                        <img src="{{ asset('src/assets/images/media/default.png') }}" width="250px" alt="Calon" />
                    @else 
                        <img src="{{ Storage::disk('public')->get($photo) }}" alt="Photo" width="250px" class="mt-2" />
                    @endif
                </div>
                <form wire:submit.prevent="update">
                    <div class="form-group">
                        <label for="chairman_name">Nama Ketua Osis</label>
                        <input type="text" class="form-control" wire:model="chairman_name" id="chairman_name" placeholder="Masukan Nama Lengkap Ketua Osis">
                        @error('chairman_name')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="vice_chairman_name">Nama Wakil Ketua Osis</label>
                        <input type="text" class="form-control" wire:model="vice_chairman_name" id="vice_chairman_name" placeholder="Masukan Nama Lengkap Wakil Ketua Osis">
                        @error('vice_chairman_name')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="moto">Moto</label>
                        <input type="text" class="form-control" wire:model="moto" id="moto" placeholder="Masukan Nama Lengkap Wakil Ketua Osis">
                        @error('moto')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group" wire:ignore>
                        <label for="vision">Visi</label>
                        <textarea id="vision" class="form-control" rows="3">{{ $vision }}</textarea>
                    </div>
                    <div class="form-group" wire:ignore>
                        <label for="mision">Misi</label>
                        <textarea id="mision" class="form-control" rows="3">{{ $mision }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary bg-app btn-rounded mt-3">
                        <i class="fas fa-save fa-fw"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <script src="{{ asset('src/ckeditor/ckeditor.js') }}"></script>
        <script>
            $('#mision').val(`<?= $mision ?>`)
            $('#vision').val(`<?= $vision ?>`)

            window.livewire.on('photoChoosen', () => {
                let inputPhoto  = document.getElementById('photo')
                let photo       = inputPhoto.files[0]
                let reader      = new FileReader()

                reader.onloadend = () => {
                    window.livewire.emit('photoUpload', reader.result)
                    window.livewire.emit('photoName', photo.name)
                }

                reader.readAsDataURL(photo)
            })
            
            CKEDITOR.replace('vision').on('change', function (e) {
                @this.set('vision', CKEDITOR.instances.vision.getData())
            })
            CKEDITOR.replace('mision').on('change', function (e) {
                @this.set('mision', CKEDITOR.instances.mision.getData())
            })
        </script>
    </div>
</div>

@section('jsLoad')
    <script>
        $('#menu-osis').addClass('selected')
    </script>
@endsection