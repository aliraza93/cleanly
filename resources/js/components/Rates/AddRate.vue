<template>
    <div class="wrap">
    <div class="modal fade" id="add-rates" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Add Rates</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" v-if="errors">
              <ul>
                <li v-for="error in errors" :key="error">{{ error[0] }}</li>
              </ul>
            </div>
            <form>
                <div class="row">
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter the Size" v-model="rates.size">
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Estimated Hours" v-model="rates.hours">
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Base Price" v-model="rates.base">
                        </div>
                    </div>

                    <div class="col-md-6">


                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Increment" v-model="rates.increment">
                        </div>
                    </div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <br>
            <button @click="addRates" type="button" class="btn btn-success waves-effect">SAVE</button>
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

export default {
  mixins: [mixin],

  data() {
    return {
      rates: {
        size: "",
        hours: "",
        base: "",
        increment: 25
      },

      errors: null
    };
  },

  methods: {
    addRates() {
      axios
        .post(base_url + "rate", this.rates)

        .then(response => {
          $("#add-rates").modal("hide");

          this.rates = {
            size: "",
            hours: "",
            base: "",
            increment: 25
          };
          this.errors = null;
          EventBus.$emit("rates-added", response.data);

          //this.showMessage(response.data);
          this.$toast.success('Rate Added Successfully !', 'Success', { timeout: 3000 } );
          window.location.href = "rate";
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