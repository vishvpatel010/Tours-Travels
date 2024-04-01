<?php 
if(empty($_SESSION['uid']))
{
   ?>
  <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                   <center>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Make A Comment</h1>
                        <form method="post" name="form1" action="login.php">
                            <div class="row g-3">
                               
                                
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-transparent" placeholder="Special Request" name="comment" id="message" style="height: 100px"></textarea>
                                        <label for="message">Your Comment</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-outline-light w-100 py-3" type="submit" name="sub">Submit</button>
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
}

?>

        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                   <center>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Make A Comment</h1>
                        <form method="post" name="form1">
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