<?php

namespace App\Livewire;

use Livewire\Component;

class ShowPosts extends Component
{

    // Para recibir informacion por la url crea una propiedad y un metodo mount para el parametro y asignalo a la propiedad
    public function render()
    {
        return view('livewire.show-posts');
    }
}
