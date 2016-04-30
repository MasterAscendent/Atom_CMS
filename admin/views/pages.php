<h1>Page Manager</h1>

<div class="row">
    <div class="col-md-3">

         <div class="list-group">

           <a class="list-group-item" href="?page=pages">
             <h4 class="list-group-item-heading"><i class="fa fa-plus"></i> New Page</h4>
          </a>

      <?php
        $q = "SELECT * FROM pages ORDER BY title ASC";
        $r = mysqli_query($dbc, $q);

        while($list = mysqli_fetch_assoc($r)) {

          $blurb = substr(strip_tags($list['body']), 0, 144);

           ?>

          <div class="list-group-item <?php selected($list['id'], $opened['id'], 'active'); ?>">
            <h4 class="list-group-item-heading"><?php echo $list['title']; ?>
              <span class="pull-right"><a href="#" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
              <span class="pull-right"><a href="index.php?page=pages&id=<?php echo $list['id']; ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>

              </span>

            </h4>
            <p class="list-group-item-text"><?php echo $blurb; ?></p>
          </div>

          <?php } ?>

        </div>

    </div>

    <div class="col-md-9">

      <?php if(isset($message)) { echo $message; } ?>


      <form action="index.php?page=pages&id=<?php echo $opened['id']; ?>" method="post" role="form">

        <div class="form-group">

          <label for="title">Title:</label>
          <input class="form-control" type="text" name="title" id="title" value="<?php echo $opened['title']; ?>" placeholder="Page Title">

        </div>

        <div class="form-group">

          <label for="user">User:</label>
          <select class="form-control" name="user" id="user">
            <option value="0">No user</option>

            <?php
              $q = "SELECT id FROM users ORDER BY first ASC";
              $r = mysqli_query($dbc, $q);

              while ($user_list = mysqli_fetch_assoc($r)) {

                $user_data = data_user($dbc, $user_list['id']);

                ?>

                  <option value="<?php echo $user_data['id']; ?>"
                    <?php
                    if(isset($_GET['id'])) {
                      selected($user_data['id'], $opened['user'], 'selected');
                    } else {
                      selected($user_id['id'], $user['id'], 'selected');
                    }

                    ?>><?php echo $user_data['fullname']; ?></option>

            <?php  } ?>

          </select>

        </div>

        <div class="form-group">

          <label for="slug">Slug:</label>
          <input class="form-control" type="text" name="slug" id="slug" value="<?php echo $opened['slug']; ?>" placeholder="Page Slug">

        </div>

        <div class="form-group">

          <label for="label">label:</label>
          <input class="form-control" type="text" name="label" id="label" value="<?php echo $opened['label']; ?>" placeholder="Page Label">

        </div>

        <div class="form-group">

          <label for="header">Header:</label>
          <input class="form-control" type="text" name="header" id="header" value="<?php echo $opened['header']; ?>" placeholder="Page Header">

        </div>

        <div class="form-group">

          <label for="body">Body:</label>
          <textarea class="form-control editor" name="body" rows="8" id="body" placeholder="Page Body"><?php echo $opened['body']; ?></textarea>

        </div>

        <button type="submit" class="btn btn-default">Save</button>
        <input type="hidden" name="submitted" value="1">
        <?php if(isset($opened['id'])) { ?>
        <input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
        <?php } ?>

      </form>

    </div>
</div>
