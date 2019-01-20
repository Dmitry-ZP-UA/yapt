
<div class="modal fade" id="createCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create new card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form enctype="multipart/form-data" action="{{ route('create.card') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter title" required>
                        <small class="form-text text-muted">Title card</small>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description" >
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <select class="form-control js-example-tokenizer" name="tags[]" multiple="multiple" style="width: 100%"></select>
                    </div>
                    <div class="form-group">
                        <label>Assigned to</label>
                        <input class="form-control"  name="assigned_to" style="width: 100%">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<script>

    $( ".js-example-tokenizer" ).select2 ({
        tags : true ,
        tokenSeparators : [ ',' , ' ' ],
        ajax: {
            url: 'tags/find/',
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



$(".js-example-basic-hide-search").select2({
        minimumResultsForSearch: Infinity,
        ajax: {
            url: 'tags/find/',
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


</script>