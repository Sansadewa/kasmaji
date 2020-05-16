<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.4.93/css/materialdesignicons.min.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo base_url();?>/public/images/favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/landing/assets/css/bootstrap.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/landing/assets/css/aos.css">
    <!-- custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/landing/assets/css/styles.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">

    <title>STIS 57</title>
  </head>
  <body>
    <div class="bg-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-sm-12 d-sm-none d-none d-md-block d-lg-block">
            <a class="navbar-brand" href="#">
              <img src="<?php echo base_url(); ?>public/landing/assets/img/logo.png" style="height: 50px">
            </a>
          </div>
          <div class="col-lg-9 d-sm-none d-none d-md-block d-lg-block">
            <ul class="nav nav-white justify-content-end">
              <li class="nav-item">
                <a class="nav-link btn" style="background-color: white; color: #0045ba !important; border-radius: 99px;" href="<?php echo base_url(); ?>login"> &nbsp;&nbsp;&nbsp; Login &nbsp;&nbsp;&nbsp;</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Disabled</a>
              </li> -->
            </ul>
          </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
        <center>
          <h1 style="color:white" data-aos="flip-up" data-aos-delay="300"><b>SELAMAT DATANG!</b></h1>
          <p style="color:rgba(255,255,255,0.7); padding: 0 10%;" data-aos="flip-down" data-aos-delay="600">"Website ini bertujuan untuk memudahkan akses informasi kegiatan kemahasiswaan dan berisi data mengenai Mahasiswa Tingkat IV T.A 2018/2019. Anda dapat mengakses baik informasi akademik maupun kegiatan non akademik yang ada di Politeknik Statistika STIS."</p>
          <a class="btn d-lg-none d-md-none d-sm-block d-block" style="background-color: white; color: #0045ba !important; border-radius: 99px; max-width: 150px" href="<?php echo base_url(); ?>login"> &nbsp;&nbsp;&nbsp; Login &nbsp;&nbsp;&nbsp;</a>
        </center>
      </div>
    </div>
    <div class="bg-grey" style="padding: 50px 0">
      <div class="container">
        <!-- countdown -->
        <div class="card" data-aos="fade-up" style="top: -220px; padding: 20px 0; max-width: 700px; margin: 0 auto -180px;">
          <div class="card-body">
            <center>
              <h4 class="card-title"><b>Countdown KKBS</b></h4>
              <hr>
              <ul class="countdown">
                <li><span id="days"></span>days</li>
                <li><span id="hours"></span>Hours</li>
                <li><span id="minutes"></span>Minutes</li>
                <li><span id="seconds"></span>Seconds</li>
              </ul>
            </center>
          </div>
        </div>
        <!-- timeline -->
        <center>
          <h3 data-aos="fade-up"> T I M E L I N E </h3><br><br>
        </center>  
        <section id="timeline">
          <article data-aos="fade-up">
            <div class="inner">
              <span class="date">
                <span class="day">22</span>
                <span class="month">Feb</span>
                <!-- <span class="year">2014</span> -->
              </span>
              <h2>Lomba Gambar</h2>
              <p>Yuk, kembangkan imajinasi dan kreasimu disini! Persiapkan dirimu ya!</p>
            </div>
          </article>
          <article data-aos="fade-up">
            <div class="inner">
              <span class="date">
                <span class="day">23</span>
                <span class="month">Mar</span>
                <!-- <span class="year">2014</span> -->
              </span>
              <h2>Fun Games!</h2>
              <p>Disini kamu bakalan di tes keakrabannya dengan teman-teman kamu!</p>
            </div>
          </article>
          <article data-aos="fade-up">
            <div class="inner">
              <span class="date">
                <span class="day">27</span>
                <span class="month">Mar</span>
                <!-- <span class="year">2014</span> -->
              </span>
              <h2>OLIMPIADE 57</h2>
              <p>Kendurkan otot kencangkan tenaga! Ayok kita bermain dan berolahraga lagi!</p>
            </div>
          </article>
          <article data-aos="fade-up">
            <div class="inner">
              <span class="date">
                <span class="day">6</span>
                <span class="month">Apr</span>
                <!-- <span class="year">2014</span> -->
              </span>
              <h2>Ranking 1</h2>
              <p>Ayo uji kecepatan dan reflek kamu disini, jangan lupa perluas wawasan ya!</p>
            </div>
          </article>
          <article data-aos="fade-up">
            <div class="inner">
              <span class="date">
                <span class="day">27</span>
                <span class="month">Apr</span>
                <!-- <span class="year">2014</span> -->
              </span>
              <h2>Last Gathering 57</h2>
              <p>Ini bukan menjadi pertanda sebuah perpisahan, melainkan menjadi tempat kita untuk saling mengakrabkan :)</p>
            </div>
          </article>
        </section>

      </div>
    </div>

    <div class="container" style="padding: 30px; color: grey; background-color: white;">
      <center> From KOMINFO-TI with   &#10084; </center>
    </div>
    <!-- jQuery first, then Popper.js, Bootstrap JS, then AOS JS kampret -->
    <script src="<?php echo base_url(); ?>public/landing/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/landing/assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/landing/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/landing/assets/js/aos.js"></script>
    <script>
      AOS.init();
      const second = 1000,
      minute = second * 60,
      hour = minute * 60,
      day = hour * 24;

      let countDown = new Date('Feb 15, 2019 00:08:00').getTime(),
          x = setInterval(function() {

            let now = new Date().getTime(),
                distance = countDown - now;
            if (distance <= 0){
              distance = 0;
            }

            document.getElementById('days').innerText = Math.floor(distance / (day)),
              document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
              document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
              document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
            
            //do something later when date is reached
            //if (distance < 0) {
            //  clearInterval(x);
            //  'IT'S MY BIRTHDAY!;
            //}

          }, second)
    </script>
  </body>
</html>