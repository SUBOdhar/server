<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directory Explorer</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: #f5f5f5;
            padding: 10px;
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            display: flex;
            align-items: center;
        }

        .header .return-button,
        .header .return-to-list-button,
        .header .edit-button {
            background-color: #ccc;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .header .edit-button:disabled {
            background-color: #ddd;
            cursor: not-allowed;
        }

        .small-box {
            display: inline-block;
            width: 150px;
            padding: 8px;
            margin-right: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .file-icon,
        .directory-icon {
            margin-right: 8px;
            font-size: 1em;
        }

        .icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            color: #fff;
            background-color: #333;
            border-radius: 50%;
        }

        .file-box {
            background-color: #f0f8ff;
        }

        .directory-box {
            background-color: #f0e68c;
        }

        #file-content {
            white-space: pre-wrap;
            margin-top: 50px;
        }

        .editable-content {
            white-space: pre-wrap;
            border: 1px solid #ccc;
            padding: 8px;
            margin-top: 20px;
            min-height: 100px;
        }
    </style>
    <script>
        var directoryHistory = ['./test'];

        function openFile(filePath) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var fileContentTextElement = document.getElementById('file-content-text');
                    var editableContentElement = document.getElementById('editable-content');
                    var editButtonElement = document.getElementById('edit-button');
                    var returnToFileListButton = document.getElementById('return-to-list-button');

                    fileContentTextElement.innerHTML = xhr.responseText;

                    if (filePath.toLowerCase().endsWith('.txt')) {
                        fileContentTextElement.innerHTML += '<button class="edit-button" onclick="editFile()">Edit</button>';
                    }

                    document.getElementById('directory-content').style.display = 'none';
                    document.getElementById('file-content').style.display = 'block';
                    document.getElementById('header-directory').style.display = 'flex';
                    document.getElementById('header-file').style.display = 'flex';
                }
            };
            xhr.open('GET', 'read_file.php?file=' + filePath, true);
            xhr.send();
        }

        function editFile() {
            var fileContentTextElement = document.getElementById('file-content-text');
            var editableContentElement = document.getElementById('editable-content');
            var editButtonElement = document.getElementById('edit-button');

            // Check if elements exist before accessing their properties
            if (fileContentTextElement && editableContentElement && editButtonElement) {
                fileContentTextElement.style.display = 'none';
                editableContentElement.style.display = 'block';

                document.getElementById('save-button').style.display = 'block';
                document.getElementById('cancel-button').style.display = 'block';

                editButtonElement.style.display = 'none';

                editableContentElement.value = fileContentTextElement.textContent;
            } else {
                console.error('One or more elements not found.');
            }
        }

        function saveFile() {
            var editedContent = document.getElementById('editable-content').value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        console.log('File saved successfully.');
                    } else {
                        console.error('Error saving file:', xhr.statusText);
                    }

                    returnToFileList();
                }
            };

            xhr.open('POST', 'save_file.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send('fileContent=' + encodeURIComponent(editedContent));
        }

        function cancelEdit() {
            returnToFileList();
        }

        function openDirectory(itemPath) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('directory-content').innerHTML = xhr.responseText;
                    document.getElementById('current-path').textContent = itemPath;
                    document.getElementById('directory-content').style.display = 'block';
                    document.getElementById('file-content').style.display = 'none';
                    document.getElementById('header-directory').style.display = 'flex';
                    document.getElementById('header-file').style.display = 'none';
                }
            };
            xhr.open('GET', 'scan_directory.php?item=' + itemPath, true);
            xhr.send();

            directoryHistory.push(itemPath);
        }

        function goBack() {
            directoryHistory.pop();
            var previousDirectory = directoryHistory.pop();
            if (previousDirectory) {
                openDirectory(previousDirectory);
            }
        }

        function returnToFileList() {
            var fileContentTextElement = document.getElementById('file-content-text');
            var editableContentElement = document.getElementById('editable-content');
            var editButtonElement = document.getElementById('edit-button');
            var returnToFileListButton = document.getElementById('return-to-list-button');

            if (editableContentElement) {
                editableContentElement.style.display = 'none';
            }
            if (fileContentTextElement) {
                fileContentTextElement.style.display = 'block';
            }

            document.getElementById('save-button').style.display = 'none';
            document.getElementById('cancel-button').style.display = 'none';

            if (editButtonElement) {
                editButtonElement.style.display = 'block';
            }

            if (returnToFileListButton) {
                returnToFileListButton.style.display = 'flex';
            }

            document.getElementById('directory-content').style.display = 'block';
            document.getElementById('file-content').style.display = 'none';
            document.getElementById('header-directory').style.display = 'flex';
            document.getElementById('header-file').style.display = 'none';
        }

        // Initiate the application by opening the initial directory ('./test').
        openDirectory('./test');
    </script>
</head>

<body>
    <div class="header" id="header-directory">
        <button class="return-button" onclick="goBack()">Return</button>
        <span id="current-path">./test</span>
    </div>

    <div class="header" id="header-file" style="display: none;">
        <span id="file-name"></span>
        <button class="return-to-list-button" onclick="returnToFileList()">Return to File List</button>
        <div>
            <button class="edit-button" id="edit-button" onclick="editFile()">Edit</button>
            <button class="edit-button" onclick="saveFile()">Save</button>
            <button class="edit-button" onclick="cancelEdit()">Cancel</button>
        </div>
    </div>

    <div id="directory-content">
        <?php
        // include 'scan_directory.php'; // Placeholder for server-side PHP code
        // scanDirectory('./test');       // Placeholder for server-side PHP code
        ?>
    </div>

    <div id="file-content" style="display: none;">
        <div id="file-content-text" class="editable-content"></div>
        <div id="file-content-image" style="display: none;"></div>
    </div>
</body>
</body>


</html>