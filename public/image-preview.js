function imagePreview(elementId, fileInput) {
    var image = document.getElementById(elementId);
    image.src = URL.createObjectURL(fileInput.files[0]);
    image.onload = function() {
        URL.revokeObjectURL(image.src)
    }
}