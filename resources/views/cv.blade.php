<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
</head>
<main role="main" id="cv-wrapper">
  <div class="page">
  <!-- 1. Header -->
  <header>
      <h1>{{$resume->firstname}} {{$resume->lastname}}</h1>
  </header>
  <section class="resume_content">
    <article>
      <section>
        <h2>Professional Experience</h2>
        @foreach($resume->workPlaces  as $exp)
        <h3>{{$exp->position}}<span class="time">
          <time datetime="2003-10-20" class="start">{{$exp->start}}</time>
          &#8211;
          <time datetime="2007-05-29" class="end">{{$exp->end}}</time>
          </span></h3>
        <p><strong>{{$exp->name}}</strong> <b>{{$exp->place}}</b></p>
        @endforeach
      </section>
      <section>
        <h2>Education</h2>
        @foreach($resume->educationEstablishments as $edu)
        <h3>{{$edu->facultet}}<span class="time">
          <time datetime="2003-10-20" class="start">{{$edu->start}}</time>
          &#8211;
          <time datetime="2007-05-29" class="end">{{$edu->end}}</time>
          </span></h3>
        <p><strong>{{$edu->name}}</strong> <b>{{$edu->place}}</b></p>
        @endforeach
      </section>
    </article>
  </section>
  <div class="resume_skills">
    <aside>
      <section>
        <h2>Information</h2>
        <ul>
          <li><a href="https://codepen.io/jaredpearce/full/iBdxb">{{$resume->email}}</a></li>
          <li><a href="http://mathworks.com/examples" target="_blank">{{$resume->phone}}</a></li>
          <li><a href="http://coursework.mathworks.com" target="_blank">{{$resume->birthday}}</a></li>
        </ul>
      </section>
      <section>
        <h2>Skills</h2>
        <ul class="technology">
        @foreach($resume->skills  as $skill)
          <li>{{$skill->name}}</li>
        @endforeach
        </ul>
      </section>
      <section>
        <h2>Languages</h2>
         @foreach($resume->languages  as $language)
            <h3>{{$language->name}}<span class="time">
               </span></h3>
               <p>{{$language->description}}</p>  
              @endforeach
      </section>
    </aside>
  </div>
</div>
</main>
</body>
</html>
