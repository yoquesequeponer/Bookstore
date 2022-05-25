<?php ob_start();?>


<h1>Hola</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum nihil pariatur iusto sequi facilis voluptatem unde deserunt eos? Delectus voluptatum accusantium laborum quasi asperiores dignissimos consectetur quam nulla modi error.</p>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolorem non numquam odit delectus perspiciatis inventore, voluptates soluta odio quam? Placeat similique culpa fugiat dolor doloremque voluptatibus consequatur esse beatae!</p>


<?php $content = ob_get_clean()?>
<?php include 'app/views/layout.html.php'?>