<template>
    <div class="wrap">
    <div class="modal fade" id="add-cleaning-service" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Add Number of Cleaning Service</h4>
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
                  <div class="preference-quantity">
                      <div class="counter js-counter">
                          <div class="counter__item">
                              <a class="counter__minus js-counter-btn fa fa-minus" v-on:click="decrease" aria-hidden="true" data-action="minus"></a>
                          </div>
                          <div class="counter__item counter__item--center">
                              <input class="counter__value js-counter-value" type="text" value="3" v-model="cleaning.counter" disabled="disabled" tabindex="-1" min="0" max="10" required />
                          </div>
                          <div class="counter__item">
                              <a class="counter__plus js-counter-btn fa fa-plus" v-on:click="increase" aria-hidden="true" data-action="plus"></a>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <br>
            <button @click="addCleaningService" type="button" class="btn btn-success waves-effect">SAVE</button>
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
      cleaning: {
        counter: 0,
      },

      errors: null
    };
  },

  methods: {
    addCleaningService() {
      if(this.cleaning.counter <= 0){
          this.$toast.error('Counter must be greater than 0', 'Error', { timeout: 3000 } );  
      }
      else{
        axios
        .post(base_url + "cleaning", this.cleaning)

        .then(response => {
          $("#add-cleaning-service").modal("hide");

          this.cleaning = {
            counter: 0
          };
          this.errors = null;
          EventBus.$emit("cleaningService-added", response.data);

          //this.showMessage(response.data);
          this.$toast.success('Cleaning Service Set Successfully !', 'Success', { timeout: 3000 } );
          window.location.href = "cleaning";

        })
        .catch(err => {
          if (err.response) {
            this.errors = err.response.data.errors;
            this.$toast.error('Something Went Wrong', 'Error', { timeout: 3000 } );
          }
        });
      }
      
    },
    increase: function() {
      this.cleaning.counter++;
    },
    decrease:  function() {
      this.cleaning.counter--;
    },
    reset: function() {
      this.cleaning.counter = 0;
    }
  },

  // end of method section

  created() {}
};
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
/* ==============================================================
   COUNDOWN TIMER
   ============================================================== */

   .counter {
    max-width: 100%;
    height: 38px;
    border-right: 2px solid #e2e6e9;
    border-left: 2px solid #e2e6e9;
    border-bottom: 2px solid #e2e6e9;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    background-color: bg_base;
}

.counter__item {
    position: relative;
    float: left;
    width: 30%;
    height: 100%;
    cursor: pointer;
}

.counter__item--center {
    width: 40%;
    border-right: 2px solid #e2e6e9;
    border-left: 2px solid #e2e6e9;
}

.counter__minus,
.counter__plus {
    position: absolute;
    width: 100%;
    height: 100%;
    text-align: center;
    padding: 10px 0;
    cursor: pointer;
    color: #e2e6e8 !important;
}

.counter__minus:hover,
.counter__plus:hover {
    color: #10b2e7 !important;
}

.counter__value {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: auto;
    padding: 0;
    width: 100%;
    font-size: 17px;
    font-weight: bold;
    color: #10b2e7;
    border: none;
    text-align: center;
    outline: none;
    background-color: #fff;
}
</style>