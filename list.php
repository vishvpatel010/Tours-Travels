<?php 
include 'connection.php';
session_start();
$id=$_SESSION['id'];
$limit=$_GET['q'];
$rq=mysqli_query($conn,"select *from listout where sub_id=$id limit $limit");

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
    </div> <div class="h4 my-2">Departure from Surat</div>
   <?php while ($sq=mysqli_fetch_array($rq)) {?>
   </div></div><div class="container_1jKos"><div><div class="text-secondary small text-uppercase"><strong>Day <?=$sq['days']; ?></strong> 
    </div> <div class="h4 my-2"><?=$sq['description']; ?></div>
    <?php 
    if (empty($sq['list_image'])) {
       
    }
    else{?>
     <img sizes="(max-width: 600px) 100vw, 600px" src="Admin Panel/days_image/<?=$sq['list_image']; ?>" class="image_20TDF img-fluid mt-3">
     <?php
    }
 } ?>
    <div class="col-12 col-lg-8"><div class="py-5"> <div class="container_1jKos"><div><div class="text-secondary small text-uppercase"><strong>Last Day</strong>
    </div> <div class="h4 my-2">After breakfast at Hotel you depart for your onward journey.</div>
</div></div></div>
<div class="col-12 col-lg-8">
        <div class="py-5"> 
            <div class="container_1jKos">
                <div>
                    <?php 
                    if (empty($_SESSION['hotel_id'])) {?>
                         <div class="h5 my-2">If you don't like hotel you can chage hotel by <a href="Hotel_management_system/">clicking here</a>
                                </div>
                      <?php
                    }
                    else {
                        $room_id=$_SESSION['hotel_id'];
                     $hotel=mysqli_query($con,"select *from rooms where room_id=$room_id");
                     $select=mysqli_fetch_array($hotel);
                     ?>
                             <div class="h5 my-2">You Have Selected <h5 style="color: red; "><?php echo $select['type'] ?> </h5>
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
</div></div></div></div></div></div></div>
