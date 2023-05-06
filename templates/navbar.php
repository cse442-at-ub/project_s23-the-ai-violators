<nav class="navbar navbar-expand-lg bg-secondary-subtle">
<link rel="shortcut icon" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/favicon.ico">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/image/carrot.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            nutr.io
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/content/">Content</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/history/">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/track/">Track</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/recomendation/">Meals</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/exercise/">Exercise</a>
                <li class="nav-item">
                    <button class="nav-link" onclick="logout()">Logout</button>
                </li>
                <li class="nav-item">
                    <!--h6 id ="use" class="nav-link">username</h6-->
                    <a class="nav-link" id = "use" href="/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/profile/">username</a>
                </li>

            </ul>

        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Michroma&family=Montserrat:wght@200;400;500;700;800&display=swap" rel="stylesheet">
<style>
    /* Add your custom CSS rules here */
    .navbar-nav .nav-item {
        margin-left: 30px;
        /* Adjust the left margin to space out the items */
        margin-right: 30px;
        /* Adjust the right margin to space out the items */
    }

    #use{
        font-family: 'Michroma';
        color: black;

    }
</style>

<script>
    // dont use jquery for this
    function logout() {
        fetch('/CSE442-542/2023-Spring/cse-442g/project_s23-the-ai-violators/public/logout.php', {
            method: 'POST'
        }).then(response => {
            if (response.ok) {
                if (response.headers.get("X-Redirect-Url")) {
                    window.location.href = response.headers.get("X-Redirect-Url");
                }
                console.log('Logged out successfully');
                // Redirect or perform any other action after successful logout
            } else {
                console.error('Logout failed');
            }
        }).catch(error => {
            console.error('Error during logout:', error);
        });
    }
    let Navuser= sessionStorage.getItem('username')
    let Navname= document.getElementById("use")
    Navname.innerText = Navuser
</script>