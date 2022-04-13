<div id="modal{{ $loop->iteration }}" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $item->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>{{ $item->description }}</p> 
                <img class="img-fluid mb-1" src="{{ asset('img/' . $item->image) }}"><br>
                <button type="button" class="btn btn-primary" 
                 data-bs-toggle="popover" title="Заголовок" 
                 data-bs-content="Дополнительная информация">
                    Раскрыть
                </button>
            </div>
        </div>
    </div>
</div>
