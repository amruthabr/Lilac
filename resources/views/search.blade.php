<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
        }

        h2 {
            padding-left: 20px;
            margin-bottom: 15px;
            color: #333;
        }
        h3 {
            margin-bottom: 15px;
            color: #333;
        }
        
        
        .gray-box {
            background-color: #e0e0e0; /* Light gray background */
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .search-container {
            margin: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .search-container input {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }

        .user-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin: 20px;
        }

        .user-card {
            background-color: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .user-card h3 {
            margin: 0;
            color: #333;
        }

        .user-card p {
            color: #777;
        }
    </style>
</head>

<body>
    <div class="gray-box">
        <h2>Search</h2>
        <div class="search-container">
            <form method="GET" action="{{ route('search') }}" id="search-form">
                
                <input type="text" id="search-input" name="query" value="{{ request('query') }}" placeholder="Search by name, designation, or department" autocomplete="off">
            </form>
        </div> 
        <div class="search-list" id="search-list">
            @include('search_list');
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
        $(document).ready(function () {
            $('#search-input').on('input', function () {
                var query = $(this).val();
                if(query !=''){
                $.ajax({
                    url: '{{ route("search") }}',
                    method: 'GET',
                    data: { query: query },
                    success: function (response) {
                        $('#search-list').html(response);
                    }
                });
                }else{
                      location.reload();
                      
                  }
            });

            $('#search-input').on('keypress', function (e) {
                if (e.which == 13) { 
                    e.preventDefault(); 
                    var query = $(this).val();
                    if(query !=''){
                    $.ajax({
                        url: '{{ route("search") }}',
                        method: 'GET',
                        data: { query: query },
                        success: function (response) {
                            $('#search-list').html(response);
                        }
                    });
                  }else{
                      location.reload();
                      
                  }
                }
            });

           
        });
    </script>

</body>
</html>
