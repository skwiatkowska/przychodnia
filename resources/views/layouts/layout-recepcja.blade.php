<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <script src="{{PUBLIC_URL}}js/jquery.js"></script>
    <link href="{{PUBLIC_URL}}css/bootstrap.min.css" rel="stylesheet">
    <script src="{{PUBLIC_URL}}js//bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="{{PUBLIC_URL}}css/business-casual.css" rel="stylesheet">
    <link href="{{PUBLIC_URL}}css/app.css" rel="stylesheet">


</head>
<body>


<nav class="navbar navbar-light " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">AGHmed</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
             <li>
                    <a href="/recepcja">Strona startowa</a>
                </li>
                <li>
                    <a href="/recepcja/lista_pacjentow">Pacjenci</a>
                </li>
                <li>
                    <a href="/recepcja/lista_lekarzy">Lekarze</a>
                </li>
                <li>
                    <a href="/recepcja/wizyty">Wizyty</a>
                </li>
                <li>
                     <a href="/logout">Wyloguj</a>
                </li>   
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<div class="container">

    <div class="row">
        {{--<div class="box">--}}

            @if (session('errors'))
                <div class="alert alert-dismissible alert-danger">
                    Wystąpiły następujące błędy:<br/>
                    <ul>
                        @foreach(session('errors') as $error)
                            <li>{!!$error!!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if (session('info'))
                <div class="container2">
                    <div class="alert alert-success">
                        <ul>
                            <li><strong>{{session('info')}}</strong></li>
                        </ul>
                    </div>
                </div>
            @endif

        {{--</div>--}}
    </div>
</div>



@yield('content')


<!-- jQuery -->
<script src="{{PUBLIC_URL}}js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{PUBLIC_URL}}js/bootstrap.min.js"></script>


<script>
$(document).ready(function()  {
        var el = document.getElementsByClassName('redirectBtn');
        for(var i=0; i<el.length; i++) {
            if (el[i].name.length <= 7){
                el[i].innerText = "brak wizyty";
                el[i].disabled = true;
            }
            else{
                el[i].innerText = "Profil pacjenta";
                el[i].classList.remove("btn-gray");
                el[i].classList.add("btn-info");

            }
        }
        var newDescr = document.getElementById("noweTerminy");
        newDescr.style.display = "none";
        
        var noVisitsOnThatDay = document.getElementById("brakWizytDanegoDnia");
        noVisitsOnThatDay.style.display = "none";

        getExactDate();
 
    } )  


function goToAPatientProfile(arg){
    console.log(arg);
    window.location.href = "/recepcja/pacjent/".concat(arg);

};

function showOrHideVisitDescriptionForm() {
  var x = document.getElementById("noweTerminy");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
};


function checkIfAnyChechboxIsSelected(id) {
    var checked = $(id).find(':checked').length;
    console.log(checked);
   

}


function getExactDate() {
  var input, filter, data, label, i, txtValue;
  input = document.getElementById("wybierzDzienInput");
  filter = input.value.toUpperCase();
  data = document.getElementsByClassName("data");
  console.log(filter);

  var noneCounts = 0;
  for (i = 0; i < data.length; i++) {
    label = data[i].getElementsByTagName("label")[0];
    
    if (label) {
      txtValue = label.textContent || label.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        data[i].style.display = "";
        document.getElementById("brakWizytDanegoDnia").style.display = "none";
      } else {
        data[i].style.display = "none";
        noneCounts += 1;
      }
    }
  }
  console.log(noneCounts);

  if(data.length == noneCounts){
        document.getElementById("brakWizytDanegoDnia").style.display = "";
  }
}
</script>


</body>
</html>