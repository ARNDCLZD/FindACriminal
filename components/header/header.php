<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">FindACriminal</a>
    <form action="components\pages\criminal.php" class="text-center">
        <input class="btn btn-warning" type="submit" value="Find a criminal">                
    </form>
    <div class="" id="navbarResponsive">
      
      <ul class="navbar-nav ms-auto">
        <?php
          if(isset($_SESSION['username']))
          echo '
            <li class="nav-item"><form action="components\pages\connexion.php?action=destroy" method="POST">
              <input type="submit" value="Disconnect" class="btn btn-outline-danger">                
            </form></li>';
          else echo '
          <li class="nav-item"><form action="components\pages\inscription.php">
              <input type="submit" value="Sign up" class="btn btn-outline-warning mr-1">                
          </form></li>
          <li class="nav-item"><form action="components\pages\connexion.php">
              <input type="submit" value="Sign in" class="btn btn-outline-success">                
          </form></li>';
          ?>
      </ul>
    </div>
  </div>
</nav>