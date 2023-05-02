const urlParams = new URLSearchParams(window.location.search);

const errorId = urlParams.get('error');

if (errorId) {
    document.getElementById('error').innerHTML = "An error occured. Only JPEG or PNG (not JPG) images under 5MB may be submitted"
}