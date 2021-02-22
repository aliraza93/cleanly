<template>
  <div class="wrap">
    <div class="modal fade" id="update-timing-override" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Update Timing Override</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" v-if="errors">
              <ul>
                <li v-for="error in errors" :key="error">{{ error[0] }}</li>
              </ul>
            </div>
            <form>
              <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                      <datepicker :disabled-dates="state.disabledDates" :bootstrap-styling="true" placeholder="Please Choose a Date" v-model="timing.date"></datepicker> 
                    </div> 
                   </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-check">
                      <input v-model="status" type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Block Time (Optional)</label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <b-form-timepicker :disabled="!status" v-model="timing.start_time" placeholder="Choose Start Time" local="en"></b-form-timepicker>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <b-form-timepicker :disabled="!status" v-model="timing.end_time" placeholder="Choose Start Time" local="en"></b-form-timepicker>
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
import Datepicker from 'vuejs-datepicker';

export default {
  components: {
    Datepicker
  },
  name : 'update-timing-overrides',  
  mixins: [mixin],

  data() {
    return {
      status: false,
      timing: {
        id: '',
        date: '',
        start_time: '',
        end_time: ''
      },
      state: {
        disabledDates: {
        to: new Date(), // Disable all dates up to specific date
        //days: [6, 0], 
        // Disable Saturday's and Sunday's
        
      }
      },
      errors: null
    };
  },

  
  created(){

      var _this = this;
       
     EventBus.$on('timing-override-edit',function(id){
       
       _this.timing.id = id;

       _this.getEditData(id);

       $('#update-timing-override').modal('show');


 
     });

      $('#update-timing-override').on('hidden.bs.modal', function(){
            _this.resetForm();
        });

  },

  methods: {
    
    getEditData(id){
     
     axios.get(base_url+'timing-override/'+id+'/edit')

     .then(response => {
      
           this.timing = {
            id : response.data.id,   
            date: response.data.date,
            start_time : response.data.start_time,
            end_time : response.data.end_time,
            
          };

     })

    },

    updateTiming() {
        axios.post(base_url + "timing-override/update/"+this.timing.id, this.timing)

        .then(response => {
          $("#update-timing-override").modal("hide");
          this.resetForm();
          EventBus.$emit("timing-override-created",1);
          this.$toast.success("Timing Override Updated Successfully !", 'Success', { timeout: 3000 } );
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
            date: '',
            start_time: '',
            end_time: ''
          };
          this.errors = null; 

  },

  },

 

  // end of method section

};
</script>