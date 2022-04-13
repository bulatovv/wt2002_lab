<div class="cards-container mb-5">
    <div class="row row-cols-2 row-cols-sm-3 g-5">
        @foreach ($items as $item)
            @include('item_card')
        @endforeach
    </div>
</div>

@foreach ($items as $item)
    @include('item_modal')
@endforeach
