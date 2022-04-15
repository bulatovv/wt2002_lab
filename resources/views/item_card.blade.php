<div class="col">
    <div class="card h-100">
        <img class="card-img-top img-fluid" src="{{ asset('img/uploads/' . $item->image) }}"
         data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}">
        <div class="card-img-overlay">
            <div class="type">{{ $item->type }}</div>
        </div>
        <div class="card-body">
            <div class="card-title">{{ $item->name }}</div>
            <div class="card-text">
                {{ $item->description }}
            </div>
        </div>
    </div>
</div>
