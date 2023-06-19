<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
</head>
<body class="font-poppins">

  <nav>
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="justify-items-end">
          <div class="flex-shrink-0">
            <span class="font-bold text-[24px]">My <span class="text-secondary">Notes.</span></span>
          </div>
        </div>
        <div class="ml-auto">
          <div class="flex">
            <p class="font-bold p-4 text-xl">Hello, {{ $user->name }}</p>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
              <div class="px-[35px] py-[16px] bg-secondary rounded-lg">
                <p class="text-white">Logout</p>
              </div>
            </a>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
          </form>
        </div>
      </div>
    </div>
  </nav>
  
  

    <div class="flex flex-row">
        <div class="container w-1/2  flex flex-col">

        @foreach ($notes as $note)
            <div class="bg-body w-2/3 mx-auto p-12 m-2 rounded-lg hover:bg-secondary" data-note-id="{{ $note->notes_id }}">
                <div id="noteListTitle" class="font-bold text-2xl">{{ $note->title }}</div><br>
                <div id="noteListDate" class="text-gray">{{ $note->date }}</div> <br>
                <div id="noteListBody" class="text-gray truncate">{!! $note->body !!}</div> <br>
            </div>
        @endforeach

        </div>

      <div class="container w-1/2">
          <div class="m-16">
            <img class="max-w-[400px] mx-auto" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Homepage.png">
            <p class="font-bold text-center text-[32px] pt-12">Capture Your Ideas and Thoughts!</p>
          </div>
          
          <div id="rightContent">

          </div>
          
          <div class="flex float-right">
            <a href="{{ url('add') }}">
              <button class="bg-body rounded-full p-[20px] hover:bg-secondary">
                    <img class="max-w-[31px] mx-auto" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Add%20Black.png">
              </button>
            </a>
          </div>
          
            <div class="flex items-center justify-center">
              <div id="buttonContainer" class="hidden">
                <button id="deleteButton" type="button" class="px-[55px] py-[16px] bg-red rounded-lg">
                  <div class="flex">
                    <img class="w-[18px] h-[18px]" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Delete.png">
                    <p class="text-white font-bold px-2">Delete</p>
                  </div>
                </button>
                <button id="saveButton" type="button" class="px-[55px] py-[16px] bg-secondary rounded-lg">
                  <div class="flex">
                    <img class="w-[18px] h-[18px]" src="https://raw.githubusercontent.com/LynnArsa/my-notes/main/public/Save.png">
                    <p class="text-white font-bold px-2">Save</p>
                  </div>
                </button>
              </div>
            </div>
        </div>
      </div>
    

<script>
document.addEventListener("DOMContentLoaded", function () {
      const bgBodyElements = document.querySelectorAll(".bg-body");
      const rightContent = document.getElementById("rightContent");
      const buttonContainer = document.getElementById("buttonContainer");
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

            const ckeditor = document.createElement("div");
            bodyElement.setAttribute("id", "editor");

            return [titleElement, dateElement, bodyElement, ckeditor];
      }

      function clearRightContent() {
            rightContent.innerHTML = "";
      }

      function selectNoteElement(element) {
            if (selectedElement !== null) {
                  selectedElement.classList.remove("bg-secondary");
                  selectedElement.classList.remove("text-white");
            }
            element.classList.add("bg-secondary");
            element.classList.add("text-white");
            selectedElement = element;
      }

      function fetchNoteContent(noteId) {
            fetch(`/notes/${noteId}`)
                  .then((response) => response.json())
                  .then((note) => {
                        clearRightContent();
                        const noteElements = createNoteElements(note);
                        noteElements.forEach((element) => rightContent.appendChild(element));

                        ClassicEditor.create(document.querySelector("#editor"))
                              .then((editor) => {
                                    console.log(editor);
                              })
                              .catch((error) => {
                                    console.error(error);
                              });

                        // Reattach event listeners to the new elements
                        const titleElement = rightContent.querySelector(".font-bold");
                        titleElement.addEventListener("input", handleNoteInput);
                        document.querySelector( `[data-note-id="${noteId}"] > #noteListDate`).innerText = note.date;
                  })
                  .catch((error) => console.error("Error:", error));
      }

      function saveNoteContent(noteId, title, body) {
            fetch(`/notes/${noteId}`, {
                  method: "PUT",
                  headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                  },
                  body: JSON.stringify({ title, body }),
            })
                  .then((response) => response.json())
                  .then((data) => {
                        console.log(data);
                        // Update the note data on the client-side
                        const titleElement = rightContent.querySelector(".font-bold");
                        const bodyElement = rightContent.querySelector("div:nth-child(3)");

                        titleElement.textContent = data.title;
                        bodyElement.textContent = data.body;

                        // Perform any necessary actions after saving
                  })
                  .catch((error) => console.error("Error:", error));
      }

      function deleteNoteElement(noteId) {
            fetch(`/notes/${noteId}`, {
                  method: "DELETE",
                  headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                  },
            })
                  .then((response) => response.json())
                  .then((data) => {
                        console.log(data);
                        // Remove the note element from the sidebar
                        const noteElement = document.querySelector(`[data-note-id="${noteId}"]`);
                        noteElement.remove();

                        // Clear the right content
                        clearRightContent();
                  })
                  .catch((error) => console.error("Error:", error));
      }

      function handleNoteClick(element) {
            buttonContainer.style.display = "inline-block";
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

      bgBodyElements.forEach((element) => {
            element.addEventListener("click", () => handleNoteClick(element));
      });

      deleteButton.addEventListener("click", handleDeleteButtonClick);

      const saveButton = document.getElementById("saveButton");
      saveButton.addEventListener("click", () => {
            if (selectedElement !== null) {
                  const noteId = selectedElement.dataset.noteId;
                  const editedTitle = rightContent.querySelector(".font-bold").textContent;
                  const editedDate = rightContent.querySelector(".font-bold").textContent;
                  const editedBody = rightContent.querySelector("div > div > div > div > p").innerHTML;

                  document.querySelector(
                        `[data-note-id="${noteId}"] > #noteListTitle`).innerText = editedTitle;
                  document.querySelector(
                        `[data-note-id="${noteId}"] > #noteListBody`).innerText = editedBody;
                  saveNoteContent(noteId, editedTitle, editedBody);
                  fetchNoteContent(noteId);
            }
      });
});

</script>
</body>
</html>
