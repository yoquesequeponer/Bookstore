<?php 

class BooksController extends Controller{
    public function index(){
        $book = new Books;
        if (isset($_REQUEST['page'])) {
            $page = $_REQUEST['page'];
        }else{
            $page = "1";
        }
        //$books=$book->all();
        $perpage= 2;
        $numRows=$book->count();
        $numPages=ceil($numRows/$perpage);
        $offset = ($page-1)*$perpage;
        $books=$book->offset($offset)->limit($perpage)->get();
        
        $this->view('index.html',['books'=>$books,'numpages'=>$numPages,'page'=>$page]); 
    }

    public function read($id){
      
        $model = new Books;
        $books = $model->find($id);
       
        $this->view('read.html',['books'=>$books]); 
    }

    public function delete($id){
        if (isset($_SESSION['is_logged_in'])) {       
        $book = new Books;
        $books = $book->destroy($id);
       header('location:'. ROOT_PATH);
    }else{
        header('location:'. ROOT_PATH);

        $error = 'You are not logged';
        Messages::setMsg($error,'error');
    }
  
    }

    public function add() {
    if (isset($_SESSION['is_logged_in'])) {       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $book=new Books;
            
            $book->loadData($post);
            
                if ($book->validate()) {               
                    $book->save();
                    if(!is_uploaded_file($_FILES['cover']['tmp_name'])){
                        $error = 'There was no file uploaded';
                    Messages::setMsg($error,'error');
                        $this->view('add.html');
                        return;
                    }
                    $uploadfile = $_FILES['cover']['tmp_name'];
                    $uploaddata['filedata'] = file_get_contents($uploadfile);
                    $uploaddata['filename'] = $_FILES['cover']['tmp_name'];
                    $uploaddata['mimetype'] = $_FILES['cover']['tmp_name'];
                    $file = new Files;
                    $file->loadData($uploaddata);
                        if($file->validate()){
                            $book->files()->save($file);
                        }else{
                            $error = 'There was an error while uploading the file';
                        }
                    header('location:'. ROOT_PATH);
                    }
                
        } else {
            $model= new Books;
            $books = $model->all();
            $this->view('add.html');
        }
    }else{
        header('location:'. ROOT_PATH);

        $error = 'You are not logged';
        Messages::setMsg($error,'error');
    }
}

    public function pdf(){
        $book = new Books;
        $book = $book->all();
        $pdf = new PDF();
        $header = array('ID','Name','Price','Authors');
        $pdf->SetFont('Arial','',14);
        $pdf->addPage();
        $pdf->BuildTable($header,$book);
        $pdf->Output('listBooks.pdf','D');
    }
}
?>