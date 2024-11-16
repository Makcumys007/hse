


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
	    <!-- Подключение CSS -->
	<link href="{{ url('bootstrap/css/style.css')}}" rel="stylesheet"> 
	<!-- Подключение JS (необязательно, если вы не используете компоненты, требующие JavaScript) 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
  <style>
    #anim {
        max-width: 100%;  /* задайте ширину контейнера */        
        overflow: hidden; /* скройте текст, который выходит за границы контейнера */
      }
    #bg-black {
      background-color: black;
    }

    .data-size {
      font-size: 60px;
    }

   

        
</style>


	<style>
		
	</style>

    <title>KAZ MINERALS BOZSHAKOL LLC</title>
</head>
<body id="bg-black">
    <!-- Здесь вы можете добавить свой контент -->
  <div class="container mt-5 border border-dark">
    <div class="row">
        <div class="col-md-3">
          <img  src="{{ url('images/logoKPP.png')}}" class="img-fluid border-0" width="250">          
        </div>
        <div class="col-md-9">
          <br>
          <h1 class="mt-2 text-white">KAZ MINERALS BOZSHAKOL (КАЗ МИНЕРАЛЗ БОЗШАКОЛЬ)</h1>       
        </div>
     
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
          
                                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                         <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                      <table class="table">
                                                        <tbody>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">ДАТА</h2></th>
                                                            <td><h1 class="text-danger data-size  data-size ">{{ $currentDate }}</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">ДАТА ПОСЛЕДНЕГО НЕСЧАТНОГО СЛУЧАЯ</h2></th>
                                                            <td><h1 class="text-danger data-size  data-size ">@if($lastRecord->last_lti_date)
    {{ \Carbon\Carbon::parse($lastRecord->last_lti_date)->format('d.m.Y') }}
@else
    {{ '' }}
@endif</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">КОЛИЧЕСТВО ДНЕЙ БЕЗ НЕСЧАСТНОГО СЛУЧАЯ</h2></th>
                                                            <td><h1 class="text-danger data-size ">{{ $lastRecord->lost_time_injuries_free_days ?? '' }}</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">КОЛИЧЕСТВО НЕСЧАСТНЫХ СЛУЧАЕВ В ЭТОМ ГОДУ</h2></th>
                                                            <td><h1 class="text-danger data-size ">{{ $lastRecord->count_of_lti_year ?? '' }}</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">ТЕМПЕРАТУРА, °С</h2></th>
                                                            <td><h1 class="text-danger data-size "><span id="temperature"></span>  </h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">СКОРОСТЬ ВЕТРА, м/с</h2></th>
                                                            <td><h1 class="text-danger data-size "><span id="wind"></span> </h1></td>                                                            
                                                          </tr>
                                                          
                                                        </tbody>
                                                      </table>
                                                       
                                                </div>

                                                <div class="carousel-item ">
                                                     <table class="table ">
                                                        <tbody>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">DATE</h2></th>
                                                            <td><h1 class="text-danger data-size  data-size ">{{ $currentDate }}</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">LAST LTI DATE</h2></th>
                                                            <td><h1 class="text-danger data-size  data-size ">@if($lastRecord->last_lti_date)
    {{ \Carbon\Carbon::parse($lastRecord->last_lti_date)->format('d.m.Y') }}
@else
    {{ '' }}
@endif</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">NUMBER OF DAYS WITHOUT LTI</h2></th>
                                                            <td><h1 class="text-danger data-size ">{{ $lastRecord->lost_time_injuries_free_days ?? '' }}</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">NUMBER OF LTI THIS YEAR</h2></th>
                                                            <td><h1 class="text-danger data-size ">{{ $lastRecord->count_of_lti_year ?? '' }}</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">TEMPERATURE, °С</h2></th>
                                                            <td><h1 class="text-danger data-size "><span id="temperature"></span>  </h1></td>                                                              
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">WIND SPEED, m/s</h2></th>
                                                            <td><h1 class="text-danger data-size "> <span id="wind"></span></h1></td>                                                             
                                                          </tr>
                                                          
                                                        </tbody>
                                                      </table>
                                                </div>

                                                <div class="carousel-item ">
                                                     <table class="table ">
                                                        <tbody>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">КҮНІ</h2></th>
                                                            <td><h1 class="text-danger data-size  data-size ">{{ $currentDate }}</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">СОҢҒЫ ЖАЗАТАЙЫМ ОҚИҒА КҮНІ</h2></th>
                                                            <td><h1 class="text-danger data-size  data-size ">@if($lastRecord->last_lti_date)
    {{ \Carbon\Carbon::parse($lastRecord->last_lti_date)->format('d.m.Y') }}
@else
    {{ '' }}
@endif</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">ЖАЗАТАЙЫМ ОҚИҒАСЫЗ КҮНДЕР САНЫ</h2></th>
                                                            <td><h1 class="text-danger data-size ">{{ $lastRecord->lost_time_injuries_free_days ?? '' }}</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">ОСЫ ЖЫЛЫҒЫ ЖАЗАТАЙЫМ ОҚИҒАЛАР САНЫ</h2></th>
                                                            <td><h1 class="text-danger data-size ">{{ $lastRecord->count_of_lti_year ?? '' }}</h1></td>                                                            
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">ТЕМПЕРАТУРА, °С</h2></th>
                                                            <td><h1 class="text-danger data-size "> <span id="temperature"></span>  </h1></td>                                                              
                                                          </tr>
                                                          <tr>
                                                            <th scope="row"><h2 class="mt-2 text-white">ЖЕЛДІҢ ЖЫЛДАМДЫҒЫ, m/s</h2></th>
                                                            <td><h1 class="text-danger data-size "> <span id="wind"></span></h1></td>                                                             
                                                          </tr>
                                                          
                                                        </tbody>
                                                      </table>
                                                </div>
    
                                          </div>
                                </div>





        </div>
             
        

             
       

        <div class="col-md-6">
          <table class="table">
                                                        <tbody>
                                                          <tr>
                                                            <th scope="row"><h1 id="clock" class="text-danger data-size">Javascript Clock</h1></th>
                                                            <td></td>                                                            
                                                          </tr></tbody></table>
          
          <div class="embed-responsive embed-responsive-16by9">
              <video controls loop autoplay muted  class="video">
                    <source src="{{ asset('storage/' . $video) }}" type="video/mp4">
                </video>
          </div>
        </div>
     
    </div>
    <div class="row">       
        <div class="col ">        
          <h1 id="anim"  class="mt-1 text-danger "> {{ $lastRecord->running_string ?? '' }} </h1>       
        </div>
     
    </div>
 </div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js"></script>
<script>
    $('#anim').marquee({
        duplicated: false, // задает непрерывность текста
        startVisible: true, // текст должен заполнять пространство при начале
        duration: 10000, // продолжительность анимации (10 секунд)
        pauseOnHover: true // останавливать анимацию при наведении курсора
    });

   /*global window*/
(function (global) {
    "use strict";
    function Clock(el) {
        var document = global.document;
        this.el = document.getElementById(el);
        this.months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        this.days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    }
    Clock.prototype.addZero = function (i) {
        if (i < 10) {
            i = "0" + i;
            return i;
        }
        return i;
    };
    Clock.prototype.updateClock = function () {
        var now, year, month, dayNo, day, hour, minute, second, result, self;
        now = new global.Date();
        year = now.getFullYear();
        month = now.getMonth();
        dayNo = now.getDay();
        day = now.getDate();
        hour = this.addZero(now.getHours());
        minute = this.addZero(now.getMinutes());
        second = this.addZero(now.getSeconds());
        result = hour + ":" + minute + ":" + second;
        self = this;
        self.el.innerHTML = result;
        global.setTimeout(function () {
            self.updateClock();
        }, 1000);
    };
    global.Clock = Clock;
}(window));

function addEvent(elm, evType, fn, useCapture) {
    "use strict";
    if (elm.addEventListener) {
        elm.addEventListener(evType, fn, useCapture);
    } else if (elm.attachEvent) {
        elm.attachEvent('on' + evType, fn);
    } else {
        elm['on' + evType] = fn;
    }
}

addEvent(window, "load", function () {
    if (document.getElementById("clock")) {
        var clock = new Clock("clock");
        clock.updateClock();
    }
    
});

async function fetchWeather() {
    try {
        const response = await fetch('http://10.34.3.221:3000/weather');
        const data = await response.json();
        
        document.querySelectorAll('#temperature').forEach(element => {
            element.innerText = data.temperature;
        });
        
        document.querySelectorAll('#wind').forEach(element => {
            element.innerText = data.wind;
        });
        
        document.querySelectorAll('#humidity').forEach(element => {
            element.innerText = data.humidity;
        });
    } catch (error) {
        console.error('Ошибка при получении данных о погоде:', error);
    }
}

// Вызов функции при загрузке страницы
window.onload = fetchWeather;

</script>
    <script>
    

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
setInterval(clearBrowserData, {{ $lastRecord->refresh_page_time }} * 1000);

</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
