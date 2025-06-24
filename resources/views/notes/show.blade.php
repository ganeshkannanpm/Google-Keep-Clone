<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="container-fluid">
        <div class="row">

            <!-- Mobile Navbar -->
            <nav class="navbar navbar-dark bg-dark d-md-none">
                <div class="container-fluid">
                    <button class="navbar-toggler" id="mobileToggle" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <span class="navbar-brand mb-0 h1">Google Keep</span>
                </div>
            </nav>

            <div id="appWrapper" class="d-flex">
                <!-- Sidebar -->
                <div id="sidebar" class="sidebar bg-dark p-3">
                    <div class="d-none d-md-block">
                        <!-- Desktop Sidebar Toggle -->
                        <button style="font-size: 1.5rem;" id="sidebarToggle"
                            class="custom-btn btn btn-dark position-sticky z-3 d-none d-md-block">
                            ☰ <span class="no-hover ms-3 fs-4 mt-2 sidebar-title"> Google Keep</span>
                        </button>
                        <hr>
                    </div>

                    <a href="#" class="d-block mb-2"><span class="icon">📝</span><span class="text"> Notes</span></a>
                    <a href="#" class="d-block mb-2"><span class="icon">🔔</span><span class="text">
                            Reminders</span></a>
                    <a href="#" class="d-block mb-2"><span class="icon">➕</span><span class="text"> Create new
                            label</span></a>
                    <a href="#" class="d-block mb-2"><span class="icon">📥</span><span class="text"> Archive</span></a>
                    <a href="#" class="d-block mb-2"><span class="icon">🗑️</span><span class="text"> Trash</span></a>
                    <a href="#" class="d-block mb-2"><span class="icon">⚙️</span><span class="text"> Settings</span></a>
                    <a href="#" class="d-block mb-2"><span class="icon">❓</span><span class="text"> Help &
                            Feedback</span></a>
                    <hr>
                </div>

                <!-- Main Content -->
                <div class="flex-grow-1 p-4" id="mainContent">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                        <!-- Search Bar -->
                        <div class="flex-grow-1">
                            {{-- <input type="text" class="form-control bg-dark text-white"
                                placeholder="Search your notes" /> --}}
                            @include('layouts.navigation')
                        </div>
                    </div>
                    {{-- <h1 class="text-3xl text-white mb-2 font-bold text-center">My Notes</h1> --}}
                    
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Notes List -->
                    <div class="row ">
                        <div class="col">
                            <div class="note-card">
                                <h1 class="text-2xl font-bold">Title: {{$note->title}}</h1>
                                <p class="text-4xl mt-3">{{$note->note}}</p>
                                <div class="note-buttons">
                                    <a href="{{ route('notes.edit', $note->id)}}" class="note-edit-button">Edit</a>
                                    <a href="{{ route('notes.index', $note->id)}}" class="note-edit-button">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                //Toggle sidebar
                const sidebar = document.getElementById("sidebar");

                function toggleSidebar() {
                    sidebar.classList.toggle("collapsed");
                }

                document.getElementById("sidebarToggle").addEventListener("click", toggleSidebar);
                document.getElementById("mobileToggle").addEventListener("click", toggleSidebar);
            </script>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</x-app-layout>