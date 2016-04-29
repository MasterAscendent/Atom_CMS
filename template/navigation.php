<nav style="border-radius:0px; -webkit-border-radius:0px; -moz-border-radius:0px;" class="navbar navbar-default" role="navigation">
  <div class="container">
    <ul class="nav navbar-nav">
        <?php
          $q = "SELECT * FROM pages";
          $r = mysqli_query($dbc, $q);

          while($nav = mysqli_fetch_assoc($r)) { ?>

          <li<?php if($pageid == $nav ['id']) { echo ' class="active"';} ?>><a href="?page=<?php echo $nav ['id']; ?>"><?php echo $nav ['label']; ?></a></li>

          <?php } ?>

        <li><a href="#">FAQ</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
  </div>
</nav> <!-- END Nav -->
