<template>
<div>
  <div class="w3-light-grey">
    <div class="w3-content w3-margin-top" style="max-width:1400px;">
      <div class="w3-row-padding">
      </div>
      <div class="">
        <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Create CV</h2>
          <div class="w3-container">
            <div id="information" v-show="sections.info">
              <h5 class="w3-opacity"><b>Tell Us About Yourself</b></h5>
              <div class="mb-1">
                <label for="firstname">Firstname*</label>
                <input type="text" id="firstname" name="firstname">
                <span class="text-danger" v-if="errors.firstname">{{ errors.firstname[0] }}</span>
              </div>
              <div class="mb-1">
                <label for="lastname">Lastname*</label>
                <input type="text" id="lastname" name="lastname">
                <span class="text-danger" v-if="errors.lastname">{{ errors.lastname[0] }}</span></div>
              <div class="mb-1">
                <label for="phone">Phone*</label>
                <input type="text" id="phone" name="phone">
                <span class="text-danger" v-if="errors.phone">{{ errors.phone[0] }}</span>
              </div>
              <div class="mb-1">
                <label for="email">Email*</label>
                <input type="email" id="email" name="email">
                <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
              </div>
              <div class="mb-1">
                <label for="birthday">Birthday*</label>
                <input type="date" id="birthday" name="birthday">
                <span class="text-danger" v-if="errors.birthday">{{ errors.birthday[0] }}</span>
              </div>
              <hr>
              <button @click = "showSection('edu')" class="float-right mb-2">Next</button>
            </div>

            <div id="education" v-show="sections.edu">
              <div class="edu" v-for="(education, index) in educations">
                <h5 class="w3-opacity"><b>Education</b></button></h5>
                <div class="mb-1">
                  <label for="name">Name*</label>
                  <input type="text" name="name" v-model="education.name">
                  <span class="text-danger" v-if="errors[`educations.${index}.name`]">{{ errors[`educations.${index}.name`][0] }}</span>
                </div>
                <div class="mb-1">
                  <label for="facultet">Facultet*</label>
                  <input type="text" name="facultet" v-model="education.facultet">
                  <span class="text-danger" v-if="errors[`educations.${index}.facultet`]">{{ errors[`educations.${index}.facultet`][0] }}</span>
                </div>
                <div class="mb-1">
                  <label for="place">Address*</label>
                  <input type="text" name="place" v-model="education.place">
                  <span class="text-danger" v-if="errors[`educations.${index}.place`]">{{ errors[`educations.${index}.place`][0] }}</span>
                </div>
                <div class="mb-1">
                  <label for="start">Start*</label>
                  <input type="date" name="start" v-model="education.start">
                  <span class="text-danger" v-if="errors[`educations.${index}.start`]">{{ errors[`educations.${index}.start`][0] }}</span>
                </div>
                <div class="mb-1">
                  <label for="end">End*</label>
                  <input type="date" name="end" v-model="education.end">
                  <span class="text-danger" v-if="errors[`educations.${index}.end`]">{{ errors[`educations.${index}.end`][0] }}</span>
                </div>
              </div>

              <div class="text-center">
                <button @click = "showSection('info')" class="float-left mt-4 mb-2">Prev</button>
                <button @click = "addEducation" type="button" class="fa fa-plus mt-4 mb-2" aria-hidden="true" id="eduButton"></button>
                <button @click = "showSection('exp')" class="float-right mt-4 mb-2">Next</button>
              </div>
              <hr>
            </div> 

            <div id="experience" v-show="sections.exp">
              <div class="exp" v-for="(experience, index) in experiences">
                <h5 class="w3-opacity"><b>Professional Experience</b></button></h5>
                <div class="mb-1">
                  <label for="name">Name*</label>
                  <input type="text" name="name" v-model="experience.name">
                  <span class="text-danger" v-if="errors[`experiences.${index}.name`]">{{ errors[`experiences.${index}.name`][0] }}</span>
                </div>
                <div class="mb-1">
                  <label for="position">Position*</label>
                  <input type="text" name="position" v-model="experience.position">
                  <span class="text-danger" v-if="errors[`experiences.${index}.position`]">{{ errors[`experiences.${index}.position`][0] }}</span>
                </div>
                <div class="mb-1">
                  <label for="place">Address*</label>
                  <input type="text" name="place" v-model="experience.place">
                  <span class="text-danger" v-if="errors[`experiences.${index}.place`]">{{ errors[`experiences.${index}.place`][0] }}</span>
                </div>
                <div class="mb-1">
                  <label for="start">Start*</label>
                  <input type="date" name="start" v-model="experience.start">
                  <span class="text-danger" v-if="errors[`experiences.${index}.start`]">{{ errors[`experiences.${index}.start`][0] }}</span>
                </div>
                <div class="mb-1">
                  <label for="end">End*</label>
                  <input type="date" name="end" v-model="experience.end">
                  <span class="text-danger" v-if="errors[`experiences.${index}.end`]">{{ errors[`experiences.${index}.end`][0] }}</span>
                </div>
              </div>
              <div class="text-center">
              <button @click = "showSection('edu')" class="float-left mt-4 mb-2">Prev</button>
              <button @click = "addWork" type="button" class="fa fa-plus mt-4 mb-2" aria-hidden="true" id="eduButton"></button>
              <button @click = "showSection('lang')" class="float-right mt-4 mb-2">Next</button>
            </div>
              <hr>
            </div>            

            <div id="languages" v-show="sections.lang">
              <div class="Languages" v-for="(language, index) in languages">
              <h5 class="w3-opacity"><b>Languages</b></button></h5>
              <div class="mb-1">
                <label for="language">Language*</label>
                <input type="text" v-model="language.name" name="language">
                <span class="text-danger" v-if="errors[`languages.${index}.name`]">{{ errors[`languages.${index}.name`][0] }}</span>
              </div>
              <div class="mb-1">
                <label for="language">Level*</label>
                <select class="custom-select" v-model="language.description">
                  <option value="" disabled selected>Choose your option</option>
                  <option value="Native">Native</option>
                  <option value="Upper Intermediate">Upper Intermediate</option>
                  <option value="Intermediate">Intermediate</option>
                  <option value="Pre-Intermediate">Pre-Intermediate</option>
                  <option value="Elementary">Elementary</option>
                </select>
                <span class="text-danger" v-if="errors[`languages.${index}.description`]">{{ errors[`languages.${index}.description`][0] }}</span>
              </div>
              </div>
              <div class="text-center">
                <button @click = "showSection('exp')" class="float-left mt-4 mb-2">Prev</button>
                <button @click = "addLanguage" type="button" class="fa fa-plus mt-4 mb-2" aria-hidden="true"></button>
                <button @click = "showSection('skill')" class="float-right mt-4 mb-2">Next</button>
              </div>
              <hr>
            </div>

            <div id="skills" v-show="sections.skill">
              <div class="skills" v-for="(skill, index) in skills">
                <h5 class="w3-opacity"><b>Skills</b></h5>
                <label for="skill">Skill*</label>
                <input type="text" v-model="skill.name" name="skill">
                <span class="text-danger" v-if="errors[`skills.${index}.name`]">{{ errors[`skills.${index}.name`][0] }}</span>
              </div>
              <div class="text-center">
                <button @click = "showSection('lang')" class="float-left mt-4 mb-2">Prev</button>
                <button @click = "addSkill" type="button" class="fa fa-plus mt-4 mb-2" aria-hidden="true"></button>
              </div>
              <hr>
            </div>

          </div>
        </div>
        <br>
      </div>
      <div class="text-center p-5">
        <button v-show="createButton" @click = "createCV">Create</button>
      </div>
    </div>
  </div>
</div>
</template>
<script >
export default{
    data() {
      return {
        sections: {
          info: true,
          edu: false,
          exp: false,
          lang: false,
          skill: false,
        },
        createButton: true,
        data: {},
        token: localStorage.getItem('bearerToken'),
        errors: {},
        educations: [this.getEducationModel()],
        experiences: [this.getExperienceModel()],
        languages: [this.getLanguageModel()],
        skills: [this.getSkillModel()],
      }
    },
    watch: {
      createButton(to, from) {
        console.log(to, from);
      },
      errors(to) {
        for (let key in to) {
          if (key.match(/^educations\..+$/)) {
            this.showSection('edu');
            break;
          } else if (key.match(/^experiences\..+$/)) {
            this.showSection('exp');
            break;
          } else if (key.match(/^languages\..+$/)) {
            this.showSection('lang');
            break;
          } else if (key.match(/^skills\..+$/)) {
            this.showSection('skill');
            break;
          } else {
            this.showSection('info');
            break;
          }
         }
      }
    },
    methods: {
        addEducation(e){
          this.educations.push(this.getEducationModel());
        },
        addWork(e){
          this.experiences.push(this.getExperienceModel());
        },
        addLanguage(e){
          this.languages.push(this.getLanguageModel());
        },
        addSkill(e){
          this.skills.push(this.getSkillModel());
        },

        getEducationModel() {
          return {
            name: null,
            facultet: null,
            place: null,
            start: null,
            end: null
          };
        },
        getExperienceModel() {
          return {
            name: null,
            position: null,
            place: null,
            start: null,
            end: null
          };
        },
        getLanguageModel() {
          return {
            name: null,
            description: null
          };
        },
        getSkillModel() {
          return {
            name: null,
          };
        },

        showSection(name) {
          for (let section in this.sections) {
            this.sections[section] = section === name;
          }
        },

        createCV() {
          let data = {};
          const mainInfoBlock = document.getElementById('information');
          mainInfoBlock.querySelectorAll('input[name]').forEach((input) => {
            data[input.name] = input.value;
          });

          this.createButton = false;
          this.axios.post('api/resume', {
            firstname: data.firstname,
            lastname: data.lastname,
            birthday: data.birthday,
            email: data.email,
            phone: data.phone,
            educations: this.educations,
            experiences : this.experiences,
            languages: this.languages,
            skills: this.skills,
          }, 
          {
           headers: {
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + this.token,
          }
          })
          .then(response => {
            window.location.href = '/my-cv';
          })
          .catch(error => {
            this.errors = error.response.data.errors;
            this.createButton = true;
          });
        },
    }
}
</script>
