document.getElementById('uploadForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const fileUrl = document.getElementById('fileUrlInput').value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (xhr.status == 200) {
            document.getElementById('status').textContent = 'Upload successful!';
        } else {
            document.getElementById('status').textContent = 'Upload failed.';
        }
    };

    xhr.send('fileUrl=' + encodeURIComponent(fileUrl));
});
