@extends('layouts.app')

@section('title', 'Content Writer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Content Writer
                    <span id="update_banner"></span>
                </div>
                {{ Form::textarea('content', NULL, ['id'=>'content']) }}
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
    <script type="text/javascript">
        jQuery(document).ready(function() {

            // initialize contents
            refreshContents();

            var saveLoop = setInterval(function() {
                saveContents();
            }, 10000);

            function saveContents()
            {
                $("#update_banner").text("Saving ...");

                $.ajax({
                    url: "{{route('contentWriterSave', $resource_id)}}",
                    method: 'POST',
                    data: {
                        contents: $("#content").val(),
                        _token: "{{csrf_token()}}"
                    },
                    success: function(data) {
                        $("#update_banner").text("Saved!");
                    },
                    error: function(e) {
                        $("#update_banner").text("Error saving!");
                    }
                }).done(function(data) {
                    setTimeout(function()
                    {
                        $("#update_banner").text('');
                    }, 1000);
                });
            } // end function saveContents

            function refreshContents()
            {
                $("#update_banner").text("Loading ...");

                 $.ajax({
                    url: "{{route('contentWriterLoad', $resource_id)}}",
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        _token: "{{csrf_token()}}"
                    },
                    success: function(data) {
                        $("#update_banner").text("Loaded!");
                    },
                    error: function(e) {
                        console.log(e);
                        $("#update_banner").text("Error loading!");
                    }
                }).done(function(data) {
                    $("#content").val(data['contents']);

                    setTimeout(function()
                    {
                        $("#update_banner").text('');
                    }, 1000);
                });
            } // end function refreshContents
        });
    </script>
@endsection