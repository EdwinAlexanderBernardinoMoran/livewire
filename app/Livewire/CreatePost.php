<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
    public $open = true;

    #[Validate('required|max:10')]
    public $title;

    #[Validate('required|min:4')]
    public $content;

    #[Validate('required|image|max:2048')]
    public $image;

    // #[Validate('required|image|max:2048')]
    // public $image;

    public function render()
    {
        return view('livewire.create-post');
    }

    // Validacion en tiempo real...
    // public function updated($propertyName){
    //     $this->validateOnly($propertyName);
    // }

    public function save()
    {
        $this->validate();

        $image = $this->image->store('posts');
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image
        ]);

        $this->reset(['title', 'content', 'image']);

        // Emitiendo eventos
        $this->dispatch('render');
        $this->dispatch('alert', ['icon' =>'success', 'title' => '¡Bien Hecho!', 'text' => 'El Post fue creado exitosamente!']);

        $this->open = false;
    }
}
