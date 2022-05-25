<?php

use Symfony\Component\Console\Helper\Table;

ob_start(); ?>

<div class="container">
  <a href="<?= ROOT_PATH ?>books/add" class="btn btn-success">Añadir Libro</a>

  <div class="row content" data-aos="fade-up">
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Authors</th>
            <th scope="col">Price</th>
            <th scope="col">ISBN</th>
            <th scope="col">Publisher</th>
            <th scope="col">Published Date</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            
          </tr>
        </thead>
        <?php foreach ($data['books'] as $table) : ?>
          <tbody>
            <tr>
              <th scope="row"><img src="data:img/jpg;base64,<?php echo base64_encode($table->files->filedata); ?>" alt="" width="100px"></img></th>
              <td><?php echo $table->id ?></td>
              <td><?php echo $table->name ?></td>
              <td><?php echo $table->authors ?></td>
              <td><?php echo $table->price ?></td>
              <td><?php echo $table->isbn ?></td>
              <td><?php echo $table->publisher ?></td>
              <td><?php echo $table->published_date ?></td>
              <td><?php echo $table->updated_at ?></td>
              <td><?php echo $table->created_at ?></td>
            </tr>
            <tr>
              <td><a href="<?= ROOT_PATH ?>books/delete/<?= $table['id'] ?>" class="btn btn-danger">Borrar</a></td>
              <td><a href="<?= ROOT_PATH ?>books/read/<?= $table['id'] ?>" class="btn btn-info">ver mas</a></td>
            </tr>
          </tbody>
                
        <?php endforeach; ?>
      </table>

    </div>
  </div>
</div>

<nav aria-label="...">
  <ul class="pagination">
    <?php if ($data['page'] == 1 || $data['page'] == 2) {
      $resta = 0;
      $disabled = 'disabled';
      if ($data['page'] == 2) {
        $resta = 1;
        $disabled = '';
      }
      ///die(print($disabled).'---->'.print($data['page']));
      echo
      '<li class="page-item ' . $disabled . '">
      <a class="page-link" href="index.php?page=' . $data['page'] - 1 . '" >Previous</a>
    </li>';

      for ($i = $data['page'] - $resta; $i < $data['numpages']; $i++) {
        //die(print($resta)); 
        if ($i < $data['page'] + 3) {
          if ($i == $data['page']) {
            echo '<li class="page-item active"> <a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
          } else {
            echo '<li class="page-item"> <a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
          }
        }
      }
    } else {
      echo '<li class="page-item">
        <a class="page-link" href="index.php?page=' . $data['page'] - 1 . '" >Previous</a>
      </li>';
    }

    ?>
    <?php if ($data['page'] > 2) {
      for ($i = $data['page'] - 2; $i <= $data['numpages']; $i++) { //primero los del medio 2 alante dos atras y despues los dos primero y los dos ultimos, pero con 2 bucles

        if ($i < $data['page'] + 3) {
          if ($i == $data['page']) {
            echo '<li class="page-item active"> <a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
          } else {
            echo '<li class="page-item"> <a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
          }
        } else if ($i == $data['page'] + 3) {
          echo '<li class="page-item"> <a class="page-link" href="#">...</a></li>';
        }
      }
    } ?>
    <?php if ($data['page'] == 1 || $data['page'] == 2) {
      echo '<li class="page-item"> <a class="page-link" href="#">...</a></li>';
    } ?>
    <?php if ($data['page'] == $data['numpages']) {
      echo
      '<li class="page-item disabled">
      <a class="page-link" href="index.php?page=' . $data['page'] . '" >Next</a>
    </li>';
    } else {
      echo '<li class="page-item">
        <a class="page-link" href="index.php?page=' . $data['page'] + 1 . '" >Next</a>
      </li>';
    } ?>

  </ul>
</nav>


<?php $content = ob_get_clean() ?>
<?php include 'app/views/layout.html.php' ?>