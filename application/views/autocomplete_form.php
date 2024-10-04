<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,300,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() . '/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo base_url() . '/css/style.css' ?>">
    <title>Autocomplete Form</title>
    <style>
        .autocomplete-suggestions {
            list-style: none;
            padding: 0;
            margin: 0;
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
        }

        .autocomplete-suggestion {
            padding: 10px;
            cursor: pointer;
        }

        .autocomplete-suggestion:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>

    <div>
        <label for="autocompleteInput">Type to autocomplete:</label>
        <input type="text" id="autocompleteInput" name="autocompleteInput" oninput="showSuggestions()">
        <ul id="suggestionsList" class="autocomplete-suggestions"></ul>
    </div>

    <script>
        function showSuggestions() {
            var input = document.getElementById('autocompleteInput');
            var suggestionsList = document.getElementById('suggestionsList');

            // Clear previous suggestions
            suggestionsList.innerHTML = '';

            // Only trigger autocomplete when there is one character in the input
            if (input.value.trim().length === 1) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var suggestions = JSON.parse(xhr.responseText);

                        suggestions.forEach(function(suggestion) {
                            var li = document.createElement('li');
                            li.className = 'autocomplete-suggestion';
                            li.textContent = suggestion.item_name;
                            li.onclick = function() {
                                input.value = suggestion.item_name;
                                suggestionsList.innerHTML = ''; // Clear suggestions after selection
                            };
                            suggestionsList.appendChild(li);
                        });
                    }
                };

                xhr.open('GET', 'AutocompleteController/getAutocomplete?term=' + input.value, true);
                xhr.send();
            }
        }
    </script>

</body>

</html>