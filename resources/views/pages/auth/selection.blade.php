<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Platform Aisha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <h3  class="text-center">حدد طريقه الدخول </h3>
    <div class="container">
        <div class="row">
          <div class="col align-self-start">
            <div class="" style="width: 10rem;">
                <a class="" title="ادمن" href="{{route('login.show','admin')}}">
                    <img  card-img-top  alt="user-img" width="100px;" src="{{ asset('images/admin.png')}}">
                </a> 
                <h5 class="title">Login Admin</h5>              
            </div>
          </div>
          <div class="col align-self-center">
           <div class="" style="width: 10rem;">
                <a class="" title="معلم" href="{{route('login.show','teacher')}}">
                    <img card-img-top  alt="user-img" width="100px;" src="{{ asset('images/teacher.png')}}">
                </a> 
                <h5 class="title">Login Teacher</h5>              
            </div>
          </div>
          <div class="col align-self-end">
          <div class="" style="width: 10rem;">
                <a class="" title="طالب" href="{{route('login.show','student')}}">
                    <img  card-img-top alt="user-img" width="100px;" src="{{ asset('images/student.png')}}">
                </a> 
                <h5 class="title">Login Student</h5>              
            </div>
          </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>