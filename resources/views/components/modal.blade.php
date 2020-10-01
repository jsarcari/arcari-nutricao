<div class="modal fade" id="modal-{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content background1">
            <div class="modal-header">
                <h5 class="modal-title">{{$modalTitle}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{$slot}}
        </div>
    </div>
</div>