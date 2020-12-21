<div class="container-fluid py-5">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-12 mx-auto">
            <div class="card shadow-lg">
                <div class="card-body">
                 <form wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="text-center text-dark">Kritik & Saran Untuk Periode 2019/2020</h3>
                        </div>
                        <div class="col-12 mt-2">
                                <div class="form-group">
                                    <textarea id="aspiration" wire:model="aspiration" class="form-control" name="aspiration" rows="3" placeholder="Masukan Kritik & Saran Anda Di Sini" required></textarea>
                                </div>
                        </div>
                        <div class="col-12 mt-5">
                            <h4 class="text-center text-dark">Kritik & Saran Teman - Teman</h4>
                            <div class="row mt-3">
                                @foreach ($aspirations as $aspiration)
                                    <div class="col-2 text-center text-dark border-left">{{ $loop->iteration }}.</div>
                                    <div class="col-10">{{ $aspiration->aspiration }}</div>
                                @endforeach
                            </div>
                        </div>
                    	<div class="col-12 mt-5">
                            <h3 class="text-center text-dark">Aspirasi Untuk Periode 2020/2021</h3>
                        </div>
                        <div class="col-12 mt-2">
                                <div class="form-group">
                                    <textarea id="critic" wire:model="critic" class="form-control" name="critic" rows="3" placeholder="Masukan Aspirasi Anda Di Sini" required></textarea>
                                </div>
                        </div>
                        <div class="col-12 mt-5">
                            <h4 class="text-center text-dark">Aspirasi Teman - Teman</h4>
                            <div class="row mt-3">
                                @foreach ($aspirations as $aspiration)
                                    <div class="col-2 text-center text-dark border-left">{{ $loop->iteration }}.</div>
                                    <div class="col-10">{{ $aspiration->critic }}</div>
                                @endforeach
                            </div>
                        </div>
                    <div class="col-12 mt-5">
                    	<button type="submit" class="btn btn-block btn-primary bg-app">Submit</button>
                    </div>
                    </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>