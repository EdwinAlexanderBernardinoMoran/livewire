<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowPosts extends Component
{
    public $search = '';
    public $sort = 'id';
    public $direction = 'desc';

    // Para recibir informacion por la url crea una propiedad y un metodo mount para el parametro y asignalo a la propiedad
    #[On('render')]
    public function render()
    {
        $posts = Post::where('title', 'like', '%'. $this->search .'%')
                        ->Orwhere('content', 'like', '%'. $this->search .'%')
                        ->orderBy($this->sort, $this->direction)
                        ->get();
        return view('livewire.show-posts', compact('posts'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
