<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow-lg">
                <div class="form-group">
                    <label>Foto Calon</label>
                    <input type="file" class="form-control-file" id="photo" wire:change="$emit('photoChoosen')">
                    @if ($photo)
                        <img src="{{ $photo }}" alt="Photo Upload" width="200px" class="mt-2">
                    @endif
                </div>
                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="chairman_name">Nama Calon Ketua Osis</label>
                        <input type="text" class="form-control" wire:model="chairman_name" id="chairman_name" placeholder="Masukan Nama Lengkap Calon Ketua Osis">
                        @error('chairman_name')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="vice_chairman_name">Nama Calon Wakil Ketua Osis</label>
                        <input type="text" class="form-control" wire:model="vice_chairman_name" id="vice_chairman_name" placeholder="Masukan Nama Lengkap Calon Wakil Ketua Osis">
                        @error('vice_chairman_name')
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
</div>

@section('jsLoad')
    <script>
        $('#menu-candidate').addClass('selected')
        $('#mision').val('')
        $('#vision').val('')
        $('#photo').val('')

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
@endsection