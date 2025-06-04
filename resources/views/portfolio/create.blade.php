<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Portfolio Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('fontawesome/css/all.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <style>
        .form-container {
            max-width: 800px;
            margin: 5rem auto;
            padding: 2.5rem;
        }
        .form-label {
            color: var(--text-gray-300);
            margin-bottom: 0.5rem;
        }
        .form-control {
            background-color: #1F2937;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            padding: 0.75rem;
            color: var(--text-gray-100);
            width: 100%;
            transition: all 0.2s ease-in-out;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--blue-500);
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
        }
        .add-more-btn {
            background-color: var(--blue-500);
            color: white;
            border: none;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            margin-top: 0.5rem;
            transition: background-color 0.3s ease;
        }
        .add-more-btn:hover {
            background-color: var(--blue-600);
            color: white;
        }
        .remove-btn {
            background-color: var(--red-500);
            color: white;
            border: none;
            border-radius: 0.25rem;
            padding: 0.5rem 1rem;
            margin-top: 0.5rem;
            margin-left: 0.5rem;
            transition: background-color 0.3s ease;
        }
        .remove-btn:hover {
            filter: brightness(0.9);
            color: white;
        }
        .btn-submit {
            margin-top: 1.5rem;
            width: auto;
            padding: 0.75rem 2rem;
        }
    </style>
</head>
<body>
    <div class="main-content-wrapper">
        <div class="form-container card-glassmorphism">
            <h1 class="gradient-text text-center mb-5">Create New Portfolio Project</h1>
            <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="title" class="form-label">Project Title <span class="text-red-500">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="e.g., Enterprise Resource Planning System" required>
                </div>

                <div class="mb-4">
                    <label for="overview" class="form-label">Overview <span class="text-red-500">*</span></label>
                    <textarea class="form-control" id="overview" name="overview" rows="3" placeholder="A brief summary of the project and its purpose." required></textarea>
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Project Description <span class="text-red-500">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Detailed description of the project, functionalities, and technologies." required></textarea>
                </div>

                <div class="mb-4">
                    <label for="problem_solved" class="form-label">Problem Solved <span class="text-red-500">*</span></label>
                    <textarea class="form-control" id="problem_solved" name="problem_solved" rows="4" placeholder="Explain the problem the project addresses and how it solves it." required></textarea>
                </div>

                <div class="mb-4">
                    <label for="my_Role" class="form-label">My Role <span class="text-red-500">*</span></label>
                    <input type="text" class="form-control" id="my_Role" name="my_Role" placeholder="e.g., Backend Developer, Full-stack Developer" required>
                </div>

                <div class="mb-4">
                    <label for="link_video" class="form-label">Project Video Link (YouTube/Vimeo embed URL)</label>
                    <input type="text" class="form-control" id="link_video" name="link_video" placeholder="e.g., https://www.youtube.com/embed/YOUR_VIDEO_ID">
                </div>

                <div class="mb-4">
                    <label for="image_cover" class="form-label">Project Cover Image</label>
                    <input type="file" class="form-control" id="image_cover" name="image_cover">
                    <small class="text-gray-400">Upload a single image for project thumbnail/cover.</small>
                </div>

                <div class="mb-4">
                    <label class="form-label">Technologies Used <span class="text-red-500">*</span></label>
                    <div id="technologies-container">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="technologies[]" placeholder="e.g., Laravel" required>
                            <button type="button" class="btn btn-secondary add-more-btn" onclick="addInputField('technologies')">Add More</button>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Key Features <span class="text-red-500">*</span></label>
                    <div id="key-features-container">
                        <div class="input-group mb-2">
                            <textarea class="form-control" name="key_features[]" rows="2" placeholder="e.g., Integrated Financial Management" required></textarea>
                            <button type="button" class="btn btn-secondary add-more-btn" onclick="addInputField('key-features', true)">Add More</button>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Project Links</label>
                    <div id="project-links-container">
                        <div class="input-group mb-2 project-link-row">
                            <input type="text" class="form-control flex-grow-1" name="link_name[]" placeholder="Link Name (e.g., GitHub Repo)">
                            <input type="url" class="form-control flex-grow-2 ms-2" name="project_links[]" placeholder="Link URL (e.g., https://github.com/user/repo)">
                            <button type="button" class="btn btn-secondary add-more-btn ms-2" onclick="addProjectLinkField()">Add More</button>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Additional Project Images (Gallery)</label>
                    <div id="images-container">
                        <div class="input-group mb-2">
                            <input type="file" class="form-control" name="images_gallery[]">
                            <button type="button" class="btn btn-secondary add-more-btn" onclick="addInputField('images', false, true)">Add More</button>
                        </div>
                    </div>
                    <small class="text-gray-400">Upload multiple images for the project gallery.</small>
                </div>

                <button type="submit" class="btn btn-gradient btn-submit">Create Project</button>
                <a href="index.html" class="btn btn-secondary ms-3 btn-submit">Cancel</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>

    <script>
        // Generic function to add input fields
        function addInputField(containerId, isTextArea = false, isFile = false) {
            const container = document.getElementById(containerId + '-container');
            const newDiv = document.createElement('div');
            newDiv.classList.add('input-group', 'mb-2');

            let inputElement;
            if (isTextArea) {
                inputElement = document.createElement('textarea');
                inputElement.rows = 2;
                inputElement.placeholder = containerId === 'key-features' ? 'e.g., Integrated Financial Management' : '';
            } else if (isFile) {
                 inputElement = document.createElement('input');
                 inputElement.type = 'file';
            } else {
                inputElement = document.createElement('input');
                inputElement.type = 'text';
                inputElement.placeholder = containerId === 'technologies' ? 'e.g., React' : '';
            }

            inputElement.classList.add('form-control');
            inputElement.name = containerId === 'images' ? 'images_gallery[]' : containerId + '[]';
            inputElement.required = true;

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-danger', 'remove-btn');
            removeButton.innerHTML = '<i class="fas fa-times"></i>';
            removeButton.onclick = function() {
                container.removeChild(newDiv);
            };

            newDiv.appendChild(inputElement);
            newDiv.appendChild(removeButton);
            container.appendChild(newDiv);
        }

        // Specific function for Project Links to add both name and URL
        function addProjectLinkField() {
            const container = document.getElementById('project-links-container');
            const newDiv = document.createElement('div');
            newDiv.classList.add('input-group', 'mb-2', 'project-link-row');

            const linkNameInput = document.createElement('input');
            linkNameInput.type = 'text';
            linkNameInput.classList.add('form-control', 'flex-grow-1');
            linkNameInput.name = 'link_name[]';
            linkNameInput.placeholder = 'Link Name (e.g., GitHub Repo)';

            const linkUrlInput = document.createElement('input');
            linkUrlInput.type = 'url';
            linkUrlInput.classList.add('form-control', 'flex-grow-2', 'ms-2');
            linkUrlInput.name = 'project_links[]';
            linkUrlInput.placeholder = 'Link URL (e.g., https://github.com/user/repo)';

            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-danger', 'remove-btn', 'ms-2');
            removeButton.innerHTML = '<i class="fas fa-times"></i>';
            removeButton.onclick = function() {
                container.removeChild(newDiv);
            };

            newDiv.appendChild(linkNameInput);
            newDiv.appendChild(linkUrlInput);
            newDiv.appendChild(removeButton);
            container.appendChild(newDiv);
        }

        document.addEventListener('DOMContentLoaded', () => {
             // Setup initial repeatable fields with remove buttons where appropriate
             const repeatableSections = [
                { id: 'technologies', inputType: 'text', placeholder: 'e.g., Laravel' },
                { id: 'key-features', inputType: 'textarea', placeholder: 'e.g., Integrated Financial Management' },
                // project-links is handled by its specific function
                { id: 'images', inputType: 'file', placeholder: '' }
             ];

             repeatableSections.forEach(section => {
                const container = document.getElementById(section.id + '-container');
                const firstInputGroup = container.querySelector('.input-group');
                const addMoreButton = firstInputGroup.querySelector('.add-more-btn');

                if (addMoreButton) {
                    const removeButton = document.createElement('button');
                    removeButton.type = 'button';
                    removeButton.classList.add('btn', 'btn-danger', 'remove-btn', 'ms-2');
                    removeButton.innerHTML = '<i class="fas fa-times"></i>';
                    removeButton.onclick = function() {
                        // Keep at least one field if required, otherwise remove.
                        // For simplicity, we'll keep one if it's the only one left, and clear it.
                        if (container.children.length > 1) {
                            container.removeChild(firstInputGroup);
                        } else {
                            const inputField = firstInputGroup.querySelector('.form-control');
                            if (inputField) {
                                inputField.value = '';
                                if (inputField.type === 'file') {
                                    inputField.type = 'text'; // Change type to clear
                                    inputField.type = 'file'; // Change back
                                }
                            }
                        }
                    };
                    firstInputGroup.appendChild(removeButton);
                    addMoreButton.classList.add('ms-2'); // Add margin to Add More button
                }
            });

            // Set up the initial Project Links field
            const projectLinksContainer = document.getElementById('project-links-container');
            const initialProjectLinkAddBtn = projectLinksContainer.querySelector('.add-more-btn');
            if (initialProjectLinkAddBtn) {
                // Remove the default add button and replace it with a remove button
                const firstProjectLinkRow = projectLinksContainer.querySelector('.project-link-row');
                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('btn', 'btn-danger', 'remove-btn', 'ms-2');
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                removeButton.onclick = function() {
                    if (projectLinksContainer.children.length > 1) {
                        projectLinksContainer.removeChild(firstProjectLinkRow);
                    } else {
                        firstProjectLinkRow.querySelector('input[name="link_name[]"]').value = '';
                        firstProjectLinkRow.querySelector('input[name="project_links[]"]').value = '';
                    }
                };
                firstProjectLinkRow.appendChild(removeButton);
                initialProjectLinkAddBtn.onclick = addProjectLinkField; // The original Add More now just calls the function
            }
        });
    </script>
</body>
</html>
