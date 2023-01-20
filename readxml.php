<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read XML</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
</head>
<body>
    <form action="readxml.php" method="post">
        <div class="form-group container">
            <?php
                function select_loai(){
                    $xlmDoc = new DOMDocument();
                    $xlmDoc ->preserveWhiteSpace = false;
                    $xlmDoc ->load("data/books.xml");
                    $root = $xlmDoc->documentElement;
                    $booktype = $root->getElementsByTagName("book");// danh sach the book
                    $select = "<select name='dllbook'>";
                    for($i=0;$i<$booktype->length;$i++){
                        // $typeArr = array();
                        // $kqSearch = array_search($type->item(6)->nodeValue,$typeArr);
                        $type = $booktype->item($i)->childNodes;// danh sach the con cua the book
                        if( !isset($arrtype[$type->item(6)->nodeValue])){
                            $arrtype[$type->item(6)->nodeValue]=$type->item(6)->nodeValue;
                            $select .="<option value='".$type->item(6)->nodeValue."'>".$type->item(5)->nodeValue."</option>";
                        }

                    }
                    $select.="</select>";
                    echo $select;
                }
                select_loai();
            ?>
            <input type="submit" value="Xem" class="btn btn-primary">
        </div>
        <div class="form-group container">
                <table class="table table-bordered">
                    <tr class="bt-success">
                        <th>STT</th>
                        <th>Tên sách</th>
                        <th>Tác giả</th>
                        <th>Giá</th>
                    </tr>
                    <?php
                        $xlmDoc = new DOMDocument();
                        $xlmDoc ->preserveWhiteSpace = false;
                        $xlmDoc ->load("data/books.xml");
                        $xpath = new DOMXPath($xlmDoc);
                        $book = "";
                        if(isset($_POST["dllbook"])){
                            $query = "//book/typeID[.='".$_POST["dllbook"]."']/parent::*";
                            $book = $xpath->query($query);
                            for($i=0;$i<$book->length;$i++){
                                $ib=$book->item($i)->childNodes;
                                echo "<tr class='bg-info'>";
                                echo "<td>".$ib->item(0)->nodeValue."</td>";
                                echo "<td>".$ib->item(1)->nodeValue."</td>";
                                echo "<td>".$ib->item(2)->nodeValue."</td>";
                                echo "<td>".$ib->item(7)->nodeValue."</td>";
                                echo "</tr>";
                            }
                        }else{
                            $start = $xlmDoc->documentElement; //doc node book
                            $book = $start->childNodes;
                            for($i=0;$i<$book->length;$i++){
                                $ib=$book->item($i)->childNodes;
                                echo "<tr class='bg-info'>";
                                echo "<td>".$ib->item(0)->nodeValue."</td>";
                                echo "<td>".$ib->item(1)->nodeValue."</td>";
                                echo "<td>".$ib->item(2)->nodeValue."</td>";
                                echo "<td>".$ib->item(7)->nodeValue."</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
        </div>

    </form>
</body>
</html>