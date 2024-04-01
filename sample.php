<?php

include 'connection.php';

$id=1;

$sql=mysqli_query($conn,"select *from sub_cat where cat_id=$id");

?>


     <?php
// Function to create read more link of a content with link to full page
function readMore($content,$link,$var,$id, $limit) {
$content = substr($content,0,$limit);
$content = substr($content,0,strrpos($content,' '));
$content = $content." <a href='$link?$var=$id'>Read More...</a>";
return $content;
}
?>

                <?php while($row=mysqli_fetch_array($sql)){ ?>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">

                    
                            <p><?php 
                            $content=$row['sub_cat_content'];
                            //echo $content;
?>

                        </p>
                            <div class="d-flex justify-content-center mb-2">
                               

<?php
// your page id to display full content
$page_id =$row['sub_cat_id'];
// your page file to display full content
$link = "sub_view.php";
// limit content character
$limit = 100;
// Called readMore() function to convert full content to read more link
echo readMore($content,$link,"id",$page_id, $limit, $limit);

?>
                                
                            </div>
                </div>

            <?php } ?>
                
                    


    


    


    
</body>

</html>