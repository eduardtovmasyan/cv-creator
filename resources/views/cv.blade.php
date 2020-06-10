<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body style="max-width: 800px">
    <main role="main" id="cv-wrapper">
      <div class="page">
        <header>
          <h1 style="text-align: center;">{{$resume->firstname}} {{$resume->lastname}}</h1>
          <hr>
        </header>
        <section>
          <h2 style="text-align: center;">Information</h2>
          <hr>
          <ul>
            <li style="color: #0056b3;">Email: {{$resume->email}}</li>
            <li style="color: #0056b3;">Phone: {{$resume->phone}}</li>
            <li style="color: #0056b3;">Birthday: {{$resume->birthday}}</li>
          </ul>
        </section>
        <section class="resume_content">
          <article>
            <section>
              <h2 style="text-align: center;">Professional Experience</h2>
              <hr>
              @foreach($resume->workPlaces  as $exp)
              <h3><b>Position:</b> {{$exp->position}}<span style="float: right;">
                <time style="color: #009688;" datetime="2003-10-20" class="start">{{$exp->start}}</time>
                &#8211;
                <time style="color: #009688;" datetime="2007-05-29" class="end">{{$exp->end}}</time>
              </span></h3>
              <p><strong>Company: </strong>{{$exp->name}} </p>
              <p><b>Location: </b>{{$exp->place}}</p>
              @endforeach
            </section>
            <section>
              <h2 style="text-align: center;">Education</h2>
              <hr>
              @foreach($resume->educationEstablishments as $edu)
              <h3><b>Facultet:</b> {{$edu->facultet}}<span style="float: right;">
                <time style="color: #009688;" datetime="2003-10-20" class="start">{{$edu->start}}</time>
                &#8211;
                <time style="color: #009688;" datetime="2007-05-29" class="end">{{$edu->end}}</time>
              </span></h3>
              <p><strong>School/Institution name: </strong> {{$edu->name}} </p>
              <p><strong>Location: </strong> <b>{{$edu->place}}</b></p>
              @endforeach
            </section>
          </article>
        </section>
        <div class="resume_skills">
          <aside>
            
            <section>
              <h2 style="text-align: center;">Skills</h2>
              <hr>
              <ul class="technology">
                @foreach($resume->skills  as $skill)
                <li>{{$skill->name}}</li>
                @endforeach
              </ul>
            </section>
            <section>
              <h2 style="text-align: center;">Languages</h2>
              <hr>
              @foreach($resume->languages  as $language)
              <h3>Language: {{$language->name}}<span class="time">
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