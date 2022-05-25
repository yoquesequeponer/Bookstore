<?php ob_start();
$form = new FormHelper;
?>
<form enctype="multipart/form-data" action="<?php echo ROOT_PATH."books/add";?>" method="post">
<table>
<tr>
    <td>Name</td>
    <td><?= $form->input('text', ['name'=>'name']) ?></td>
</tr>

<tr>
    <td>Price</td>
    <td><?= $form->input('number', ['name'=>'price']) ?></td>
</tr>

<tr>
    <td>Author</td>
    <td><?= $form->input('text', ['name'=>'authors']) ?></td>
</tr>
<tr>
    <td>isbn</td>
    <td><?= $form->input('number', ['name'=>'isbn']) ?></td>
</tr>

<tr>
    <td>Publisher</td>
    <td><?= $form->input('text', ['name'=>'publisher']) ?></td>
</tr>

<tr>
    <td>file</td>
    <td><?= $form->input('file', ['name'=>'cover']) ?></td>
</tr>


</table>
<?= $form->input('submit', ['name'=>'submit','value'=>'submit']) ?>

</form>

<?php $content = ob_get_clean()?>
<?php include 'app/views/layout.html.php'?>
