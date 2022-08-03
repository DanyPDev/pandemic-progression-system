<?php 
  
  if(isset($_SESSION["privilegeName"])){
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" style="font: italic small-caps bold 16px/2 cursive;" href="index.php">COVID SYSTEM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <div class="d-flex">
      
          <button type="button" class="btn btn-outline-primary mr-2">Signed as ' . $_SESSION["username"] . ' with ' . $_SESSION["privilegeName"] . ' priviledges <div class="spinner-grow spinner-grow-sm text-success" role="status">
          <span class="sr-only"></span>
        </div></button>
           <a href="./components/logout.inc.php"> <input class="btn btn-outline-danger" value="Logout" type="submit" name="submitLogout"> </a>
         
        </div>
        <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarScroll" style="gap: 10px;">
        <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item dropdown pr-10">
            <a id="dropdown" class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" aria-expanded="false">
              Menu
            </a>
            <ul id="dropdownChild" class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="covidReports.php">Covid Statistics</a></li>
              <li><a class="dropdown-item" href="createUser.php">Create User</a></li>
              <li><a class="dropdown-item" href="allUsers.php">Display Users</a></li>
              <li><a class="dropdown-item" href="editUser.php">Edit User</a></li>
              <li><a class="dropdown-item" href="queries.php">Query</a></li>

              <li><a class="dropdown-item" href="article.php">Create Article</a></li>
              <li><a class="dropdown-item" href="allArticles.php">Display Articles</a></li>
              <li><a class="dropdown-item" href="allReports.php">Display Reports</a></li>

            </ul>
          </li>  
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
          <button type="button nav-item" class="btn btn-outline-danger px-5">Report A Bug</button>
          </a>
          
        </ul>
        
      </div>
    </div>
  </nav>
  <script type="text/javascript">
    const element = document.getElementById("dropdown");
    const child = document.getElementById("dropdownChild");
    console.log(element);
    let handleMouseEnter = () => {element.classList.add("show"); child.click();};
    let handleMouseLeave = () => {element.classList.remove("show"); child.click();};
    element.addEventListener("mouseenter", handleMouseEnter);
    element.addEventListener("mouseleave", handleMouseLeave);
  </script>';


  } else {
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" style="font: italic small-caps bold 16px/2 cursive;" href="index.php">COVID SYSTEM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <div>
          <form class="d-flex" action="index.php" method="post">
            <input class="form-control me-2" type="username" name="username" placeholder="Username (Email)" aria-label="Search" required>
            <input class="form-control me-2" type="password" name="password" placeholder="Password" aria-label="Search" required>
            <input class="btn btn-outline-success" value="Login" type="submit" name="submit">
            
          </form>
        </div>
        <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarScroll" style="gap: 10px;">
        <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item dropdown pr-10">
            <a id="dropdown" class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" aria-expanded="false">
              Menu
            </a>
            <ul id="dropdownChild" class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="covidReports.php">Covid Statistics</a></li>
              <li><a class="dropdown-item" href="createUser.php">Create User</a></li>
              <li><a class="dropdown-item" href="allUsers.php">Display Users</a></li>
              <li><a class="dropdown-item" href="queries.php">Query</a></li>

              <li><a class="dropdown-item" href="article.php">Create an Article</a></li>
              <li><a class="dropdown-item" href="allArticles.php">Display Articles</a></li>

              <li><a class="dropdown-item" href="article.php">Articles</a></li>

            </ul>
          </li>  
          <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
          <button type="button nav-item" class="btn btn-outline-danger px-5">Report A Bug</button>
          </a>
          
        </ul>
        
      </div>
    </div>
  </nav>
  <script type="text/javascript">
    const element = document.getElementById("dropdown");
    const child = document.getElementById("dropdownChild");
    console.log(element);
    let handleMouseEnter = () => {element.classList.add("show"); child.click();};
    let handleMouseLeave = () => {element.classList.remove("show"); child.click();};
    element.addEventListener("mouseenter", handleMouseEnter);
    element.addEventListener("mouseleave", handleMouseLeave);
  </script>';

  }

?>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" style="font: italic small-caps bold 16px/2 cursive;" href="index.php">COVID SYSTEM</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarScroll">
                <div>
                  <form class="d-flex" action="index.php" method="post">
                    <input class="form-control me-2" type="username" name="username" placeholder="Username (Email)" aria-label="Search" required>
                    <input class="form-control me-2" type="password" name="password" placeholder="Password" aria-label="Search" required>
                    <input class="btn btn-outline-success" value="Login" type="submit" name="submit">
                    
                  </form>
                </div>
                <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarScroll" style="gap: 10px;">
                <ul class="navbar-nav navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item dropdown pr-10">
                    <a id="dropdown" class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" aria-expanded="false">
                      Menu
                    </a>
                    <ul id="dropdownChild" class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="covidReports.php">Covid Statistics</a></li>
                      <li><a class="dropdown-item" href="createUser.php">Create User</a></li>
                      <li><a class="dropdown-item" href="allUsers.php">Display Users</a></li>
                    </ul>
                  </li>  
                  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                  <button type="button nav-item" class="btn btn-outline-danger px-5">Report A Bug</button>
                  </a>
                  
                </ul>
                
              </div>
            </div>
          </nav>
          <script type="text/javascript">
            const element = document.getElementById("dropdown");
            const child = document.getElementById("dropdownChild");
            console.log(element);
            let handleMouseEnter = () => {element.classList.add("show"); child.click();};
            let handleMouseLeave = () => {element.classList.remove("show"); child.click();};
            element.addEventListener("mouseenter", handleMouseEnter);
            element.addEventListener("mouseleave", handleMouseLeave);
          </script>

 -->
