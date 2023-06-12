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
                  <button id="deleteButton" type="button">Delete</button>
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
    const titleElement = document.createElement("p");
    titleElement.classList.add("font-bold", "text-2xl");
    titleElement.textContent = note.title;
    titleElement.contentEditable = "true";

    const dateElement = document.createElement("div");
    dateElement.classList.add("mb-4");
    dateElement.textContent = note.date;

    const bodyElement = document.createElement("div");
    bodyElement.textContent = note.body;
    bodyElement.contentEditable = "true";

    return [titleElement, dateElement, bodyElement];
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

        // Reattach event listeners to the new elements
        const titleElement = rightContent.querySelector(".font-bold");
        const bodyElement = rightContent.querySelector("div:nth-child(3)");
        titleElement.addEventListener("input", handleNoteInput);
        bodyElement.addEventListener("input", handleNoteInput);
      })
      .catch(error => console.error("Error:", error));
  }

  function saveNoteContent(noteId, title, body) {
    fetch(`/notes/${noteId}`, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": '{{ csrf_token() }}',
      },
      body: JSON.stringify({ title, body }),
    })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        // Update the note data on the client-side
        const titleElement = rightContent.querySelector(".font-bold");
        const bodyElement = rightContent.querySelector("div:nth-child(3)");

        titleElement.textContent = data.title;
        bodyElement.textContent = data.body;

        // Perform any necessary actions after saving
      })
      .catch(error => console.error("Error:", error));
  }

  function deleteNoteElement(noteId) {
    fetch(`/notes/${noteId}`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": '{{ csrf_token() }}',
      },
    })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        // Remove the note element from the sidebar
        const noteElement = document.querySelector(`[data-note-id="${noteId}"]`);
        noteElement.remove();

        // Clear the right content
        clearRightContent();
      })
      .catch(error => console.error("Error:", error));
  }

  function handleNoteClick(element) {
    selectNoteElement(element);
    const noteId = element.dataset.noteId;
    fetchNoteContent(noteId);
  }

  function handleNoteInput() {
    const saveButton = document.getElementById("saveButton");
    saveButton.disabled = false;
  }

  function handleDeleteButtonClick() {
    if (selectedElement !== null) {
      const noteId = selectedElement.dataset.noteId;
      deleteNoteElement(noteId);
    }
  }

  bgBodyElements.forEach(element => {
    element.addEventListener("click", () => handleNoteClick(element));
  });

  deleteButton.addEventListener("click", handleDeleteButtonClick);

  const saveButton = document.getElementById("saveButton");
  saveButton.addEventListener("click", () => {
    if (selectedElement !== null) {
      const noteId = selectedElement.dataset.noteId;
      const editedTitle = rightContent.querySelector(".font-bold").textContent;
      const editedBody = rightContent.querySelector("div:nth-child(3)").textContent;
      saveNoteContent(noteId, editedTitle, editedBody);
      saveButton.disabled = true;
    }
  });
});

</script>
</body>
</html>
