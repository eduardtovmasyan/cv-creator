<template>
<div style="margin-top: 100px;position: relative;">
  <main role="main" id="cv-wrapper" style="max-width: 800px;top: 0;left: 0;right: 0;bottom: 0;margin: 0 auto;">
  <div class="page">
  <!-- 1. Header -->
  <header>
      <h1 style="text-align: center;">{{resume.firstname}} {{resume.lastname}}</h1>
      <hr>
  </header>
  <section>
        <h2 style="text-align: center;">Information</h2>
        <hr>
        <ul>
          <li style="color: #0056b3;">Email: {{resume.email}}</li>
          <li style="color: #0056b3;">Phone: {{resume.phone}}</li>
          <li style="color: #009688;">Birthday: {{resume.birthday}}</li>
        </ul>
  </section>
  <section >
    <article>
      <section>
        <h2 style="text-align: center;">Professional Experience</h2>
        <hr>
        <div v-for="exp in resume.workExperience">
        <h3><b>Position:</b> {{exp.position}}
          <time style="color: #009688;" >{{exp.start}}</time>
          &#8211;
          <time style="color: #009688;" >{{exp.end}}</time>
          </h3>
        <p><strong>Company: </strong>{{exp.name}} </p>
        <p><b>Location: </b>{{exp.place}}</p>
      </div>
      </section>
      <section>
        <h2 style="text-align: center;">Education</h2>
        <hr>
        <div v-for="edu in resume.education">
        <h3><b>Facultet:</b> {{edu.facultet}}
          <span class="time">
          <time style="color: #009688;" >{{edu.start}}</time>
          &#8211;
          <time style="color: #009688;" >{{edu.end}}</time>
          </span></h3>
        <p><strong>School/Institution name: </strong> {{edu.name}} </p>
        <p><strong>Location: </strong> <b>{{edu.place}}</b></p>
        </div>
      </section>
    </article>
  </section>
  <div >
    <aside> 
      <section>
        <h2 style="text-align: center;">Skills</h2>
        <hr>
        <ul >
          <li v-for="skill in resume.skills">{{skill.name}}</li>
        </ul>
      </section>
      <section>
        <h2 style="text-align: center;">Languages</h2>
        <hr>
        <div v-for="language in resume.languages">
            <h3>Language: {{language.name}}<span >
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