<template>
    <div class="wrap">
    <div class="modal fade" id="add-timing-override" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Block A Date/Time</h4>
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
            <button @click="addTimingsOverride" type="button" class="btn btn-success waves-effect">SAVE</button>
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
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
  mixins: [mixin],

  data() {
    return {
      status: false,
      timing: {
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

  methods: {
    addTimingsOverride() {
      axios
        .post(base_url + "timing-override", this.timing)

        .then(response => {
          $("#add-timing-override").modal("hide");

          this.timing = {
            date: '',
            start_time: '',
            end_time: ''
          };
          status = false;
          this.errors = null;
          EventBus.$emit("timingsOverride-added", response.data);

          //this.showMessage(response.data);
          this.$toast.success('Date/Time has been blocked Successfully !', 'Success', { timeout: 3000 } );
          window.Location.href = 'timing-override';
        })
        .catch(err => {
          if (err.response) {
            this.errors = err.response.data.errors;
            this.$toast.error('Something Went Wrong', 'Error', { timeout: 3000 } );
          }
        });
    }
  },

  // end of method section

  created() {}
};
</script>