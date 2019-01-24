@foreach($cards as $card)
    <div class="alert alert-primary" role="alert" data-target="{{'#openModal'.$card->id}}" data-toggle="modal"
         style="cursor: pointer;">
        {{ $card->title }}


    </div>

    <!-- Modal -->
    <div class="modal fade" id="{{'openModal'.$card->id}}" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title" contenteditable="true">{{ $card->title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{ route('delete.card') }}" method="post">
                        @csrf
                        <input name="card_id" hidden value="{{ $card->id }}">
                        <button type="submit" class="close" aria-label="Close">
                            <span aria-hidden="true">delete this card&times;</span>
                        </button>
                    </form>

                    <div class="d-flex flex-wrap" style="margin: 10px 0px 10px 0px;">
                        <form id="ajax-form" method="POST">
                            @csrf
                            <input name="card_id" hidden value="{{ $card->id }}">
                            <h7>Status
                                <select name="status_id" class="js-single-status form-control"
                                        style="width: 150px"></select>
                            </h7>

                            <h7 style="padding-left: 10px">Role
                                <select name="role_id" class="js-single-role form-control"
                                        style="width: 100px"></select>
                            </h7>

                            <button type="submit" class="btn btn-success" style="margin-left: 20px">
                                Save change
                            </button>
                        </form>

                    </div>

                    <div>
                        @foreach($card->tags as $tag)
                            <button type="button" class="btn btn-info">{{ $tag->tag }}</button>
                        @endforeach
                    </div>
                    <div>
                        <h3>Description</h3>
                        <p class="text-justify" id="description" contenteditable="true">{{ $card->description }}</p>
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
                                        <footer class="blockquote-footer">add to <cite
                                                    title="Source Title">{{ $comment->created_at }}</cite></footer>
                                    </blockquote>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <form action="{{ route('create.comment') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">add comments...</label>
                            <input hidden name="user_id" value="{{ Auth::user()->id }}">
                            <input hidden name="card_id" value="{{ $card->id }}">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="comment"
                                      rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script>

        $(".js-single-status").select2({
            placeholder: {
                text: '{{ $card->status->status }}'
            },
            ajax: {
                url: 'statuses/find/',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true,
            }
        });

        $(".js-single-role").select2({
            placeholder: {
                text: '{{ $card->role->role }}'
            },
            ajax: {
                url: 'roles/find/',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true,
            }
        });

        var card_id = '{{ $card->id }}';

    </script>

@endforeach

<script>
    $(document).ready(function () {
        $('#ajax-form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'card/update/',
                data: $('#ajax-form').serialize(),
                success: function (result) {
                    console.log(result);
                }
            });
        });
    });
</script>

<script>
    var contentold = {};

    function savedata(elementidsave, contentsave) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'card/update/',
            type: 'POST',
            data: {
                new_value: contentsave,
                name: elementidsave,
                id: card_id

            },
            success: function (data) {
                if (data == contentsave) {
                    $('#' + elementidsave).html(data);
                    $('<div id="status">Данные успешно сохранены:' + data + '</div>')
                        .insertAfter('#' + elementidsave)
                        .addClass("success")
                        .fadeIn('fast')
                        .delay(1000)
                        .fadeOut('slow', function () {
                            this.remove();
                        });

                }
            }
        });
    }

    $(document).ready(function () {
        $('[contenteditable="true"]')
            .mousedown(function (e) {
                e.stopPropagation();
                elementid = this.id;
                contentold[elementid] = $(this).html();
                $(this).bind('keydown', function (e) {
                    if (e.keyCode == 27) {
                        e.preventDefault();
                        $(this).html(contentold[elementid]);
                    }
                });

            })
            .blur(function (event) {
                var elementidsave = this.id;
                var contentsave = $(this).html();
                event.stopImmediatePropagation();
                if (elementid === elementidsave) {
                    $("#save").hide();
                }
                if (contentsave != contentold[elementidsave]) {
                    savedata(elementidsave, contentsave);
                }
            });
    });
</script>