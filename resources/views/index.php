


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <!-- Подключение CSS -->
	<link href="{{ url('bootstrap/css/style.css')}}" rel="stylesheet"> 
	<!-- Подключение JS (необязательно, если вы не используете компоненты, требующие JavaScript) 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
  <style>
    #anim {
        max-width: 100%;  /* задайте ширину контейнера */        
        overflow: hidden; /* скройте текст, который выходит за границы контейнера */
      }
   
    .data-size {
      font-size: 60px;
    }

    body {
    background-image: url("./images/kazminbgr.png");
    background-repeat: no-repeat;
    background-color: white;
    }

    .h1title {
      color: #024779;
      font-family: TimesNewRoman;
      font-size: 24px;
    }

    .num_w {
        width: 50px;
        border: #024779 solid 5px;
        background-color: #FFFFFF;        
        font-family: TimesNewRoman;
    }

    .num_w h1 {
        text-align: center;
        font-size: 200%;
        padding-left: 10px;
        padding-right: 10px;
        color: #024779;
    }
    .num_w_p {
        outline: green solid 0px;
        background-color: #daf2fc;        
        font-family: TimesNewRoman;
    }
    .num_g {
        width: 50px;
        border: #024779 solid 5px;
        background-color: #00ae51;
    }
    .num_g h1 {
        text-align: center;
        font-size: 200%;
        padding-left: 10px;
        padding-right: 10px;        
        color: white;
    }
    .num_g_p {
        outline: green solid 0px;
        background-color: #00ae51;        
        font-family: TimesNewRoman;
    }
    .statistic {
        height: 100px;
        outline: orange solid 0px;
        background: rgba(255, 255, 255, 0.5);
        width: 100%;
    }

    
/* ----------------- Weather ------------------*/

#weather {
    height: 65px;
    width: 100%;
    outline: orange solid 0px;
    padding-top: 5px;
    padding-bottom: 5px;
   /* background: rgba(255, 255, 255, 0.5); */


    width: 100%;
  
}

#weather table {
    float: right;
    margin-left: auto;
    margin-right: auto;
    outline: orange solid 0px;
}





.background_wthr img {
    padding-left: 10px;
}

.background_wthr h1 {
    text-align: center;
    font-size: 200%;  
    font-weight: bold;
    padding-left: 5px;
    padding-right: 10px;
  /*  color: red; */
  /*  color: #024779; */
    color: #c96814;
}


#scrolling-block {
    width: 100%;
    margin-top: 18px;
    height: 490px; /* Задаем высоту блока */
    overflow: hidden;
    position: relative;
    border: #024779 solid 5px;
    background-color: #FFFFFF;  
}
#scrolling-content {
    position: absolute;
    width: 100%;
}
#video {  
  border: #024779 solid 5px;
  background-color: #FFFFFF; 
}
    
</style>


	<style>
		
	</style>

    <title>KAZ MINERALS BOZSHAKOL LLC</title>
</head>
<body id="bg-black">
    <!-- Здесь вы можете добавить свой контент -->
<div class="container mt-3 ">
    <!-- Row 1 -->

  <div class="row">
          <div class="col-md-3">
            <img  src="images/logo.png" class="img-fluid border-0" width="300">          
          </div>
          <div class="col-md-6">
                  <div id="carouselExampleSlidesOnly" class="carousel slide h1title" data-ride="carousel">
                          <div class="carousel-inner mt-3">
                                  <div class="carousel-item active">
                                          <h1>ЕҚ, ӨҚ БОЙЫНША АҚПАРАТТЫҚ КЕСТЕ</h1>
                                  </div>
                                  <div class="carousel-item ">
                                          <h1>ИНФОРМАЦИОННАЯ ДОСКА ПО ОТ И ПБ</h1>
                                  </div>
                                  <div class="carousel-item ">
                                          <h1>HEALTH AND SAFETY BOARD</h1>
                                  </div>        
                          </div>
                  </div>  
          </div>
          <div class="col-md-3">
            <img  src="images/logo2.png" class="img-fluid border-0" width="500">          
          </div>
      
  </div>

  <!--Row 2 -->

  <div class="row mt-3">
    
  <div id="carouselExampleSlidesOnly" class="carousel slide statistic" data-ride="carousel">
                  <div class="carousel-inner mt-3">
                          <div class="carousel-item active">
                                  <table>
                                          <tbody>
                                                  <tr>
                                                          <td class="num_w"><h1><?php echo $lti;?></h1></td>
                                                          <td class="num_w_p"><h4>Жоғалған уақыт жарақаты</h4></td>
                                                          <td class="num_w"><h1><h1><?php echo $mtc;?></h1></td>
                                                          <td class="num_w_p"><h4>Медициналық көмек көрсету жағдай</h4></td>
                                                          <td class="num_w"><h1><?php echo $fac;?></h1></td>
                                                          <td class="num_w_p"><h4>Алғашқы жәрдем көрсету жағдай</h4></td>
                                                          <td class="num_g"><h1><?php echo $lti_fi;?></h1></td>
                                                          <td class="num_g_p"><h4>Еңбекке қабілеттілігін жоғалтпаусыз күндер</h4></td>
                                                          <td class="num_g"><h1><?php echo $smf;?></h1></td>
                                                          <td class="num_g_p"><h4>Қауіпсіз адам-сағат саны</h4></td>                
                                                          <td class="num_w"><h1><?php echo $current_date;?></h1></td>
                                                          <td class="num_w_p"><h4>Күні</h4></td>
                                                  </tr>
                                          </tbody>
                                  </table>
                          </div>  
                          <div class="carousel-item ">
                                  <table>
                                          <tbody>
                                                  <tr>
                                                          <td class="num_w"><h1><?php echo $lti;?></h1></td>
                                                          <td class="num_w_p"><h5>Травма с потерей рабочего времени</h5></td>
                                                          <td class="num_w"><h1><h1><?php echo $mtc;?></h1></td>
                                                          <td class="num_w_p"><h5>Случай оказания медицинской помощи</h5></td>
                                                          <td class="num_w"><h1><?php echo $fac;?></h1></td>
                                                          <td class="num_w_p"><h5>Оказания первой помощи</h5></td>
                                                          <td class="num_g"><h1><?php echo $lti_fi;?></h1></td>
                                                          <td class="num_g_p"><h5>Дни без потери трудоспособности</h5></td>
                                                          <td class="num_g"><h1><?php echo $smf;?></h1></td>
                                                          <td class="num_g_p"><h5>Безопасное количество человеко-часов</h5></td>                
                                                          <td class="num_w"><h1><?php echo $current_date;?></h1></td>
                                                          <td class="num_w_p"><h5>Дата</h5></td>
                                                  </tr>
                                          </tbody>
                                  </table>
                          </div>  
                          <div class="carousel-item ">
                                  <table>
                                          <tbody>
                                                  <tr>
                                                          <td class="num_w"><h1><?php echo $lti;?></h1></td>
                                                          <td class="num_w_p"><h4>Lost time Injuries</h4></td>
                                                          <td class="num_w"><h1><h1><?php echo $mtc;?></h1></td>
                                                          <td class="num_w_p"><h4>Medical Treatment</h4></td>
                                                          <td class="num_w"><h1><?php echo $fac;?></h1></td>
                                                          <td class="num_w_p"><h4>First Aid Cases</h4></td>
                                                          <td class="num_g"><h1><?php echo $lti_fi;?></h1></td>
                                                          <td class="num_g_p"><h4>Lost time Injuries Free Days</h4></td>
                                                          <td class="num_g"><h1><?php echo $smf;?></h1></td>
                                                          <td class="num_g_p"><h4>Safe men-hours</h4></td>                
                                                          <td class="num_w"><h1><?php echo $current_date;?></h1></td>
                                                          <td class="num_w_p"><h4>Date</h4></td>
                                                  </tr>
                                          </tbody>
                                  </table>
                          </div>
          
                  </div>
          </div> 
  </div>


          
  <!-- Row 3 -->


  <div class="row">
    <div class="col-md-6">
    <br>
    <br>
    <br>
       <!-- WWWWWW -->
       <div id="scrolling-block">
        <div id="scrolling-content">
            <?php
             foreach ( $carusel as $value) {
              echo "<div><img class=\"img-fluid\" width='870' src=\"";
              echo $value;
              echo "\"></div>";
          }  
          $carusel = array();
          ?>  
        </div>
        </div>
        <!-- WWWWWW -->
    </div>

    <div class="col-md-6">
      
       <!-- QQQQQQ -->
       <br>
       <div id="weather"> 
        				<div class="background_wthr"> 
        					<table>
        						<tr>
        							<td>
        						<img src="weather/<?php echo $desc_icon;?>" height="30" title="<?php echo $now_desc;?>">
        							</td>
        							<td>
        								 <img src="weather/icons8-thermometer-80.png" height="30" >
        							</td>
        							<td>
        								<h1>... °C</h1>
        							</td>
        							<td>
        								 <img src="weather/icons8-wind-80.png" height="30" >
        							</td>
        							<td>
        								<h1>...</h1>
        							</td>
        							<td>
        								<h1>m/s</h1>
        							</td>
        							<td>
        								 <img src="weather/icons8-wet-80.png" height="30" >
        							</td>
        							<td>
        								<h1><?php echo $humidity; ?></h1>
        							</td>
        						</tr>
        					</table>
        						

        				</div>
				</div>


        <!-- EEEEE --->
        <div class="row embed-responsive embed-responsive-16by9">
                  <video id="video" class="embed-responsive-item" controls loop autoplay muted>
                    <source src="<?php echo $file_3; ?>" type="video/mp4">
                  </video>
        </div>
        <!-- EEEEE --->

      <!-- QQQQQQ -->
    </div>
  </div>

  <div class="row">       
        <div class="col ">        
          <h2 id="anim"  class="mt-1 text-danger data-size"><?php echo $string; ?> </h2>       
        </div>
     
    </div>
  


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js"></script>
<script>
    

    $('#anim').marquee({
        duplicated: false, // задает непрерывность текста
        startVisible: true, // текст должен заполнять пространство при начале
        duration: 10000, // продолжительность анимации (10 секунд)
        pauseOnHover: true // останавливать анимацию при наведении курсора
    });

    $(document).ready(function(){
            function autoScroll() {
                $('#scrolling-content').animate({
                    top: '-500%'
                }, 200000, 'linear', function() {
                    $(this).css('top', '100%');
                    autoScroll();
                });
            }
            autoScroll();
        });


        function clearBrowserData() {
    // Очистка localStorage и sessionStorage
    localStorage.clear();
    sessionStorage.clear();

    // Функция для удаления всех файлов cookie
    function deleteAllCookies() {
        const cookies = document.cookie.split(";");

        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i];
            const eqPos = cookie.indexOf("=");
            const name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT;path=/";
        }
    }

    // Удаление всех файлов cookie
    deleteAllCookies();

    // Обновление страницы
    location.reload();
}

// Установка интервала для выполнения функции каждые 6 минут (360000 миллисекунд)
setInterval(clearBrowserData, 195000);
</script>

</body>
</html>
