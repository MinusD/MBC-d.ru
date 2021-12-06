<?php

namespace App\Http\Livewire\Landing\Service\Materials;

use Livewire\Component;

class BookReader extends Component
{
    public $path;

    public function mount($book){
        switch ($book){
            case 'fizika-chertov':
                $this->path = 'Физика. Чертов.pdf';
                break;
            case 'angliyskiy-shevtsova':
                $this->path = 'Английский для технический вузов.pdf';
                break;
            case 'fizika-irodov':
                $this->path = 'Физика. Иродов.pdf';
                break;
            default:
                dd("Файл не найден");
        }
//        dd($book);
    }

    public function render()
    {
        return view('livewire.landing.service.materials.book-reader')->layout('layouts.landing');
    }
}
