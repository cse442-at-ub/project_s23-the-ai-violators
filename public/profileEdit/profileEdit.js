const urlParams = new URLSearchParams(window.location.search);

const errorId = urlParams.get('error');

if (errorId) {
    document.getElementById('error').innerHTML = "An error occured. Please try again with a different file."
}