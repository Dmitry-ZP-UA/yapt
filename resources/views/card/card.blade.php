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
                <h5 class="modal-title" id="exampleModalLongTitle">{{ $card->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form action="{{ route('delete.card') }}" method="post">
                    @csrf
                    <input name="id" hidden value="{{ $card->id }}">
                    <button type="submit"  class="close" aria-label="Close">
                        <span aria-hidden="true">delete this card&times;</span>
                    </button>
                </form>

                <h7>В колонке
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">В процессе</a>
                </h7>
                <div>
                    @foreach($card->tags as $tag)
                            <button type="button" class="btn btn-info">{{ $tag->tag }}</button>
                    @endforeach
                </div>
                <div>
                    <h3>Description</h3>
                    <p class="text-justify">{{ $card->description }}</p>
                </div>

                <div>
                    <h3>Comments:</h3>
                    @foreach($card->comments as $comment)
                    <div class="card">
                        <div class="card-header">
                            {{ $comment->user->first_name }}
                            {{ $comment->user->last_name }}
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <h5>{{ $comment->comment }}</h5>
                                <footer class="blockquote-footer">add to <cite title="Source Title">{{ $comment->created_at }}</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                    @endforeach
                </div>

                <form action="{{ route('create.comment') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">add comments...</label>
                        <input  hidden name="user_id" value="{{ Auth::user()->id }}">
                        <input  hidden name="card_id" value="{{ $card->id }}">
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>

@endforeach

