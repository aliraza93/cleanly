<template>
  <div class="wrap">
    <div class="modal fade" id="update-timing" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Update Timing</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" v-if="errors">
              <ul>
                <li v-for="error in errors" :key="error">{{ error[0] }}</li>
              </ul>
            </div>
            <form>
              <div class="row">
                    
                    <div class="col-md-4">
                      <div class="form-check">
                        <input v-model="monday" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Monday</label>
                      </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <b-form-timepicker :disabled="!monday" v-model="timing.mon_start_time" placeholder="Choose Start Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <b-form-timepicker :disabled="!monday" v-model="timing.mon_end_time" placeholder="Choose End Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-check">
                        <input v-model="tuesday" type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Tuesday</label>
                      </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <b-form-timepicker :disabled="!tuesday" v-model="timing.tues_start_time" placeholder="Choose Start Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <b-form-timepicker :disabled="!tuesday" v-model="timing.tues_end_time" placeholder="Choose End Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-check">
                        <input v-model="wednesday" type="checkbox" class="form-check-input" id="exampleCheck3">
                        <label class="form-check-label" for="exampleCheck3">Wednesday</label>
                      </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <b-form-timepicker :disabled="!wednesday" v-model="timing.wednes_start_time" placeholder="Choose Start Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <b-form-timepicker :disabled="!wednesday" v-model="timing.wednes_end_time" placeholder="Choose End Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-check">
                        <input v-model="thursday" type="checkbox" class="form-check-input" id="exampleCheck4">
                        <label class="form-check-label" for="exampleCheck4">Thursday</label>
                      </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <b-form-timepicker :disabled="!thursday" v-model="timing.thurs_start_time" placeholder="Choose Start Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <b-form-timepicker :disabled="!thursday" v-model="timing.thurs_end_time" placeholder="Choose End Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-check">
                        <input v-model="friday" type="checkbox" class="form-check-input" id="exampleCheck5">
                        <label class="form-check-label" for="exampleCheck5">Friday</label>
                      </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <b-form-timepicker :disabled="!friday" v-model="timing.fri_start_time" placeholder="Choose Start Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <b-form-timepicker :disabled="!friday" v-model="timing.fri_end_time" placeholder="Choose End Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-check">
                        <input v-model="saturday" type="checkbox" class="form-check-input" id="exampleCheck6">
                        <label class="form-check-label" for="exampleCheck6">Saturday</label>

                      </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <b-form-timepicker :disabled="!saturday" v-model="timing.satur_start_time" placeholder="Choose Start Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <b-form-timepicker :disabled="!saturday" v-model="timing.satur_end_time" placeholder="Choose End Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-check">
                        <input v-model="sunday" type="checkbox" class="form-check-input" id="exampleCheck7">
                        <label class="form-check-label" for="exampleCheck7">Sunday</label>
                      </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <b-form-timepicker :disabled="!sunday" v-model="timing.sun_start_time" placeholder="Choose Start Time" local="en"></b-form-timepicker>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <b-form-timepicker :disabled="!sunday" v-model="timing.sun_end_time" placeholder="Choose End Time" local="en"></b-form-timepicker>
                        </div>
                    </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <br>
            <button @click="updateTiming" type="button" class="btn btn-success waves-effect">Update</button>
            <button  @click="resetForm()" type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { EventBus } from "../../vue-asset";
import mixin from "../../mixin";
import Multiselect from 'vue-multiselect';

export default {
  components: {
    Multiselect
  },
  name : 'update-timing',  
  mixins: [mixin],

  data() {
    return {
      value: [],
      options: [],
      monday: '',
      tuesday: '',
      wednesday: '',
      thursday: '',
      friday: '',
      saturday: '',
      sunday: '',
      value: [],
      timing: {
        id: '',
        mon_start_time: '',
        mon_end_time: '',
        tues_start_time: '',
        tues_end_time: '',
        wednes_start_time: '',
        wednes_end_time: '',
        thurs_start_time: '',
        thurs_end_time: '',
        fri_start_time: '',
        fri_end_time: '',
        satur_start_time: '',
        satur_end_time: '',
        sun_start_time: '',
        sun_end_time: ''
      },

      errors: null
    };
  },

  
  created(){

      var _this = this;
       
     EventBus.$on('timing-edit',function(id){
       
       _this.timing.id = id;

       _this.getEditData(id);

       $('#update-timing').modal('show');


 
     });

      $('#update-timing').on('hidden.bs.modal', function(){
            _this.resetForm();
        });

  },

  methods: {
    
    getEditData(id){
     
     axios.get(base_url+'timing/'+id+'/edit')

     .then(response => {
      
          if(response.data.mon_start_time.length == 0) {
            this.monday = false;  
          }
          else{
            this.monday = true;
          }
          if(response.data.tues_start_time.length == 0) {
            this.tuesday = false;  
          }
          else{
            this.tuesday = true;
          }
          if(response.data.wednes_start_time.length == 0) {
            this.wednesday = false;  
          }
          else{
            this.wednesday = true;
          }
          if(response.data.thurs_start_time.length == 0) {
            this.thursday = false;  
          }
          else{
            this.thursday = true;
          }
          if(response.data.fri_start_time.length == 0) {
            this.friday = false;  
          }
          else{
            this.friday = true;
          }
          if(response.data.satur_start_time.length == 0) {
            this.saturday = false;  
          }
          else{
            this.saturday = true;
          }
          if(response.data.sun_start_time.length == 0) {
            this.sunday = false;  
          }
          else{
            this.sunday = true;
          }
           this.timing = {
            id : response.data.id,   
            mon_start_time : response.data.mon_start_time,
            mon_end_time : response.data.mon_end_time,
            tues_start_time : response.data.tues_start_time,
            tues_end_time : response.data.tues_end_time,
            wednes_start_time : response.data.wednes_start_time,
            wednes_end_time : response.data.wednes_end_time,
            thurs_start_time : response.data.thurs_start_time,
            thurs_end_time : response.data.thurs_end_time,
            fri_start_time : response.data.fri_start_time,
            fri_end_time : response.data.fri_end_time,
            satur_start_time : response.data.satur_start_time,
            satur_end_time : response.data.satur_end_time,
            sun_start_time : response.data.sun_start_time,
            sun_end_time : response.data.sun_end_time,
          };

     })

    },

    updateTiming() {
        axios.post(base_url + "timing/update/"+this.timing.id, this.timing)

        .then(response => {
          $("#update-timing").modal("hide");
          this.resetForm();
          EventBus.$emit("timing-created",1);
          this.$toast.success("Timing Updated Successfully !", 'Success', { timeout: 3000 } );
          window.location.href = "timing";
        })
        .catch(err => {
          if (err.response) {
            this.errors = err.response.data.errors;
            this.$toast.error("Something Went Wrong", 'Error', { timeout: 3000 } );
          }
        });
    },

     resetForm(){
    
          this.timing = {
            id: '',
            days: '',
            start_time: '',
            end_time: ''
          };
          this.errors = null; 

  },

  },

 

  // end of method section

};
</script>