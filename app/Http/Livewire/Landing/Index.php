<?php

namespace App\Http\Livewire\Landing;

use App\Config;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    public $config, $start, $finish, $routeLogin;

    public function mount()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->config = Config::first();
        if ($this->config) {
            $now = time();
            $open = strtotime($this->config->open);
            $close = strtotime($this->config->close);
            $this->start = date('M j, Y H:i:s', strtotime($this->config->open));
            $this->finish = date('M j, Y H:i:s', strtotime($this->config->close));
            $this->routeLogin = route('login.index');

            if (($now >= $open) && ($now <= $close)) {
                return redirect()->route('login.index');
            }
        }
    }

    public function render()
    {
        return view('livewire.landing.index');
    }
}
