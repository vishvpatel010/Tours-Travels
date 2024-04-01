 <?php

    include'header.php';
   
    $id=$_SESSION['id'];
    $sql=mysqli_query($conn,"select *from sub_cat where sub_cat_id=$id");
    $row=mysqli_fetch_array($sql);
    if (empty($_SESSION['hotel_id'])) {
        # code...
    }
    else{
    $room_id=$_SESSION['hotel_id'];
    $hotel1=mysqli_query($con,"select *from rooms where room_id=$room_id");
    $select1=mysqli_fetch_array($hotel1);
         }   
?>

<?php
include 'connection.php';


    if (isset($_REQUEST['Add_to_cart'])) 
    {
        
       
        $id=$_SESSION['id'];
        $sql=mysqli_query($conn,"select *from sub_cat where sub_cat_id=$id");
        $raw=mysqli_fetch_array($sql);
        $person=$_POST['person'];
        $user_id=$_SESSION['uid']['User_Id'];
        $image=$row['image'];
        $package_name=$row['sub_cat_name'];
        $cat_id=$row['cat_id'];
        if(empty($_SESSION['hotel_id']))
        {
            $sub_price=$row['sub_price'];
            $hotel_price=$row['hotel_price'];
            $room_id=$row['room_id'];
            $price=$sub_price+$hotel_price;
        }
        else
        {
           $sub_price=$row['sub_price'];
           $hotel_price=$select1['price'];
            $room_id=$select1['room_id'];
            $price=$sub_price+$hotel_price;

        }
        $person=$_POST['person'];
        $total=$person*$price;
        $days=$_POST['days'];
        $date=$_POST['date1'];
        $sub_cat_id=$_SESSION['id'];
        $insert=mysqli_query($conn,"insert into cart (user_id,cat_id,image,package_name,days,sub_price,hotel_price,person,total,sub_cat_id,date,room_id) values ($user_id,$cat_id,'$image','$package_name',$days,$sub_price,$hotel_price,$person,$total,$sub_cat_id,'$date',$room_id)");

            if($insert)
                {
                    $success= "insert Successfully...!!";
                    unset($_SESSION['hotel_id']);

                }
            else
                {
                    $danger= "not inserted record";
                }
            
    }

?>

<script>
        function subcat1()
        {
         x1= document.forms["sub"]["date1"].value;
         if(x1=="")
         {
             alert("date must be selected");
             return false;
        }
        }
</script>

 <!-- About Start -->
    <script>
function showUser(str) {
  if (str == "") {
    document.getElementById("html").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("html").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","sub.php?q="+str,true);
    xmlhttp.send();
  }
}
</script> 
<script>
function showDays(str) {
  if (str == "") {
    document.getElementById("days").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("days").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","list.php?q="+str,true);
    xmlhttp.send();
  }
}
</script> 
    <div class="container-xxl py-5">
        <?php
    if(isset($success))
{
?>
<div class="alert alert-success"><?php echo $success; ?> </div>
<?php } ?>

<?php
if(isset($danger))
{
?>
<div class="alert alert-danger"><?php echo $danger; ?></div>
<?php } ?>



 <form method="post" enctype="multipart/form-data" onsubmit="return subcat1()" name="sub">

        <div class="container">
                       <div class="row g-5">
                 
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="Admin Panel/image/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" >
                         <!-- style="object-fit: cover;" -->
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    
                    <h1 class="mb-4"><?php echo $row['sub_cat_name'] ?></span></h1>
                   
                    <p class="mb-4"><?php echo $row['sub_cat_content'] ?></p>
                    <table>
                        <tr>
                            <td>Total Price:-</td>
                        
                        <?php if (empty($_SESSION['hotel_id'])) {

                         echo "<td>".($row['sub_price']+$row['hotel_price'])."</td></tr>";
                         }
                         else
                         {
                            $sub_price=$row['sub_price'];
                            $hotel_price=$select1['price'];
                            echo "</tr><tr><td>package price:-</td><td>&#x20B9;".$sub_price."</td><tr><td>hotel price:-</td><td>&#x20B9;".$hotel_price."</td><tr><td>total price:-</td><td>&#x20B9;".($sub_price+$hotel_price)."</td></tr>";
                         } ?></p></table>
                    
                   <p class="mb-4">
                    Add Person&nbsp;&nbsp;<input onchange ="showUser(this.value)" type="number" name="person" placeholder="Number of Person" value="1" min="1" ></p>
                    <div id="html">
                        
                        <br>
                </div>
                 <?php if ($row['total_days']!=0) {
        ?>
   
                 <p class="mb-4">
                    Select Days&nbsp;&nbsp;<input onchange ="showDays(this.value)" type="number" name="days" placeholder="Number of days" value="2" min="2" max="<?php echo $row['total_days'] ?>"></p>
                <?php } 
                else {
                    ?>
                    <input type="hidden" name="days" value="3">
                    <?php 
                }?>

<br>                   <input class="btn btn-primary py-3 px-5 mt-2" type="submit" name="Add_to_cart" >
                    
                </div>
          
            </div>
            
        </div>
    </div>

<style type="text/css">
  .container_3h7TT {
    background: #f8f8f8;
}
.container_3h7TT .date_10LbP.active_3Hznb {
    border-color: #de5824;
}
.container_3h7TT .date_10LbP {
    height: 36px;
    width: 36px;
    border-radius: 50%;
    border: 2px solid #e3e3e3;
    display: -webkit-inline-box;
    display: inline-flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    margin-right: 16px;
}
.container {
    width: 100%;
    padding-right: 1.5rem;
    padding-left: 1.5rem;
    margin-right: auto;
  }
    body {
    margin: 0;
    font-family: Montserrat,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;
    font-size: 1rem;
    font-weight: 500;
    line-height: 1.5;
    color: #1c1c1c;
    text-align: left;
    background-color: #fff;
}
.text-uppercase {
    text-transform: uppercase!important;
}
.mb-3, .my-3 {
    margin-bottom: 0.75rem!important;
}
.small, small {
    font-size: 80%;
    font-weight: 500;
}.container_PeBi9 {
    white-space: nowrap;
    overflow-x: auto;
    overflow-y: hidden;
}
.m-n5 {
    margin: -1.5rem!important;
}
.p-5 {
    padding: 1.5rem!important;
    }
    .mb-0, .my-0 {
    margin-bottom: 0!important;
}
.list-inline, .list-unstyled {
    padding-left: 0;
    list-style: none;
}
dl, ol, ul {
    margin-top: 0;
    padding-left: 1.5rem;
}

.container_3h7TT .date_10LbP.active_3Hznb {
    border-color: #de5824;
}
.container_3h7TT .date_10LbP {
    height: 36px;
    width: 36px;
    border-radius: 50%;
    border: 2px solid #e3e3e3;
    display: -webkit-inline-box;
    display: inline-flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    margin-right: 16px;
}

.container_3h7TT .date_10LbP.active_3Hznb {
    border-color: #de5824;
}
.container_3h7TT .date_10LbP {
    height: 36px;
    width: 36px;
    border-radius: 50%;
    border: 2px solid #e3e3e3;
    display: -webkit-inline-box;
    display: inline-flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    margin-right: 16px;
}

.container_3h7TT .date_10LbP.active_3Hznb {
    border-color: #de5824;
}
.container_3h7TT .date_10LbP {
    height: 36px;
    width: 36px;
    border-radius: 50%;
    border: 2px solid #e3e3e3;
    display: -webkit-inline-box;
    display: inline-flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    margin-right: 16px;
}
</style>
<div class="container_3h7TT">
<div class="container">
    <div class="py-5">
        <h3 class="h3 mb-4">Dates from <?php echo $row['sub_cat_name'] ?></h3>
         <div class="small text-uppercase mb-3"><span class="month_GZEPN mr-3 active_3Hznb"><?php
if (date("d")>24) {
    $nxtm = strtotime("next month");
echo date("F", $nxtm);
 } 
 else {
    echo date("F");
    } ?></span></div> <div class="m-n5 p-5 container_PeBi9"><ul class="list-inline mb-0"><?php
if (date("d")>24) { 
    $date=1;?>

     <input type="radio" name="date1" value="<?php
                   echo $date.'/'.date("m", $nxtm).'/'.date("Y"); ?>">
    <li class="date_10LbP active_3Hznb"><?php
   echo $date;?>
</li>
   <input type="radio" name="date1" value="<?php
                   echo $date+$row['total_days'].'/'.date("m", $nxtm).'/'.date("Y") ?>">
    <li class="date_10LbP active_3Hznb"><?php
   echo $date+$row['total_days'];?></li>
   </input>
    <?php
 } 
 else {?>
    
              <?php 
                $date1=date("d");
                $date=$date1+$row['total_days'];
               
                while ($date<24) {?>
                    <input type="radio" name="date1" value="<?php
                   echo $date+$row['total_days'].'/'.date("m").'/'.date("Y");
                   ?>">
                    <li class="date_10LbP active_3Hznb">
                    <?php
                   $date=$date+$row['total_days'];
                   echo $date;
                   ?>
               </li>
           </input>
                   <?php
                }
              ?>
            
   <?php } ?></ul></div></div></div>
</li>
</li>
</ul>
</div>
</form>

    <?php if ($row['total_days']!=0) {
        ?>
    
 <div id="days">                  
<?php
$id=$_SESSION['id'];
$rq=mysqli_query($conn,"select *from listout where sub_id=$id limit 2");

?>
<script src="https://kit.fontawesome.com/5680063248.js" crossorigin="anonymous"></script>
<style type="text/css">
    .container_1jKos{
        margin-left:1.5rem;position:relative
        }
        .container_1jKos .image_20TDF
        {border-radius:1rem;box-shadow:0 1rem 3rem rgba(0,0,0,.175)
            }
            .container_1jKos:not(:first-child)
            {padding-bottom:1.5rem;border-bottom:2px solid #e3e3e3;margin-bottom:1.5rem}
            .container_1jKos:before{content:"";display:block;position:absolute;top:3px;left:calc(-1.5rem - 5px);width:12px;height:12px;border:2px solid #fff;border-radius:50%;z-index:10;background:#86B817 }.container_1jKos:not(:last-child):after{content:"";display:block;border-left:2px solid #e3e3e3;position:absolute;left:-1.5rem;top:3px;bottom:-2rem}

      .d-block {
    display: block!important;
}
<style>
.bg-light {
    background-color: #f8f8f8!important;
}
.container_1f_HB .item_2otyr .icon_2L-T6 {
    width: 64px;
    height: 64px;
    background: #e3e3e3;
    color: #393939;
    border-radius: 50%;
    font-size: 32px;
    display: -webkit-inline-box;
    display: inline-flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-pack: center;
    justify-content: center;
    color: #86B817 ;
}
.text-secondary {
    color: #FE8800 !important;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-8"><div class="py-5"><h2 class="text-primary mb-4">Schedule</h2> <div class="container_1jKos"><div><div class="text-secondary small text-uppercase"><strong>Day 0</strong>
    </div> <div class="h5 my-2">Departure from Surat</div>
   <?php while ($sq=mysqli_fetch_array($rq)) {?>
   </div></div><div class="container_1jKos"><div><div class="text-secondary small text-uppercase"><strong>Day <?=$sq['days']; ?></strong> 
    </div> <div class="h5 my-2"><?=$sq['description']; ?></div>
    <?php 
    if (empty($sq['list_image'])) {
       
    }
    else{?>
     <img sizes="(max-width: 600px) 100vw, 600px" src="Admin Panel/days_image/<?=$sq['list_image']; ?>" class="image_20TDF img-fluid mt-3">
     <?php
    }
 } ?>
    <div class="col-12 col-lg-8">
        <div class="py-5"> 
            <div class="container_1jKos">
                <div>
                    <div class="text-secondary small text-uppercase"><strong>Last Day</strong>
                    </div> 
                    <div class="h5 my-2">After breakfast at Hotel you depart for your onward journey.
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-8">
        <div class="py-5"> 
            <div class="container_1jKos">
                <div>
                    <?php 
                    if (empty($_SESSION['hotel_id'])) {
                        $room_id=$row['room_id'];
                        $row3=mysqli_fetch_array(mysqli_query($conn,"select *from rooms where room_id=$room_id"));
                        ?>
     <div class="h5 my-2"><h5 style="color: red; "><?php echo $row3['type'] ?> </h5>
                                <img sizes="(max-width: 600px) 100vw, 600px" src="Hotel_management_system/image/rooms/<?php echo $row3['image']; ?>" class="image_20TDF img-fluid mt-3">
                             </div>
                        <br>
                         <div class="h5 my-2">If you don't like hotel room you can chage hotel by <a href="Hotel_management_system/">clicking here</a>
                                </div>
                      <?php
                    }
                    else {
                        $room_id=$_SESSION['hotel_id'];
                     $hotel=mysqli_query($con,"select *from rooms where room_id=$room_id");
                     $select=mysqli_fetch_array($hotel);
                     ?>
                             <div class="h5 my-2">You Have Selected <h5 style="color: red; "><?php echo $select['type'] ?> </h5>
                                <img sizes="(max-width: 600px) 100vw, 600px" src="Hotel_management_system/image/rooms/<?php echo $select['image']; ?>" class="image_20TDF img-fluid mt-3">
                             </div>
                             <br>
                                <div class="h5 my-2">If you don't like hotel you can chage hotel by <a href="Hotel_management_system/">clicking here</a>
                                </div>
                      <?php
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div></div></div></div></div></div>

                </div>  

<?php } ?>


        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                   <center>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Make A Comment</h1>
                        <form method="post">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-transparent" placeholder="Special Request" name="comment" id="message" style="height: 100px"></textarea>
                                        <label for="message">Your Comment</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-outline-light w-100 py-3" type="submit" name="sur">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </center>
                </div>
            </div>
        </div>
    </div>


    


        

   <?php
$saw="yes";
include 'footer.php';

 ?>
    

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>