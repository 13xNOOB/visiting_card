<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Visiting Cards</title>
    <!-- Include Bootstrap for styling and jQuery for AJAX -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #suggestion-box {
            position: absolute;
            z-index: 9999;
            width: calc(100% - 30px);
        }
        .suggestion-item {
            cursor: pointer;
            padding: 10px;
            background: white;
            border-bottom: 1px solid #ccc;
        }
        .suggestion-item:hover {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
    <div style="display: flex; justify-content: center; align-items: center;">
        <h1 style="margin-right: 20px;">Search Card</h1>
        
        <form action="{{URL::to('/dashboard')}}" method="get" style="margin-bottom: 0;">
            <button class="btn btn-success">Dashboard</button>                        
        </form>
    </div>
    <div class="container mt-5">
        <div class="autocomplete">
            <input id="searchInput" type="text" name="ownerName" class="form-control" placeholder="Search owner names...">
            <div id="suggestion-box" class="list-group"></div>
        </div>
    </div>

    <!-- jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: "{{ url('search') }}",
                        type: "GET",
                        data: {'query': query},
                        success: function(data) {
                            var suggestionBox = $('#suggestion-box');
                            suggestionBox.empty();
                            if (data.length) {
                                data.forEach(function(item) {
                                    suggestionBox.append('<div class="suggestion-item list-group-item" data-userid="'+item.id+'">' + item.ownerName+ '</div>');
                                });
                            } else {
                                suggestionBox.append('<div class="suggestion-item list-group-item">No results found</div>');
                            }
                        }
                    });
                } else {
                    $('#suggestion-box').empty();
                }
            });

            $(document).on('click', '.suggestion-item', function() {
                $('#searchInput').val($(this).text());
                $('#suggestion-box').empty();
            });

                $(document).on('click', '.suggestion-item', function() {
                var userId = $(this).data('userid');
                // alert(userId);
                var ownerName = $(this).text();
                $('#searchInput').val(ownerName);
                $('#suggestion-box').empty();

                // Redirect to the viewPdf route with the user_id
                window.location.href = "{{ url('searchresult') }}/" + userId;
            });

        });
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
