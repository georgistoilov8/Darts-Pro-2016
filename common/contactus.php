<?php include_once "helpers/contactus_check.php"; ?>

<div class="container" style="margin-top: 40px;">
  <section>
    <div class="page-header" id="contact">
        <h2>Contact Us.<small> Contact us for more.</small></h2>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <p>Send us a message, or contact us from the address below</p>

          <address>
            <strong>Darts Pro 2016 Ltd.</strong></br>
            1592, Druzhba </br>
            Street: Number</br>
            Sofia - 1000</br>
            P: +359 888 888 888
          </address>
        </div>

        <div class="col-lg-8">
          <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
              <label for="user-name" class="col-lg-2 control-label">Name</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="user_fullname" name="user_fullname" placeholder="Enter you name" required="">
              </div>
            </div><!-- End form group -->

            <div class="form-group">
              <label for="user-email" class="col-lg-2 control-label">Email</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Enter you Email Address" required="">
              </div>
            </div><!-- End form group -->

            <div class="form-group">
              <label for="user-message" class="col-lg-2 control-label">Any Message</label>
              <div class="col-lg-10">
                <textarea name="message" class="form-control"
                cols="20" rows="10" placeholder="Enter your Message" required=""></textarea>
              </div>
            </div><!-- End form group -->

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary blue" name="submit_button">Submit</button>
              </div>
            </div>



          </form>
        </div>
      </div><!-- End the row -->
      <div style="color:red;font-size:15px"><?php echo $emailErr;?></div>
      <div style="color:red;font-size:15px"><?php echo $nameErr;?></div>
      <div style="color:red;font-size:15px"><?php echo $messageErr;?></div>
  </section>
</div>

<?php include_once "helpers/contactus_send.php"; ?>
