<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePost extends Component
{
    public $open = false;

    #[Validate('required|max:10')]
    public $title;

    #[Validate('required|min:4')]
    public $content;

    public function render()
    {
        return view('livewire.create-post');
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){

        $this->validate();
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['title', 'content']);
        // Emitiendo eventos
        $this->dispatch('render');
        $this->dispatch('alert', ['icon' =>'success', 'title' => '¡Bien Hecho!', 'text' => 'El Post fue creado exitosamente!']);

        $this->open = false;
    }
}
