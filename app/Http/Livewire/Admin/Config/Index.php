<?php

namespace App\Http\Livewire\Admin\Config;

use Livewire\Component;
use App\Config;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $config, $configId, $school_name, $school_slogan, $open, $close, $logo, $oldLogo, $logoName;
    public $listeners = [
        'logoUpload'    => 'handleLogoUpload',
        'logoName'      => 'handleLogoName'
    ];

    public function mount()
    {
        $config = Config::first();
        if ( $config ) {
            $this->config = $config;
            $this->configId = $config->id;
            $this->school_name = $config->school_name;
            $this->school_slogan = $config->school_slogan;
            $this->open = date('l, d-F-Y, H:i', strtotime($config->open));
            $this->close = date('l, d-F-Y, H:i', strtotime($config->close));
            $this->oldLogo = $config->logo;
        }
    }

    public function handleLogoName($logoName)
    {
        $this->logoName = $logoName;
    }

    public function handleLogoUpload($logo)
    {
        $this->logo = $logo;
    }

    public function storeLogo()
    {
        if ( $this->logo ) {
            Storage::disk('public')->put($this->logoName, $this->logo);
            return $this->logoName;
        } else {
            return null;
        }
    }

    public function save()
    {
        $logo = $this->storeLogo();
        $config = Config::find($this->configId);
        if ( $config ) {
            if ( $logo == null ) {
                $config->update([
                    'school_name' => $this->school_name,
                    'school_slogan' => $this->school_slogan,
                    'open' => date('Y-m-d H:i:s', strtotime($this->open)),
                    'close' => date('Y-m-d H:i:s', strtotime($this->close))
                ]);
            } else {
                $config->update([
                    'school_name' => $this->school_name,
                    'school_slogan' => $this->school_slogan,
                    'logo' => $logo,
                    'open' => date('Y-m-d H:i:s', strtotime($this->open)),
                    'close' => date('Y-m-d H:i:s', strtotime($this->close))
                ]);
            }
            session()->flash('success', 'Konfirgurasi Aplikasi Berhasil Di Simpan');
            return redirect()->route('admin.config.index');
        } else {
            if ( $logo == null ) {
                Config::create([
                    'school_name' => $this->school_name,
                    'school_slogan' => $this->school_slogan,
                    'logo' => null,
                    'open' => date('Y-m-d H:i:s', strtotime($this->open)),
                    'close' => date('Y-m-d H:i:s', strtotime($this->close))
                ]);
            } else {
                Config::create([
                    'school_name' => $this->school_name,
                    'school_slogan' => $this->school_slogan,
                    'logo' => $logo,
                    'open' => date('Y-m-d H:i:s', strtotime($this->open)),
                    'close' => date('Y-m-d H:i:s', strtotime($this->close))
                ]);
            }
            session()->flash('success', 'Konfigurasi Aplikasi Berhasil Di Simpan');
            return redirect()->route('admin.config.index');
            
        }
    }

    public function render()
    {
        return view('livewire.admin.config.index');
    }
}
