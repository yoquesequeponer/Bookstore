<?php 
$form = new FormHelper;
?>
  <link href="<?=ROOT_PATH?>public/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?=ROOT_PATH?>public/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=ROOT_PATH?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=ROOT_PATH?>public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=ROOT_PATH?>public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=ROOT_PATH?>public/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=ROOT_PATH?>public/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=ROOT_PATH?>public/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=ROOT_PATH?>public/css/style.css" rel="stylesheet">

  <?php $messages = new Messages;?>

     
     <?php echo $messages->display() ?>
    
    
 
  

<div style="margin-left: 25%;">
<form enctype="multipart/form-data" action="<?php echo ROOT_PATH."users/register";?>" method="post">
<table>
<tr >
    <td>Name</td>
    <td><?= $form->input('text', ['name'=>'name']) ?></td>
</tr>

<tr>
    <td>email</td>
    <td><?= $form->input('text', ['name'=>'email']) ?></td>
</tr>

<tr>
    <td>pwd</td>
    <td><?= $form->input('password', ['name'=>'password']) ?></td>
</tr>



</table>
<?= $form->input('submit', ['name'=>'submit','value'=>'submit']) ?>

</form>

</div>


