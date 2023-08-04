<main>
  <?php
  $name="gg";
  $con=mysqli_connect('localhost','root','','facebook');
  if(!$con)
  {
    echo 'connection is not set';
  }
  else{
    session_start();
    if(!isset($_SESSION['email']))
    {
        header('Location:2.php');
    }
    $user_email=$_SESSION['email'];
    $q="select * from user_profile where email='$user_email'";
    $res=mysqli_query($con,$q);
    $rows=mysqli_num_rows($res);
    $data=mysqli_fetch_assoc($res);
    if ($data) {
        
        $profile_photo=$data['profile_photo'];
        $name=$data['name'];
        $gender=$data['gender'];
        $bio=$data['bio'];
        $education=$data['education'];
        $email=$data['email'];
        $phone=$data['phone'];
        $dob=$data['dob'];
        $post=$data['post'];

    }
  }
  ?>
  <header>
    <div class="tb">
      <div class="td" id="logo">
        <a href="#"><i class="fab fa-facebook-square"></i></a>
      </div>
      <div class="td" id="search-form">
        <form method="get" action="#">
          <input type="text" placeholder="Search Facebook">
          <button type="submit"><i class="material-icons">search</i></button>
        </form>
      </div>
      <div class="td" id="f-name-l"><span>
          <?php echo $name?>'s facebook
        </span></div>
      <div class="td" id="i-links">
        <div class="tb">
          <div class="td" id="m-td">
            <div class="tb">
              <span class="td"><i class="material-icons">Friends</i></span>
              <span class="td"><i class="material-icons">chat</i></span>
              <span class="td m-active"><i class="material-icons">notifications</i></span>
            </div>
          </div>
          <div class="td">
            <a href="#" id="p-link">
              <img src="<?php echo " ./img/".$profile_photo ?>">
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div id="profile-upper">
    <div id="profile-banner-image">
      <img src="./img/w.jpg" alt="Banner image">
    </div>
    <div id="profile-d">
      <div id="profile-pic">
        <img src="<?php echo " ./img/".$profile_photo ?>">
      </div>
      <div id="u-name">
        <?php echo $name?>
      </div>
      <div class="tb" id="m-btns">


        <div class="m-btn" style="text-align:center;"><a href="3.php"> Edit Profile</a></div>

      </div>
      <div id="edit-profile"><i class="material-icons"></i></div>
    </div>
    <div id="black-grd"></div>
  </div>
  <div id="main-content">
    <div class="tb">
      <div class="td" id="l-col">
        <div class="l-cnt">
          <div class="cnt-label">
            <i class="l-i" id="l-i-i"></i>
            <span>Bio</span>

          </div>
          <div id="i-box">
            <div id="intro-line">
              <?php echo $bio?>
            </div>
            <div id="u-occ">📧: <a mailto: <?php echo $email?> >
                <?php echo $email?>
              </a></div>
            <div id="u-occ">DOB:
              <?php echo $dob ?>
            </div>
            <div id="u-occ">👩‍🎓:
              <?php echo $education ?>
            </div>
            <div id="u-occ">📞:
              <?php echo $phone ?>
            </div>
            <div id="u-occ">Gender :
              <?php echo $gender ?>
            </div>
          </div>
        </div>


        <div id="t-box">
          <a href="#">Privacy</a> <a href="#">Terms</a> <a href="#">Advertising</a> <a href="#">Ad Choices</a> <a
            href="#">Cookies</a> <span id="t-more">More</span>
          <div id="cpy-nt">Facebook &copy; <span id="curr-year"></span></div>
        </div>
      </div>
      <div class="td" id="m-col">
        <div class="m-mrg" id="p-tabs">
          <div class="tb">
            <div class="td">
              <div class="tb" id="p-tabs-m">
                <div class="td active"><i class="material-icons"></i><span>TIMELINE</span></div>
                <div class="td"><i class="material-icons"></i><span>FRIENDS</span></div>
                <div class="td"><i class="material-icons"></i><span>PHOTOS</span></div>
                <div class="td"><i class="material-icons"></i><span>ABOUT</span></div>
                <div class="td"><i class="material-icons"></i><span>ARCHIVE</span></div>
              </div>
            </div>
          </div>
        </div>
        <div class="m-mrg" id="composer">
          <div id="c-tabs-cvr">
            <div class="tb" id="c-tabs">
              <div class="td active"><span>Make Post</span></div>
              <div class="td"><span>Photo/Video</span></div>
              <div class="td"><span>Live Video</span></div>
              <div class="td"><span>Life Event</span></div>
            </div>
          </div>
          <div id="c-c-main">
            <div class="tb">
              <div class="td" id="p-c-i"><img src="<?php echo " ./img/".$profile_photo ?>" alt="Profile pic"></div>
              <div class="td" id="c-inp">
                <input type="text" placeholder="What's on your mind?">
              </div>
            </div>
            <div id="insert_emoji"></div>
          </div>
        </div>
        <div>
          <div class="post">
            <div class="tb">
              <a href="#" class="td p-p-pic"><img src="<?php echo " ./img/".$profile_photo ?>" ></a>
              <div class="td p-r-hdr">
                <div class="p-u-info">
                  <a href="#">
                    <?php echo $name?>
                  </a>is sharing a memory with you<a href="#"></a>
                </div>
                <div class="p-dt">
                  <i class="material-icons">calendar_today</i>
                  <span>August 01, 2023</span>
                </div>
              </div>
              <div class="td p-opt"><i class="material-icons"></i></div>
            </div>
            <a href="#" class="p-cnt-v">
              <img src="<?php echo " ./img/".$post ?>">
            </a>
            <div>
              <div class="p-acts">
                <div class="p-act like"><i class="material-icons thumb_up_alt"></i><span>25</span></div>
                <div class="p-act comment"><i class="material-icons">comment</i><span>1</span></div>
                <div class="p-act share"><i class="material-icons"></i></div>
              </div>
            </div>
          </div>
        </div>

      </div>


</main>
<style>
  * {
    outline: none;
  }

  body {
    margin: 40px 0px;
    background-color: #385591;
  }

  body,
  input,
  button {
    font-family: Helvetica;
  }

  img {
    display: block;
    width: 100%;
    border: 0;
  }

  .tb {
    display: table;
    width: 100%;
  }

  .tr {
    display: table-row;
  }

  .td {
    display: table-cell;
    vertical-align: middle;
  }

  a {
    text-decoration: none;
  }

  button {
    padding: 0;
    border: 0;
    background-color: transparent;
  }

  ::placeholder {
    color: #f1f1f1;
  }

  main {
    width: 1280px;
    margin: 0 auto;
    background-color: #e9ebee;
    box-shadow: 0px 8px 30px #1d2d4f;
    border-radius: 4px;
    overflow: hidden;
  }

  #device-bar-1 {
    text-align: right;
    padding: 6px;
    background-color: #000;
    overflow: hidden;
  }

  #device-bar-1 button {
    width: 15px;
    height: 15px;
    float: left;
    margin: 6px;
    border-radius: 50%;
    cursor: pointer;
  }

  header {
    padding: 15px 20px;
    background-color: #4267b2;
  }

  #logo {
    width: 30px;
  }

  #logo a {
    display: block;
  }

  #logo a i {
    font-size: 34px;
    color: #fff;
  }

  #search-form form {
    position: relative;
    width: 280px;
    font-size: 16px;
    padding: 8px 15px;
    padding-right: 37px;
    background-color: #3b5ca0;
    border-radius: 20px;
    margin-left: 15px;
  }

  #search-form form input {
    width: 100%;
    color: #fff;
    border: 0;
    background-color: transparent;
  }

  #search-form form button {
    position: absolute;
    top: 6px;
    right: 6px;
    color: #f1f1f1;
    height: 22px;
    line-height: 1;
    cursor: pointer;
  }

  #search-form form button i {
    font-size: 22px;
  }

  #f-name-l {
    width: 1px;
    color: #fff;
    font-weight: bold;
    white-space: pre;
    padding-right: 20px;
  }

  #f-name-l span {
    padding-right: 28px;
    border-right: 1px solid #35518b;
  }

  #i-links {
    width: 1px;
  }

  #m-td {
    padding-right: 20px;
  }

  #m-td span {
    position: relative;
    cursor: pointer;
  }

  #m-td span.m-active:before {
    content: "5";
    position: absolute;
    top: -8px;
    right: 0px;
    color: #fff;
    font-size: 12px;
    padding: 4px 4px 3px 4px;
    background-color: #ff1e0e;
    border-radius: 3px;
    line-height: 1;
  }

  #i-links i {
    color: #fff;
    font-size: 24px;
    padding: 0px 8px;
    vertical-align: middle;
  }

  #p-link {
    display: block;
    width: 34px;
    height: 34px;
    background-color: #f1f1f1;
    border-radius: 50%;
    overflow: hidden;
  }

  #p-link img {
    width: 100%;
  }

  #profile-upper {
    position: relative;
  }

  #profile-d {
    position: absolute;
    left: 59px;
    bottom: 0px;
    right: 0px;
    height: 180px;
    z-index: 2;
  }

  #profile-banner-image {
    height: 360px;
    overflow: hidden;
    z-index: 1;
  }

  #profile-banner-image img {
    width: 100%;
    margin-top: -20%;
  }

  #profile-pic {
    width: 180px;
    height: 180px;
    border-radius: 3px;
    margin-top: 28px;
    overflow: hidden;
    box-shadow: 0 0 0 5px #fff;
  }

  #profile-pic img {
    width: 100%;
  }

  #u-name {
    position: absolute;
    top: 120px;
    left: 208px;
    color: #fff;
    font-size: 36px;
    font-weight: bold;
  }

  #m-btns {
    position: absolute;
    right: 56px;
    bottom: 20px;
    width: 211px;
  }

  #m-btns .td {
    padding: 0 8px;
  }

  .m-btn {
    cursor: pointer;
    color: #0e0e0e;
    font-size: 14px;
    white-space: pre;
    padding: 5px 8px 6px 8px;
    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 2px;
  }

  .m-btn i {
    font-size: 16px;
    margin-right: 1px;
    vertical-align: middle;
  }

  .m-btn span {
    position: relative;
    top: 1px;
  }

  #edit-profile {
    position: absolute;
    right: 20px;
    bottom: 21px;
    line-height: 1;
    cursor: pointer;
  }

  #edit-profile i {
    display: block;
    color: rgba(255, 255, 255, 0.7);
  }

  #black-grd {
    position: absolute;
    left: 0px;
    bottom: 0px;
    right: 0px;
    height: 300px;
    background: linear-gradient(rgba(0, 0, 0, 0) 71%, rgba(0, 0, 0, 0.53));
    z-index: 1;
  }

  #main-content {
    padding: 55px 0px 0px 55px;
  }

  #l-col,
  #m-col,
  #r-col {
    vertical-align: top;
  }

  #l-col {
    width: 340px;
    padding-top: 6px;
  }

  .l-cnt {
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 3px 3px #ddd;
  }

  .l-mrg {
    margin-top: 28px;
  }

  .l-i {
    display: inline-block;
    width: 24px;
    height: 24px;
    margin-right: 2px;
    background-size: auto;
    background-repeat: no-repeat;
    vertical-align: middle;
  }

  .cnt-label {
    position: relative;
    padding-right: 24px;
    margin-bottom: 15px;
  }

  .cnt-label span {
    position: relative;
    top: 2px;
    color: #707070;
    font-size: 18px;
  }

  .lb-action {
    position: absolute;
    top: 0px;
    right: 0px;
    cursor: pointer;
  }

  .lb-action i {
    display: block;
    color: #ccc;
    font-size: 18px;
  }

  #b-i i {
    font-size: 24px;
  }

  #i-box {
    color: #797979;
    font-size: 14px;
    line-height: 1.3;
  }

  #intro-line {
    margin-top: 17px;
  }

  #u-occ {
    margin: 10px 0px;
  }

  #u-occ a {
    color: #2196f3;
  }

  #u-loc i {
    color: #2196f3;
    font-size: 16px;
    margin-left: -3px;
    margin-right: 2px;
    margin-top: -1px;
    vertical-align: middle;
  }

  #u-loc a {
    position: relative;
    top: 1px;
    color: #2196f3;
  }

  #photos {
    padding: 2px;
    margin: 15px -20px -20px -20px;
  }

  #photos .td {
    width: 33.333%;
    height: 112px;
    border: 2px solid #fff;
    box-sizing: border-box;
    background-color: #f1f1f1;
    background-position: 50% 25%;
    background-size: cover;
  }

  #k-nm {
    color: #b8b8b8;
    font-size: 15px;
    font-style: normal;
    margin-left: 8px;
    cursor: pointer;
  }

  .q-ad-c {
    padding: 2px;
  }

  .q-ad {
    display: block;
    padding: 8px;
    border: 1px solid #eeeeee;
    background-color: #fafafa;
    border-radius: 4px;
  }

  .q-ad img {
    display: inline;
    width: 24px;
    height: 24px;
    margin-right: 5px;
    vertical-align: middle;
  }

  .q-ad span {
    position: relative;
    top: 1px;
    color: #242424;
    font-size: 14px;
    text-align: center;
  }

  #add_q {
    color: #858585;
    text-align: center;
    margin-top: 10px;
    background-color: #fff;
    border-color: #f1f1f1;
  }

  #add_q i {
    font-size: 17px;
    margin-right: -3px;
    vertical-align: middle;
  }

  #add_q span {
    color: #858585;
    font-size: 12.4px;
    position: relative;
    top: -1px;
  }

  #t-box {
    font-size: 14px;
    color: #686868;
    padding-top: 24px;
    line-height: 18px;
  }

  #t-box a {
    margin-right: 5px;
  }

  #t-box a,
  #t-more {
    color: #999;
  }

  #t-more {
    cursor: pointer;
  }

  #t-more i {
    font-size: 15px;
    vertical-align: middle;
  }

  #cpy-nt {
    margin-top: 4px;
  }

  #m-col {
    padding: 0px 55px;
  }

  .m-mrg {
    margin-bottom: 28px;
  }

  #p-tabs {
    position: relative;
    font-size: 13px;
    color: #919191;
    text-align: center;
    padding: 13px 20px;
    margin-top: -64px;
    background-color: #fff;
    box-shadow: 0px 3px 3px #ddd;
    z-index: 3;
  }

  #p-tabs-m .td {
    width: 16.6666667%;
    cursor: pointer;
  }

  #p-tabs-m .td.active {
    color: #ee6000;
  }

  #p-tabs-m span {
    position: relative;
  }

  #p-tabs-m .td.active span:after {
    content: "";
    position: absolute;
    left: 0px;
    right: 0px;
    bottom: -13px;
    height: 4px;
    background-color: #ee6000;
  }

  #p-tabs-m .td i {
    display: block;
    font-size: 24px;
    margin-bottom: 5px;
  }

  #p-tab-m {
    width: 1px;
    color: #ccc;
    cursor: pointer;
  }

  #p-tab-m i {
    margin-right: -4px;
  }

  #composer {
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 3px 3px #ddd;
  }

  #c-tabs-cvr {
    padding-bottom: 12px;
    border-bottom: 1px solid #ececec;
  }

  #c-tabs {
    width: auto;
    color: #919191;
  }

  #c-tabs .td {
    position: relative;
    width: 1px;
    padding: 0px 15px;
    white-space: pre;
    cursor: pointer;
  }

  #c-tabs .td:after {
    content: "";
    position: absolute;
    top: 50%;
    right: 0px;
    width: 1px;
    height: 12px;
    margin-top: -6px;
    background-color: #eaeaea;
  }

  #c-tabs .td:first-child {
    padding-left: 0px;
  }

  #c-tabs .td:last-child {
    padding-right: 0;
  }

  #c-tabs .td:last-child:after {
    display: none;
  }

  #c-tabs .td span {
    position: relative;
  }

  #c-tabs .td.active {
    color: #373737;
  }

  #c-tabs .td.active span:after {
    content: "";
    position: absolute;
    left: 0px;
    right: 0px;
    bottom: -20px;
    width: 10px;
    height: 10px;
    border: 1px solid transparent;
    border-color: transparent #ececec #ececec transparent;
    margin: 0 auto;
    background-color: #fff;
    transform: rotateZ(45deg);
  }

  #c-tabs .td i {
    font-size: 21px;
    margin-right: 4px;
    vertical-align: middle;
  }

  #c-tabs .td span {
    position: relative;
    top: 1px;
    font-size: 15px;
  }

  #c-c-main {
    position: relative;
    padding-top: 15px;
  }

  #p-c-i {
    width: 50px;
    border-radius: 50%;
    overflow: hidden;
  }

  #p-c-i img {
    display: block;
    width: 100%;
  }

  #c-inp {
    padding-left: 20px;
  }

  #c-inp input {
    width: 100%;
    font-size: 20px;
    border: 0;
    padding: 0;
    margin: 0;
  }

  #c-c-main input::placeholder {
    color: #666;
  }

  #insert_emoji {
    position: absolute;
    right: -2px;
    bottom: -10px;
    cursor: pointer;
  }

  #insert_emoji i {
    display: block;
    color: #ccced6;
    font-size: 21px;
  }

  .post {
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 3px 3px #ddd;
  }

  .p-p-pic {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
  }

  .p-p-pic img {
    width: 100%;
    display: block;
    border: 0;
  }

  .p-r-hdr {
    vertical-align: top;
    padding-left: 20px;
  }

  .p-u-info {
    color: #5a5959;
    font-size: 15px;
    margin-bottom: 7px;
  }

  .p-u-info a {
    color: #4267b2;
  }

  .p-dt {
    color: #a8a8a8;
    font-size: 13px;
  }

  .p-dt i {
    font-size: 14px;
    margin-right: 2px;
  }

  .p-dt span {
    position: relative;
    top: -2px;
  }

  .p-opt {
    position: relative;
    right: -3px;
    width: 1px;
    color: #ccc;
    cursor: pointer;
    vertical-align: top;
  }

  .p-cnt-v {
    display: block;
    margin: 20px -20px;
    cursor: pointer;
  }

  .p-acts {
    overflow: hidden;
  }

  .p-act {
    width: 24px;
    height: 24px;
    color: #a3a6aa;
    cursor: pointer;
  }

  .p-act span {
    position: relative;
    top: 1px;
    width: 20px;
    font-size: 15px;
    color: #a3a6aa;
  }

  .like {
    margin-right: 36px;
  }

  .like,
  .comment {
    width: 50px;
    float: left;
  }

  .p-act i {
    vertical-align: middle;
  }

  .like i,
  .comment i {
    margin-right: 6px;
  }

  .share {
    float: right;
    transform: rotateY(180deg);
    margin-right: -1px;
  }

  #loading {
    text-align: center;
    padding: 40px 0px;
  }

  #loading i {
    color: #4267b2;
    font-size: 32px;
    display: block;
  }

  #r-col {
    position: relative;
    width: 150px;
  }

  #chat-bar {
    position: absolute;
    top: -55px;
    right: 55px;
    bottom: 0px;
    left: 0px;
  }

  #chat-lb {
    color: #3a5795;
    font-size: 16px;
    text-align: center;
    margin: 23px 0px;
  }

  #chat-lb i {
    font-size: 18px;
    margin-right: 4px;
    vertical-align: middle;
  }

  #chat-lb span {
    position: relative;
    top: 2px;
  }

  .on-ct {
    position: relative;
    width: 50px;
    height: 50px;
    margin: 28px auto 0 auto;
    border-radius: 50%;
  }

  #cts .on-ct:first-child {
    margin-top: 0px;
  }

  .on-ct img {
    border-radius: 50%;
  }

  .on-ct.active:after {
    content: "";
    position: absolute;
    top: 3px;
    right: 2px;
    width: 10px;
    height: 10px;
    background-color: #2ecd18;
    border-radius: 50%;
    box-shadow: 0px 0px 0px 3px #e9ebee;
    z-index: 1;
  }

  #ct-sett {
    margin-top: 55px;
  }

  #ct-sett i {
    color: #3a5795;
    padding: 13px;
    background-color: #d8e4ff;
    border-radius: 50%;
    cursor: pointer;
  }

  #device-bar-2 {
    padding: 9px 0px 13px 0px;
    background-color: #000;
  }

  #device-bar-2 i {
    display: block;
    width: 40px;
    color: #fff;
    font-size: 40px;
    text-align: center;
    margin: 0 auto;
  }
</style>