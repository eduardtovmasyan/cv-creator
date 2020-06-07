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
            <h5 class="w3-opacity"><b>Tell Us About Yourself</b></h5>
            <label for="name">Name*</label>
            <input type="text" id="name" name="name">
            <label for="surname">Surname*</label>
            <input type="text" id="surname" name="surname">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone">
            <label for="email">Email*</label>
            <input type="email" id="email" name="email">
            <label for="birthday">Birthday*</label>
            <input type="date" id="birthday" name="birthday">
            <hr>
          </div>
        </div>
        <br>
      </div>
      <div class="text-center p-5">
        <button class="">Create</button>
      </div>
      <!-- End Grid -->
    </div>
    
    <!-- End Page Container -->
  </div>
</div>
</template>
<script >
export default{
// methods:{
//     creatCv(x){
//       this.axios.get(`/api/`).then((r)=>{
//       })
//     },
// }
}
</script>