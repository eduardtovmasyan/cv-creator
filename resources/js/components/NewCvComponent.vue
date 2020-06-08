<template>
<div>
  <div class="w3-light-grey">
    <!-- Page Container -->
    <div class="w3-content w3-margin-top" style="max-width:1400px;">
      <!-- The Grid -->
      <div class="w3-row-padding">
      </div>
      <!-- Right Column -->
      <div class="">
        <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Create CV</h2>
          <div class="w3-container">

            <div id="information" v-show="info">
            <h5 class="w3-opacity"><b>Tell Us About Yourself</b></h5>
            <label for="firstname">Firstname*</label>
            <p class="text-danger mt-2 mb-2" v-if="errors.firstname">{{ errors.firstname[0] }}</p>
            <input type="text" id="firstname" name="firstname">
            <label for="lastname">Lastname*</label>
            <p class="text-danger mt-2 mb-2" v-if="errors.lastname">{{ errors.lastname[0] }}</p>
            <input type="text" id="lastname" name="lastname">
            <label for="phone">Phone</label>
            <p class="text-danger mt-2 mb-2" v-if="errors.phone">{{ errors.phone[0] }}</p>
            <input type="text" id="phone" name="phone">
            <label for="email">Email*</label>
            <p class="text-danger mt-2 mb-2" v-if="errors.email">{{ errors.email[0] }}</p>
            <input type="email" id="email" name="email">
            <label for="birthday">Birthday*</label>
            <p class="text-danger mt-2 mb-2" v-if="errors.birthday">{{ errors.birthday[0] }}</p>
            <input type="date" id="birthday" name="birthday">
            <hr>
            </div>

            <div id="education" v-show="edu">
            <div class="edu">
            <h5 class="w3-opacity"><b>Education</b></button></h5>
            <label for="name">Name*</label>
            <input type="text" id="name" name="name">
            <label for="facultet">Facultet*</label>
            <input type="text" id="facultet" name="facultet">
            <label for="address">Address*</label>
            <input type="text" id="address" name="address">
            <label for="start">Start*</label>
            <input type="date" id="start" name="start">
            <label for="end">End*</label>
            <input type="date" id="end" name="end">
            </div>
            <button @click = "addEducation" type="button" class="float-right fa fa-plus mt-4" aria-hidden="true" id="eduButton"></button>
            <hr>
            </div>
            
            <div id="experience" v-show="exp">
            <div class="work mt-5">
            <h5 class="w3-opacity"><b>Work Experience</b></button></h5>
            <label for="company">Company*</label>
            <input type="text" id="company" name="company">
            <label for="position">Position*</label>
            <input type="text" id="position" name="position">
            <label for="location">Location*</label>
            <input type="text" id="location" name="location">
            <label for="start">Start*</label>
            <input type="date" id="start" name="start">
            <label for="end">End*</label>
            <input type="date" id="end" name="end">
            </div>
            <button @click = "addWork" type="button" class="float-right fa fa-plus mt-4" aria-hidden="true"></button>
            <hr>
            </div>

            <div id="languages" v-show="lang">
            <div class="Languages mt-5">
            <h5 class="w3-opacity"><b>Languages</b></button></h5>
            <label for="language">Language*</label>
            <input type="text" id="language" name="language">
            <select class="custom-select">
              <option value="" disabled selected>Choose your option</option>
              <option value="Native">Native</option>
              <option value="Upper Intermediate">Upper Intermediate</option>
              <option value="Intermediate">Intermediate</option>
              <option value="Pre-Intermediate">Pre-Intermediate</option>
              <option value="Elementary">Elementary</option>
            </select>
            </div>
            <button @click = "addLanguage" type="button" class="float-right fa fa-plus mt-4" aria-hidden="true"></button>
            <hr>
            </div>

            <div id="skills" v-show="skill">
            <div class="skills mt-5">
            <h5 class="w3-opacity"><b>Skills</b></button></h5>
            <label for="skill">Skill*</label>
            <input type="text" id="skill" name="skill">
            </div>
            <button @click = "addSkill" type="button" class="float-right fa fa-plus mt-4" aria-hidden="true"></button>
            <hr>
            </div>

          </div>
        </div>
        <br>
      </div>
      <div class="text-center p-5">
        <button v-show="creatButton" @click = "createCV">Create</button>
      </div>
      <!-- End Grid -->
    </div>
    <!-- End Page Container -->
  </div>
</div>
</template>
<script >
export default{
    data() {
      return {
        info: true,
        edu: true,
        exp: true,
        lang: true,
        skill: true,
        creatButton: true,
        data: {},
        token: localStorage.getItem('bearerToken'),
        errors: {},
      }
    },
    methods:{
        addEducation(e){
          $(e.target).before(`
            <div class="edu">
            <hr style="height:1px;border:none;color:#333;background-color:#333;">
            <label for="name">Name*</label>
            <input type="text" id="name" name="name">
            <label for="facultet">Facultet*</label>
            <input type="text" id="facultet" name="facultet">
            <label for="address">Address*</label>
            <input type="text" id="address" name="address">
            <label for="start">Start*</label>
            <input type="date" id="start" name="start">
            <label for="end">End*</label>
            <input type="date" id="end" name="end">
            </div>
          `)
        },
        addWork(e){
          $(e.target).before(`
            <div class="work">
            <hr style="height:1px;border:none;color:#333;background-color:#333;">
            <label for="company">Company*</label>
            <input type="text" id="company" name="company">
            <label for="position">Position*</label>
            <input type="text" id="position" name="position">
            <label for="location">Location*</label>
            <input type="text" id="location" name="location">
            <label for="start">Start*</label>
            <input type="date" id="start" name="start">
            <label for="end">End*</label>
            <input type="date" id="end" name="end">
            </div>
          `)
        },
        addLanguage(e){
          $(e.target).before(`
            <div class="Languages">
            <hr style="height:1px;border:none;color:#333;background-color:#333;">
            <label for="language">Language*</label>
            <input type="text" id="language" name="language">
            <select class="custom-select">
              <option value="" disabled selected>Choose your option</option>
              <option value="Native">Native</option>
              <option value="Upper Intermediate">Upper Intermediate</option>
              <option value="Intermediate">Intermediate</option>
              <option value="Pre-Intermediate">Pre-Intermediate</option>
              <option value="Elementary">Elementary</option>
            </select>
            </div>
          `)
        },
        addSkill(e){
          $(e.target).before(`
            <div class="skills">
            <hr style="height:1px;border:none;color:#333;background-color:#333;">
            <label for="skill">Skill*</label>
            <input type="text" id="skill" name="skill">
            </div>
          `)
        },
        createCV() {
          let data = {skills: [], educations: [], work_places: [] , languages: []};
          const mainInfoBlock = document.getElementById('information');
          const skillsBlock = document.getElementById('skills');
          const educationBlock = document.getElementById('education');
          const experienceBlock = document.getElementById('experience');
          const languageBlock = document.getElementById('languages');

          mainInfoBlock.querySelectorAll('input[name]').forEach((input) => {
            data[input.name] = input.value;
          });

          skillsBlock.querySelectorAll('input[name="skill"]').forEach((input) => {
            data.skills.push(input.value);
          });

          educationBlock.querySelectorAll('.edu').forEach((educationInfo) => {
            let education = {};

            educationInfo.querySelectorAll('input[name]').forEach((input) => {
              education[input.name] = input.value;
            });

            data.educations.push(education);
          });

          experienceBlock.querySelectorAll('.work').forEach((experienceInfo) => {
            let workPlace = {};

            experienceInfo.querySelectorAll('input[name]').forEach((input) => {
              workPlace[input.name] = input.value;
            });

            data.work_places.push(workPlace);
          });

          languageBlock.querySelectorAll('.Languages').forEach((languageInfo) => {
            let language = {};
            let description = {};

            languageInfo.querySelectorAll('input[name]').forEach((input) => {
              language[input.name] = input.value;
            });
            languageInfo.querySelectorAll('select').forEach((input) => {
              description['description'] = input.value;
            });

            data.languages.push(language);
            data.languages.push(description);
          });

          this.data = data
          this.axios.post('api/resume', {
            data: this.data
          }, 
          {
           headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + this.token,
          }
          })
          .then(response => {
            console.log(response)
          })
          .catch(error => {
            this.errors = error.response.data.errors;
          });
        },
    }
}
</script>