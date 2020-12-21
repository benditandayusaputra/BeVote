<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body shadow-lg">
                <h3 class="text-dark mb-3">Tambah User</h3>
                <form wire:submit.prevent="save">
                    <div class="form-group">
                      <label for="nis">NIS/NIP</label>
                      <input type="text" wire:model="nis" class="form-control" name="nis" id="nis" placeholder="Masukan NIS/NIP">
                      @error('nis')
                        <small class="text-danger ml-1">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="name">Nama</label>
                      <input type="text" wire:model="name" class="form-control" name="name" id="name" placeholder="Masukan Nama">
                      @error('name')
                        <small class="text-danger ml-1">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="class">Kelas/Mapel</label>
                      <input type="text" wire:model="class" class="form-control" name="class" id="class" placeholder="Masukan Kelas/Mapel">
                      @error('class')
                        <small class="text-danger ml-1">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="gender">Jenis Kelamin</label>
                      <select wire:model="gender" class="form-control" name="gender" id="gender">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      @error('gender')
                        <small class="text-danger ml-1">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="user_type">Jabatan</label>
                      <select wire:model="user_type" class="form-control" name="user_type" id="user_type">
                        <option value="">-- Pilih Jabatan --</option>
                        <option value="SISWA">SISWA</option>
                        <option value="GURU">GURU</option>
                        <option value="STAF">STAF</option>
                      </select>
                      @error('user_type')
                        <small class="text-danger ml-1">{{ $message }}</small>
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