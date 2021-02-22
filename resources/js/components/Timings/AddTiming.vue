<template>
    <div class="wrap">
    <div class="modal fade" id="add-timings" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Add Usual Timings</h4>
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
            <button @click="addTimings" type="button" class="btn btn-success waves-effect">SAVE</button>
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
import Multiselect from 'vue-multiselect';

export default {
  components: {
    Datepicker,
    Multiselect
  },
  mixins: [mixin],

  data() {
    return {
      monday: '',
      tuesday: '',
      wednesday: '',
      thursday: '',
      friday: '',
      saturday: '',
      sunday: '',
      value: [],
      timing: {
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

  methods: {
    addTimings() {
      axios
        .post(base_url + "timing", this.timing)

        .then(response => {
          $("#add-timings").modal("hide");

          this.timing = {
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
          };
          this.monday= '',
          this.tuesday= '',
          this.wednesday= '',
          this.thursday= '',
          this.friday= '',
          this.saturday= '',
          this.sunday= '',
          this.errors = null;
          EventBus.$emit("timings-added", response.data);

          //this.showMessage(response.data);
          this.$toast.success('Timing Set Successfully !', 'Success', { timeout: 3000 } );
          window.location.href = "timing";
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
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>