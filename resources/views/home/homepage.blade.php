<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App - Home</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="font-poppins">
    
    <h1 class="text-4xl font-bold mb-4">Welcome to the Notes App</h1>
    <div class="flex flex-row">
        <div class="container w-1/2  flex flex-col-reverse">

        @foreach ($notes as $note)
            <div class="bg-body w-2/3 mx-auto p-12 m-2 rounded-lg hover:bg-secondary" data-note-id="{{ $note->notes_id }}">
                <div class="font-bold text-2xl">{{ $note->title }}</div><br>
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
                    <a href="{{ url('add') }}">
                        <img src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Adds.png">
                    </a>
                </button>
                <div id="saveButtonContainer">
                  <button id="saveButton" type="button">Save</button>
                </div>

            </div>
        </div>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const bgBodyElements = document.querySelectorAll(".bg-body");
    const rightContent = document.getElementById("rightContent");
    let selectedElement = null;

    function createNoteElements(note) {
        const titleElement = createEditableElement("p", "font-bold text-2xl", note.title);
        const dateElement = createDivElement("mb-4", note.date);
        const bodyElement = createEditableElement("div", null, note.body);

        return [titleElement, dateElement, bodyElement];
    }

    function createEditableElement(tag, className, content) {
        const element = document.createElement(tag);
        if (className) {
            element.classList.add(className);
        }
        element.contentEditable = "true";
        element.textContent = content;
        return element;
    }

    function createDivElement(className, content) {
        const element = document.createElement("div");
        element.classList.add(className);
        element.textContent = content;
        return element;
    }

    function clearRightContent() {
        rightContent.innerHTML = "";
    }

    function selectNoteElement(element) {
        if (selectedElement !== null) {
            selectedElement.classList.remove("bg-secondary");
        }
        element.classList.add("bg-secondary");
        selectedElement = element;
    }

    function fetchNoteContent(noteId) {
        fetch(`/notes/${noteId}`)
            .then(response => response.json())
            .then(note => {
                clearRightContent();
                const noteElements = createNoteElements(note);
                noteElements.forEach(element => rightContent.appendChild(element));
            })
            .catch(error => console.error("Error:", error));
    }

    function handleNoteClick(element) {
        selectNoteElement(element);
        const noteId = element.dataset.noteId;
        fetchNoteContent(noteId);
    }

    bgBodyElements.forEach(element => {
        element.addEventListener("click", () => handleNoteClick(element));
    });
});

</script>
</body>
</html>
