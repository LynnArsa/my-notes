<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App - Home</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="font-poppins">
    
    <h1 class="text-4xl font-bold mb-4">Welcome to the Notes App</h1>
    <div class="flex flex-row">
        <div class="container w-1/2  flex flex-col-reverse">

        @foreach ($notes as $note)
            <div class="bg-body w-2/3 mx-auto p-12 m-2 rounded-lg hover:bg-secondary" data-note-id="{{ $note->notes_id }}">
                <p class="font-bold text-2xl">{{ $note->title }}</p><br>
                {{ $note->body }} <br>
                {{ $note->date }} <br>
            </div>
        @endforeach

        </div>

        <div class="container w-1/2" id="rightContainer">
            <div>
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_ShrsmB.json"  background="transparent"  speed="1"  style="width: 500px; height: 500px;"  loop  autoplay></lottie-player>
            </div>
            
            <div id="rightContent">
                
            </div>

            <div class="flex flex-col float-right">
                <button>
                <a href="{{ url('edit/{note}') }}">
                    <img src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Edits.png">
                </a>
                </button>
                <button>
                    <a href="{{ url('add') }}">
                        <img src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Adds.png">
                    </a>
                </button>
            </div>
        </div>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", function() {
    const bgBodyElements = document.querySelectorAll(".bg-body");
    const rightContent = document.getElementById("rightContent");
    let selectedElement = null;

    bgBodyElements.forEach(function(element) {
        element.addEventListener("click", function() {
            // Remove the previous active class from the previously selected element
            if (selectedElement !== null) {
                selectedElement.classList.remove("bg-secondary");
            }

            // Add the active class to the clicked element
            this.classList.add("bg-secondary");
            selectedElement = this;

            // Fetch the content from the server
            const noteId = this.dataset.noteId;
            fetch(`/notes/${noteId}`)
                .then(response => response.text())
                .then(content => {
                    // Remove any existing content in the right container
                    while (rightContent.firstChild) {
                        rightContent.removeChild(rightContent.firstChild);
                    }

                    // Append the fetched content to the right container
                    rightContent.innerHTML = content;
                })

                

                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
});
    </script>
</body>
</html>
