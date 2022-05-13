<div class="cards-container">
    <div class="row row-cols-2 row-cols-sm-3 g-5 mx-lg-auto">
        @foreach ($items as $item)
            <x-item-card :item="$item" />
        @endforeach
    </div>
</div>

@foreach ($items as $item)
    <x-item-modal :item="$item" />
@endforeach
