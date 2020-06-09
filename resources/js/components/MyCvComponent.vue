<template>
<div style="margin-top: 100px;">
  <main role="main" id="cv-wrapper">
  <div class="page">
  <!-- 1. Header -->
  <header>
      <h1>{{resume.firstname}} {{resume.lastname}}</h1>
  </header>
  <section class="resume_content">
    <article>

      <section>
        <h2>Professional Experience</h2>
        <div v-for="exp in resume.workExperience">
        <h3>{{exp.position}}<span class="time">
          <time datetime="2003-10-20" class="start">{{exp.start}}</time>
          &#8211;
          <time datetime="2007-05-29" class="end">{{exp.end}}</time>
          </span></h3>
        <p><strong>{{exp.name}}</strong> <b>{{exp.place}}</b></p>
        </div>
      </section>

      <section>
        <h2>Education</h2>
        <div v-for="edu in resume.education">
        <h3>{{edu.facultet}}<span class="time">
          <time datetime="2003-10-20" class="start">{{edu.start}}</time>
          &#8211;
          <time datetime="2007-05-29" class="end">{{edu.end}}</time>
          </span></h3>
        <p><strong>{{edu.name}}</strong> <b>{{edu.place}}</b></p>
        </div>
      </section>
    </article>
  </section>
  <div class="resume_skills">
    <aside>
      <section>
        <h2>Information</h2>
        <ul>
          <li><a href="https://codepen.io/jaredpearce/full/iBdxb">{{resume.email}}</a></li>
          <li><a href="http://mathworks.com/examples" target="_blank">{{resume.phone}}</a></li>
          <li><a href="http://coursework.mathworks.com" target="_blank">{{resume.birthday}}</a></li>
        </ul>
      </section>
      <section>
        <h2>Skills</h2>
        <ul class="technology">
          <li v-for="skill in resume.skills">{{skill.name}}</li>
        </ul>
      </section>
      <section>
        <h2>Languages</h2>
            <div v-for="language in resume.languages">
            <h3 >{{language.name}}<span class="time">
               </span></h3>
               <p>{{language.description}}</p>  
            </div>
      </section>
    </aside>
  </div>
</div>
</main>
<div class="text-center p-5" >
  <button @click="toPDF">Export PDF</button>
</div>
</div>
</template>
<script >
    export default{
      data(){
        return{
          resume: {},
          user_id: localStorage.getItem('user_id'),
          token: localStorage.getItem('bearerToken'),
        }
      },
      mounted() {
        let id  = this.user_id

        this.axios.get('api/resume/' + id,  
          {
            headers: {
              'Authorization': 'Bearer ' + this.token,
            }
          })
        .then(response => {
         this.resume = response.data.data
        })
      },
    methods:{
      toPDF(e){
          this.axios.get('api/download', 
          {
            headers: {
              'Authorization': 'Bearer ' + this.token,
            }
          })
        .then(response => {
          console.log(response);
        })
        },
    }
}
</script>