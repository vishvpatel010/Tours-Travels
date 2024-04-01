<?php 

$comment=mysqli_query($conn,"select *from user_register inner join comments on comments.User_Id=user_register.User_Id");
?>
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Clients Say!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                 
                 <?php while($row=mysqli_fetch_array($comment)) { ?>

                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="Admin Panel/user_profile/<?php echo $row['image'] ?>" style="width: 80px; height: 80px;">
                    <h5 class="mb-0"><?php echo $row['UserName'] ?></h5>
                    <p class="mb-0"><?php echo $row['comments'] ?></p>
                </div>

            <?php } ?>
            </div>
        </div>
    </div>