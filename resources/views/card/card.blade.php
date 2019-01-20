@foreach($cards as $card)
    <div class="alert alert-primary" role="alert" data-target="{{'#openModal'.$card->id}}" data-toggle="modal"
         style="cursor: pointer;">
        {{ $card->title }}
    </div>


<!-- Modal -->
<div class="modal fade" id="{{'openModal'.$card->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($card->tags as $tag)
                    <span>{{ $tag->tag }}</span>
                @endforeach
            </div>

        </div>
    </div>
</div>

@endforeach