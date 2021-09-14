<div>
    <div x-data="{ show: false }" class="transition ">
        <button x-on:click="show= ! show" x-text="show ? 'Скрыть': 'Показать' ">
        </button>
{{--        <p x-show="show" > NO TRANSITION</p>--}}
        <p x-show="show" x-transition:enter="transition ease-out duration-200"
           x-transition:enter-start="transform opacity-0 scale-95"
           x-transition:enter-end="transform opacity-100 scale-100"
           x-transition:leave="transition ease-in duration-75"
           x-transition:leave-start="transform opacity-100 scale-100"
           x-transition:leave-end="transform opacity-0 scale-95">TRANSITION</p>

    </div>

    <x-button positive label="Positive" />
</div>
